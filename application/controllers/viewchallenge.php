<?php

// TO DO: Secure this page //

class ViewChallenge extends Controller
{

	private $user_challenge;

	public function __construct()
	{
		parent::__construct();
	}

	// show challenge info - FHM
	public function show($challenge_id)
	{
		try
		{	
			$challenge = Challenge::find($challenge_id);
			$challenge_detail = ChallengeDetail::find($challenge->challenge_detail->id);
		}
		catch(Exception $e)
		{
			Session::set('error', 'Sorry! This challenge no longer exists...or maybe it never existed ooooooh! :O ');
			header('Location:'.URL.'/start');
		}
		
	
		$info = array();

	    // sync cheers with likes
        $this->getcheers($challenge->id); 

	   if($challenge_detail->is_toxic == 0)
	   {
	     	// get challenge info - FHM
			$info = Utility::showchallenge($challenge->id);

			// get logged user's cheer info
			$info['challenge']['has_cheered'] = $this->cheerstatus(SocialEngine::$user_id, $challenge->id);

			//redirect users if they try to see a challenge that has been completed - FHM
			if($info['challenge']['challenge_detail']['status'] == 'finished')
			{
				header('Location:'.URL.'/finish/show/' . $challenge->id);
			}
			else
			{   
				// add new cheer -> need to replace with 'spectator' or 'watcher' soon - FHM
				$cheer = Cheer::find('one', array('conditions' => array('fb_id=? AND challenge_id=?', SocialEngine::$user_id, $challenge->id)));
				
		
				if(empty($cheer))
				{
					$cheer = new Cheer();
					$cheer->fb_id = SocialEngine::$user_id;
					$cheer->challenge_id = $challenge->id;
					$cheer->save();	

				}
				

				parent::$data = $info;
			}
	   }
	   // check if user is logged in and challenge is toxic - FHM
	   else if($challenge_detail->is_toxic == 1)
	   {
	   	  $error = addslashes($challenge_detail->error_msg);
		  Session::set('error', $error);
		  header('Location:'.URL.'/start');
	   }
	}

	// check if user has already cheered, if not add a cheer to the player selected - FHM
	public function addcheer($player_type, $player_id, $challenge_id)
	{
	   $challenge = Challenge::find($challenge_id);
	   $challenge_detail = ChallengeDetail::find($challenge->challenge_detail->id);
	   $user = User::find($player_id);
	   $post_id = '';

	   // have to find a way to check if toxic here but not disturb the flow
	  
	   if($challenge_detail->is_toxic == 0)
	   {
	   		// get cheer from db - FHM
	   		$cheer = Cheer::find('one', array('conditions' => array('fb_id=? AND challenge_id=?', SocialEngine::$user_id, $challenge_id)));
		  
		    // check if visitor has already cheered, if not save access token
			if($this->cheerstatus(SocialEngine::$user_id, $challenge->id) == 0)
			{
				// check if user is cheering for himself
				$oneself = SocialEngine::$user_id == $user->fb_id;

				if(SocialEngine::searchFriend($user->fb_id) != 0 || $oneself)
				{
					//  update cheer, set which player current user is cheering for - FHM
					$cheer->player_id = $player_id;
					$cheer->has_cheered = 1;
					$cheer->save();

					// will implement next iteration - FHM
					//$this->updatecheerbar($challenge->id, $player_type);

					// gets cheers from likes if not present then get them from db  - FHM
					// TO DO: make this simpler in the future, check only if posts are there - FHM 
				    $cheers = $this->getcheers($challenge->id);

				    // updates cheer count in db by adding 1 only if challenger's posts is unreachable - FHM
				   if($cheers['likes']['challenger']['source'] == 'db' && $challenge_detail->challenger_id == $player_id)
				   {
				   		$challenge_detail->challenger_cheers += 1;
				   }
				   // challenger's post is reachable and the player id matches the challenger's id - FHM
				   else if($cheers['likes']['challenger']['source'] == 'fb' && $challenge_detail->challenger_id == $player_id)
				   {
				   		// get challenger's post & post a like  - FHM
					   	$post_id = $challenge_detail->challenger_post;
					    SocialEngine::postContent('likes', $post_id, null, SocialEngine::$user_id, null, null, $challenge_detail->id);
				   }

				  
				   if($challenge_detail->challengetype_id == 2 )
				   {
				   	   // updates cheer count in db by adding 1 only if challengee's posts is unreachable - FHM
				   	   if($cheers['likes']['challengee']['source'] == 'db' && $challenge_detail->challengee_id == $player_id)
					   {
					   	  $challenge_detail->challengee_cheers += 1;  
					   }
					   // 
					   else if($cheers['likes']['challengee']['source'] == 'fb' && $challenge_detail->challengee_id == $player_id)
					   {
					   	  // get challengee's post and post a like - FHM
					   	  $post_id = $challenge_detail->challengee_post;
					   	  SocialEngine::postContent('likes', $post_id, null, SocialEngine::$user_id, null, null, $challenge_detail->id);
					   }
				   }
				   	
				   	$cheers = $this->getcheers($challenge->id);
				    $challenge_detail->save();

				    // fetch new challenge detail - FHM
				    $challenge_detail = ChallengeDetail::find($challenge->challenge_detail->id);
				    
			   	    echo json_encode($challenge_detail->to_array());
				}
				else
				{
					echo json_encode(array('status' => 'not friend')); 
				}
			}
			else
			{
				echo json_encode(array('status' => 'no cheer'));
			}
	   }
	   else if($challenge_detail->is_toxic == 1)
	   {
	   		$error = addslashes($challenge_detail->error_msg);
	   		echo json_encode(array('status' => 'error', 'message' => $error));
	   }

	  
	}

	// check if current user has already cheered for someone - FHM
	public function cheerstatus($fb_id, $challenge_id)
	{
		$cheer = Cheer::find('one', array('conditions' => array('fb_id=? AND challenge_id=?', $fb_id, $challenge_id)));

		// if there is already a cheer record for the user - FHM
		if(is_object($cheer))
		{
			return $cheer->has_cheered;
		}
		else
		{
			return 0;
		}
	}

	// retrieves the player's likes - FHM
	public function getcheers($challenge_id)
	{
		$challenge = Challenge::find($challenge_id);

		// set up array to hold like/cheer count for each player - FHM
		$cheers = array();

		// get challenge from id - FHM
		$challenge = Challenge::find($challenge_id);
		$challenge_detail = ChallengeDetail::find($challenge->challengedetail_id);

		// get challenger's central post  - FHM
		$chrpost = $challenge_detail->challenger_post;

		// get the total likes from the challenger's post, if returns 0 get from database - FHM
		$chrlike = SocialEngine::getLikes($chrpost, $challenge_detail->id);
		
		// if likes are empty for challenger, take them from db - FHM
		if(empty($chrlike[0]['fql_result_set']))
		{
			$cheers['likes']['challenger']['count'] = $challenge_detail->challenger_cheers;
			$cheers['likes']['challenger']['source'] = 'db';	
		}
		// take them from fb - FHM
		else
		{
			$cheers['likes']['challenger']['count'] = $chrlike[0]['fql_result_set'][0]['likes']['count'];
			$cheers['likes']['challenger']['source'] = 'fb';
		}

		if($challenge_detail->challengetype_id == 2)
		{
			// get the total likes from the challengee's post via the central post_id in the db - FHM
			$cheepost = $challenge_detail->challengee_post;

			// get the total likes from the challengee's post, if returns 0 get from database - FHM
			$cheelike = SocialEngine::getLikes($cheepost, $challenge_detail->id);

			// if likes are empty for challengee, take them from db - FHM
			if(empty($cheelike[0]['fql_result_set']))
			{
				$cheers['likes']['challengee']['count'] = $challenge_detail->challengee_cheers;
				$cheers['likes']['challengee']['source'] = 'db';	
			}
			// take them from fb - FHM
			else
			{
				$cheers['likes']['challengee']['count'] = $cheelike[0]['fql_result_set'][0]['likes']['count'];
				$cheers['likes']['challengee']['source']= 'fb';
			}
		}
		
		Utility::updatecheers($challenge->id, $cheers);

		$challenge_detail->save();

		return $cheers;

		/*  will implement next iteration - FHM
		// get difference between like count and cheer count - FHM
		$like_diff = Utility::updatecheers($challenge->id, $cheers);

		// call updatecheerbar same amount as like_diff - FHM
		for($i=0; $i < $like_diff; $i++)
		{
			$this->updatecheerbar($challenge->id, $challenge_detail->challengetype_id);
		}
		*/
	}

	/*
	// update the bars when a cheer is added 
	public function updatecheerbar($challenge_id, $player_type)
	{
	   $challenge = Challenge::find($challenge_id);
	   $challenge_detail = ChallengeDetail::find($challenge->challenge_detail->id);

		// update cheers and bars in challenge_details for challenger - FHM
   	    if($player_type == 1)
   	    {	
   	    	$bar_arr = explode(',', $challenge_detail->challenger_bar);

   	    	// height, margin-top, top if max bar height hasn't been reached
   	    	if($bar_arr[0] < 65)
   	    	{
   	    		//add 5px to height
   	    		$bar_arr[0] += 5;
   	    		//take out 5px from margin-top
   	    		$bar_arr[1] -= 5;

   	    		// always add top (points)
   	    		$bar_arr[2] -= 5;
   	    	}

   	    	$challenge_detail->challenger_bar =  implode(',', $bar_arr);

   	    }
   	    // update cheers and bars in challenge_details for challengee - FHM
   	    else if($player_type == 2)
   	    {
   	    	$bar_arr = explode(',', $challenge_detail->challengee_bar);

   	    	// height and margin-top if max bar height hasn't been reached
   	    	if($bar_arr[0] < 65)
   	    	{
   	    		//add 5px to height
   	    		$bar_arr[0] += 5;
   	    		//take out 5px from margin-top
   	    		$bar_arr[1] -= 5;
   	    		// always add top (points)
   	    		$bar_arr[2] -= 5;
   	    	}		   	    	

   	    	$challenge_detail->challengee_bar =  implode(',', $bar_arr);
   	    }

   	    $challenge_detail->save();
	}
	*/
}