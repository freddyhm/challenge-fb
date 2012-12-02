<?php

/*  - FHM */
class SendChallenge extends Controller {

	// used to hold challenge and time info - FHM
	private $challenge_time;

	public function __construct(){

		parent::__construct();		
	}

	// finds user's current challenge and adds friend as challengee - FHM
	public function show($friend_fb_id = null)
	{
		$challenge = Session::get('challenge');

		// check if friend id was passed - FHM
		if(isset($friend_fb_id))
		{
			$result = SocialEngine::searchFriend($friend_fb_id);

			if($result != 0)
			{
				// check if challenge variable exists - FHM
				if($challenge)
				{
					$friend = $result[0]['fql_result_set'][0];

					$challengee = array();
					$user_challenge_splayer = Session::get('user_challenge_splayer');

					if(!empty($friend))
				    {
					   $challengee = $friend;

					   // rename index from uid to fb_id - FHM
					   $challengee['fb_id'] = $challengee['uid'];
	    			   unset($challengee['uid']);
					   
					   $challenge['challenge_detail']['challengee'] = $challengee;
			           $user_challenge_splayer['usercategory_id'] = 2;

			           Session::set('user_challenge_splayer', $user_challenge_splayer);
					   Session::set('challenge', $challenge);
				    }
				    else
				    {
				    	header('Location:'.URL.'/start');
				    }
				}
				
			}
			else
			{	
				header('Location:'.URL.'/pickfriend/show');
			}

		}

	   // add challenge to aray to be passed to view, use challenge as the variable - FHM
	   $this->challenge_time['challenge'] = $challenge;
	   $this->showtime();
	}

	// calculate local time and show available time slots - FHM
	public function showtime()
	{
	  // set default timezone to UTC - FHM
	  date_default_timezone_set('UTC');

	  // get user's timezone offset, multiply by seconds, and add to utc time - FHM
	  $me = SocialEngine::loadUser('me()');
	  $offset =  $me[0]['fql_result_set'][0]['timezone'];

      $utc_time = time();

      // set server time in challenge_detail session variable - FHM
      $challenge = Session::get('challenge');
      $challenge_detail = $challenge['challenge_detail']; 


      $offset_seconds= 3600 * $offset;

      $current_local_time = $utc_time + $offset_seconds;
	  $thishour = date('h', $current_local_time);

	  // get next available time slots - FHM
	  $nexthour = $thishour + 1;
	  //$hoursleft = (24 - $nexthour);

	  $timeslots = array();

	  for($i = 0; $i <= 11; $i++)
	  {
	  	$timeslots[] = $nexthour;
	  	$nexthour++;
	  }
	  
	  // add time to aray to be passed to view, use time as the variable - FHM
	  $time = array('current_local_time' => date('h:i:s a', $current_local_time), 'timeslots', $timeslots);
	  $this->challenge_time['time'] = $time;

	  // save changes to challenge_detail array - FHM
	  Session::set('challenge_detail', $challenge_detail);

	  // /print_r($this->challenge_time['challenge']['challengee']);
	  parent::$data = $this->challenge_time;
	} 

   // creates users for challenger and challengee if they're not already in db - FHM
   public function save($stop_time)
   {
	    $user = Session::get('user');
	    $challenge = Session::get('challenge');
	    $challenge_detail = Session::get('challenge_detail');

	    $challenger = Utility::createuser($user);

	     // adds id's to challenge session array - FHM
	    $challenge_detail['challenger_id'] = $challenger->id;
	   
	    // check if challengee has been set - FHM
	    if(isset($challenge_detail['challengee']))
	    {
	    	$challengee = Utility::createuser($challenge_detail['challengee']);
	    	$challenge_detail['challengee_id'] = $challengee->id;
	    }

	    // determine am or pm by extracting from stop time - FHM
	    $time_sign =  substr($stop_time, strlen($stop_time) - 2, 2);

	    // delete am/pm sign from string
	    $stop_time = substr_replace($stop_time, '', strlen($stop_time) - 2, 2);


	    if(($time_sign == 'pm' && strlen($stop_time) == 1) || ($time_sign == 'pm' &&  $stop_time >= 10 && $stop_time <= 12 ))
	    {
	    	$stop_time += 12;
	    }
	    else if($time_sign == 'am' && strlen($stop_time) == 2)
	    {
	    	$stop_time -= 12;
	    }

	    // create date time obj from inputted hour - FHM
	    $l_datetime = new DateTime();

		$l_datetime->setTime($stop_time, 00);

	    $challenge_detail['player_stop_time'] = $l_datetime->format('Y-m-d H:i:s');

	    // get user's timezone - FHM
	    $me = SocialEngine::loadUser('me()');
	    $offset =  $me[0]['fql_result_set'][0]['timezone'];


	    // convert user stop time into UTC time - FHM
	    $server_time =  $stop_time - $offset;

	    if($server_time > 24)
	    {
	    	$server_time -= 24;
	    }

	    // record server time in db - FHM
	    $s_datetime = new DateTime();
	    $s_datetime->setTime($server_time, 00); 
	    $challenge_detail['server_stop_time'] = $s_datetime->format('Y-m-d H:i:s');

	    // set default timezone to UTC - FHM
	  	date_default_timezone_set('UTC');

	    // record start time in db - FHM
	    $challenge_detail['player_start_time'] = new DateTime();

	    // update status - FHM
	    $challenge_detail['status'] = 'started';
	    $challenge = Utility::createchallenge($challenge, $challenge_detail, $challenger->id);

	    $this->notify($challenge);
   }

   // send notification to challengee and post to challenger's wall - FHM
	public function notify($challenge)
	{
		//get challenge detail object
		$challenge_detail = ChallengeDetail::find($challenge->challengedetail_id);
		$challenger = User::find($challenge_detail->challenger_id);
		
		$user_challenge_fplayer = Session::get('user_challenge_fplayer');
	
		// create user_challenge record for challenger and update with 'started' status (create also does a check if exists)
		Utility::createuserchallenge($challenger->id, $challenge->id, $user_challenge_fplayer);
		Utility::updateustatus($challenger->id, $challenge->id, 'started');

		// updates status challenge to 'started'
		Utility::updatecstatus($challenge->id,'started');

		$challenge_name = strtolower($challenge->name);


		if($challenge_detail->challengetype_id == 1)
		{
			// player 1 mode message
			$msgch = 'I challenged myself to \'' . $challenge_name . '\'! Cheer me on by liking this post!';

			// send to challenger and make this central post for challenger - FHM
			// POTENTIAL TOXIC POINT #1.1 - Error message is logged and toxic turns to 1, output to user in start
			$post1 = SocialEngine::postContent('feed', FB . '/viewchallenge/show/' . $challenge->id, $msgch, SocialEngine::$user_id, null, null, $challenge_detail->id);
	
			// add post id's to challenge record - This is the central post - FHM
			$challenge_detail->challenger_post = $post1;
		}
		// send to challengee if multi mode - FHM
		else if($challenge_detail->challengetype_id == 2)
		{
			//get challengee object
			$challengee = User::find($challenge->challenge_detail->challengee_id);

			//post on challenger's wall
			$msgch = 'I challenged ' . $challengee->name . ' to \'' . $challenge_name . '\'! Cheer me on by liking this post!';

			// post to challengees wall
			$msgchee = 'BOOM! ' . $challenger->name . '\'s challenging me to \'' . $challenge_name . '\'! Cheer me on by liking this post!';

			// POTENTIAL TOXIC POINT #2.1 - Error message is logged and toxic turns to 1, output to user in start -> central challenger post
			$post_chr = SocialEngine::postContent('feed', FB . '/viewchallenge/show/' . $challenge->id, $msgch, $challenger->fb_id, null, null, $challenge_detail->id);
			$challenge_detail->challenger_post = $post_chr;

			// POTENTIAL TOXIC POINT #2.2 - Error message is logged and toxic turns to 1, output to user in start -> central challengee post 
			$post_chee = SocialEngine::postContent('feed', FB . '/viewchallenge/show/' . $challenge->id, $msgchee, $challengee->fb_id, null, null, $challenge_detail->id);
			$challenge_detail->challengee_post = $post_chee;
			

			$user_challenge_splayer = Session::get('user_challenge_splayer');

			// create user challenge for challengee
			Utility::createuserchallenge($challenge_detail->challengee_id, $challenge->id, $user_challenge_splayer);
			Utility::updateustatus($challengee->id, $challenge->id, 'started');
		}

		$challenge_detail->save();
		header('Location:'.URL.'/viewchallenge/show/' . $challenge->id);		
	}
}