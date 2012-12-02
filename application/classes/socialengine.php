<?php
require_once 'scripts/facebook/php-sdk/src/facebook.php';
/* Author: Freddy Hidalgo-Monchez
Purpose: -The engine class that powers the whole app with raw social data
-Properties are dynamic since variables will vary with each API
-The class is enclosed in a static variable so it is available to the whole app
*/
class SocialEngine
{
   private static $app_id;
   private static $secret;
   private static $fb;
   private static $canvas_page;

   public static $user_id;
   public static $access_token; // valid for 60 days

   public function init()
   {
   	  self::$app_id = ''; // Insert App ID
   	  self::$secret = ''; // Insert Secret token
   	  self::$canvas_page = ''; // Insert fb canvas ulr 
   	  self::auth();
   }

	// authenticate user through API, redirect to login if fail - FHM
	private static function auth()
	{
		$config = array(
		'appId' => self::$app_id,
		'secret' => self::$secret,
		'fileUpload' => true);

		self::$fb = new facebook($config);
		self::$user_id = self::$fb->getUser();

		if(self::$user_id) 
		{
			$sql = "SELECT read_stream, publish_stream FROM permissions WHERE uid = me()";	
			$permissions = self::getData($sql);

			

			if($permissions[0]['fql_result_set'][0]['read_stream'] == 1 && $permissions[0]['fql_result_set'][0]['publish_stream'] == 1)
			{
				try 
			  	{
			  	  $user_profile = self::$fb->api('/me');
			  	} 
			  	catch (FacebookApiException $e) 
			  	{
			  	  self::login();
			  	}

			    self::$access_token = self::$fb->getAccessToken();		

			  	$output = file_get_contents('https://graph.facebook.com/oauth/access_token?client_id=' . self::$app_id . '&client_secret=' . self::$secret . '&grant_type=fb_exchange_token&fb_exchange_token=' . self::$access_token . ''); 

			  	// get pos of = and pos of & to find length of access token
			  	$pos1 = strpos($output, '=');
			  	$pos2 = strpos($output, '&');

			  	// get length of access token
			  	$length = $pos2 - $pos1;

			  	// set accedd token to new long-lived (60 days) key
			  	self::$access_token = substr($output, 13, $length - 1);
			}
			else
			{
				echo "<script>alert('We noticed that you did not give us access to post and read on your wall. Unfortunately, the app only works if it can interact with your profile. We hate spam too so we try to keep the posts to a minimum. Give us a try, and if you have ANY concerns, come talk to us 226-791-2634 or hello@growple.com')</script>";
				self::login();
			}
		}
		// if user is not logged in (session has not been started)
		else
		{
			
			if (isset($_REQUEST['error']))
			{
				if($_REQUEST['error'] == 'access_denied')
				{
					header('Location:' . URL);	
				}
			}

			self::login();
		}
	}

	// sends user to api login page - FHM
	private static function login()
	{
		// get current page url and append to redirect - FHM
		$pageURL = self::$canvas_page;
		$auth_url = "http://www.facebook.com/dialog/oauth/?client_id=" . self::$app_id . "&redirect_uri=" . $pageURL . "&scope=read_stream, publish_stream";
		echo("<script> top.location.href='" . $auth_url . "'</script>");
	}

	// extract data from fb (execute queries) - FHM
	public static function getData($request, $challengedetail_id = null)
	{
		$queries = self::buildQuery($request);

		$param = array(
		'method' => 'fql.multiquery',
		'queries' => $queries,
		'callback' => ''
		);

		// Must structure all these exceptions - FHM
		try{
			$fqlResult = self::$fb->api($param);
		}
		// If the user is logged out, you can have a
		        // user ID even though the access token is invalid.
		        // In this case, we'll get an exception, so we'll
		        // just ask the user to login again here. - FHM
		catch(FacebookApiException $e)
		{
			$post_found = 1;

			// switch doesn't seem to work so we're searching for indexable  - FHM
			$post_found = (strpos($e->getMessage(), 'indexable') ?  0 : 1); 
			
			//write errors to log and alert user - FHM
			Utility::error(' date: ' . date('l jS \of F Y h:i:s A') . ' error: ' . $e->getType() . '  ' . $e->getMessage() . ' uid: ' . self::$user_id);
				
			// error is not the missing post one 
			if($post_found == 1 && $challengedetail_id != null)
			{
				// record error into db - FHM
				$challenge_detail = ChallengeDetail::find($challengedetail_id);
				$challenge_detail->is_toxic = 1;
				$challenge_detail->error_msg = $e->getType() . '  ' . $e->getMessage();
				$challenge_detail->save();
			}
			else
			{
				return $post_found; 	
			}
		}
		catch (Exception $e)
		{
			//write errors to log
			$err_msg = 'Message: ' . $e->getMessage();

			Utility::error(' error: ' . $err_msg);

			$challenge_detail = ChallengeDetail::find($challengedetail_id);
			$challenge_detail->is_toxic = 1;
			$challenge_detail->error_msg = 'Oh Snap!! A strange error has occured. If you were part of the challenge, make sure your fb wall settings are set to public and that everyone has accepted the app request to post and read the walls. If that does not fix it, text us at 226-791-2634 or hello@growple.com';
			$challenge_detail->save();

		}

		$result = (isset($fqlResult) ? $fqlResult :  Utility::error('fqlResult empty'));

		return $result;

	}

	// displays an invite friends pop up box - FHM
	public static function inviteFriends($msg)
	{
		$message = "message?";

		$requests_url = "http://www.facebook.com/dialog/apprequests?app_id="
		       . self::$app_id . "&redirect_uri=" . urlencode(self::$canvas_page)
		       . "&message=" . $message;

		if (empty($_REQUEST["request_ids"]))
		{
		   echo("<script> top.location.href='" . $requests_url . "'</script>");
		}
	}

	    // post notifications, wall posts, tags, comments - FHM
	public static function postContent($obj_type, $obj_path = null, $msg = null, $receiver_obj_id = null, $action = null, $app_obj = null, $challengedetail_id, $toxic = null)
	{

		$path = '/' . $receiver_obj_id . '/' . $obj_type;
		$params = '';

		if($obj_type == 'photos')
		{
			$params = array('source' => '@' . $obj_path,'message' => $msg);
		}
		else if($obj_type == 'feed')
		{
			$path = '/' . $receiver_obj_id . '/' . $obj_type;
			$params = array('message' => $msg, 'link' => $obj_path, 'picture' => URL . '/public/img/wallpost.png', 'name' => 'My awesome Growple! challenge', 'description' => 'Growple! is a fun app that lets you challenge yourself and your friends to anything and everything! Start your own challenge today!', 'caption' => ' ');
		}
		else if($obj_type == 'notification')
		{
			$path = '/' . $receiver_obj_id . '/growple:' . $action;
			$params = array('challenge' =>  URL . '/result/update', 'challenge_id' => $challengedetail_id /* this is actually challenge id, must change later */);
		}
		else if($obj_type == 'tags')
		{
			$path = $obj_path . '/' . $obj_type;
			$param = array('tag_uid' => $receiver_obj_id);
		}
		/* post links as a feed post with link as an attribute */
		/*
		else if($obj_type == 'links')
		{
			$path = $obj_path . '/' . $obj_type . '/' . $receiver_obj_id;
		}
		*/
		else if($obj_type == 'comments')
		{
			$path = '/' . $obj_path . '/' . $obj_type;
			$params = array('message' => $msg);
		}
		else if($obj_type == 'likes')
		{
			$path =  '/' . $obj_path . '/' . $obj_type;
		}	

		return self::executePost($path, $params, $challengedetail_id, $toxic);
	}

	// performs api call - FHM
	public static function executePost($path, $params, $challengedetail_id, $toxic = null)
	{
		try {

		$ret_obj = self::$fb->api($path, 'POST', $params);
		return $ret_obj['id'];

		}
		catch(FacebookApiException $e)
		{
			// If the user is logged out, you can have a
			// user ID even though the access token is invalid.
			// In this case, we'll get an exception, so we'll
			// just ask the user to login again here.
		
			$errmsg = '';

			echo $e->getMessage();
			break;

			// change error to be more user friendly and easier to read for dev team - FHM
			switch($e->getMessage())
			{
				case '(#341) Feed action request limit reached': $errmsg = 'You are a rockstar! You either invited a ton of friends or created a bunch of challenges quickly. Facebook limits the number of wall posts you can make at a given time so try again later. You can reach us at 226-791-2634 or freddy.hm@growple.com';
						    break;
				case '(#210) User not visible': $errmsg = 'Oh Snap! The challenger and/or challengee wall cannot be accessed by the app. If you were part of the challenge lower your security restrictions and try again. All else fails, direct rant to  -> C: 226-791-2634 or E: freddy.hm@growple.com ';
							break;
				case '(#100) Error finding the requested story': $errmsg = 'Uh Oh! The post that had the cheer me on message on each profile has been deleted or cannot be found. If you were part of the challenge try lowering your fb wall security settings for all players and try again. C: 226-791-2634 or E: freddy.hm@growple.com';
							break;
				default: $errmsg = 'A very strange bug has come up. If you created this challenge, try clearing your cookies and restarting the challenge. Let us know by texting/calling 226-791-2634 or freddy.hm@growple.com';
						 	break;
			}

			//write errors to log and alert user - FHM
			Utility::error(' date: ' . date('l jS \of F Y h:i:s A') . ' error: ' . $e->getType() . '  ' . $e->getMessage() . ' uid: ' . self::$user_id);
				
			$challenge_detail = ChallengeDetail::find($challengedetail_id);
			$challenge_detail->is_toxic = 1;
			$challenge_detail->error_msg = $errmsg;
			$challenge_detail->save();
 
		  	Session::set('error', $errmsg);

		  	if($toxic != 'be_toxic')
		  	{
		  		header('Location:'.URL.'/start');
		  	}
		}
		catch(Exception $e)
		{
			//write errors to log
			$err_msg = 'Message: ' . $e->getMessage();
			Utility::error(' error: ' . $err_msg);
		
			$challenge_detail = ChallengeDetail::find($challengedetail_id);
			$challenge_detail->is_toxic = 1;
			$challenge_detail->error_msg = "Oops! Error: " . $error  . "! If you were part of the challenge, make sure your fb wall settings are set to public and that everyone has accepted the app request to post and read the walls. If that does not fix it, text us at 226-791-2634 or hello@growple.com";
			$challenge_detail->save();

			$error = $challenge_detail->error_msg;
		  	Session::set('error', "Oops! Error: " . $error  . "! If you were part of the challenge, make sure your fb wall settings are set to public and that everyone has accepted the app request to post and read the walls. If that does not fix it, text us at 226-791-2634 or hello@growple.com");
		  	
		  	if($toxic != 'be_toxic')
		  	{
		  		header('Location:'.URL.'/start');
		  	}
		}
	}

	// builds SELECT queries - FHM
	public static function buildQuery($request)
	{

		//checks if request contains an array
		if(is_array($request))
		{
			$queries = '{';

			$last_key = end(array_keys($request));

			// build multiquery
			foreach($request as $key => $value)
			{
			if($key != $last_key)
			{
			    $queries .= " 'query" . $key . "' : '" . $value . "' , ";
			   }
			   else
			   {
			   $queries .= " 'query" . $key . "' : '" . $value . "'";
			   }
			}

			$queries .= ' }';

		}
		// build single query - FHM
		else
		{
			$queries = '{ "query": "' . $request . '" }';
		}

		return $queries;
	}

   // extracts friend's list - FHM
   public static function loadFriendList()
   {
		$sql = 'SELECT pic_big, pic_small, pic_square, pic, name, uid, sex FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())';
		$result = self::getData($sql);
		return $result;
   }

   // extracts user given their api id
   public static function loadUser($fb_id)
   {
		$sql = 'SELECT timezone, pic_big, pic_small, pic_square, pic, name, uid, sex FROM user WHERE uid = ' . $fb_id;
		$result = self::getData($sql);
		return $result;
   }

   public static function log($err_msg)
   {
	   	$myFile = "logerrors.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");

		if(isset($msg))
		   $msg .= $err_msg . '\n\n'; 	
		else
		   $msg = $err_msg . '\n\n';

		fwrite($fh, $msg);
		fclose($fh);
   }

   // checks if fb_id is friends with logged in user - FHM
   public static function searchFriend($fb_id)
   {
   		$sql = "SELECT uid1, uid2 FROM friend WHERE uid1 = me() AND uid2 = " . $fb_id;
		$result = self::getData($sql);

		// gets count of array - FHM
		$count = count($result[0]['fql_result_set']);

		// return 0 if person is not in friend list
		if($count == 0)
		{
			$result = 0;
		}
		else
		{	
			// load user info - FHM
			$result = self::loadUser($fb_id);
		}

		return $result;
   }

   // gets likes from a certain post
   public static function getLikes($post_id, $challengedetail_id)
   {
   		$sql = "SELECT likes FROM stream WHERE post_id = '" . $post_id . "'";	
   		$result = self::getData($sql, $challengedetail_id);


   		return $result;
   }

   // used to parse the signed request parameter passed by facebook - FHM
   public static function parse_signed_request($signed_request, $secret) 
   {
		  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

		  // decode the data
		  $sig = self::base64_url_decode($encoded_sig);
		  $data = json_decode(self::base64_url_decode($payload), true);

		  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') 
		  {
		    error_log('Unknown algorithm. Expected HMAC-SHA256');
		    return null;
  			}

		  // check sig
		  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
		  if ($sig !== $expected_sig) 
		  {
		    error_log('Bad Signed JSON signature!');
		    return null;
		  }

	  return $data;
	}

	// used to parse the signed request parameter passed by facebook - FHM
	public static function base64_url_decode($input) 
	{
	  return base64_decode(strtr($input, '-_', '+/'));
	}

	// takes in an object and deletes it 
	public static function deleteObject($obj_id)
	{
		try 
		{
			$path = '/' . $obj_id . '&access_token=' . self::$access_token; 
			$ret_obj = self::$fb->api($path, 'DELETE');
			return $ret_obj['id'];
		}
		catch(FacebookApiException $e)
		{
			Utility::error(' date: ' . date('l jS \of F Y h:i:s A') . ' error: ' . $e->getType() . '  ' . $e->getMessage() . ' uid: ' . self::$user_id);
		}
		catch(Exception $e)
		{
			Utility::error(' date: ' . date('l jS \of F Y h:i:s A') . ' error: ' . $e->getType() . '  ' . $e->getMessage() . ' uid: ' . self::$user_id);	
		}
			
	}

}