<?php

// TO DO: Secure this page //

class Finish extends Controller
{
	private $challenge_detail;
	private $challenge;

	public function __construct()
	{
		parent::__construct();
	}

	// show the results (challengedetail)
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
			header('Location:/start');
		}
		
		if($challenge_detail->is_toxic == 0)
		{
			$challengee = User::find($challenge_detail->challengee_id); 

			// check if logged in user is challengee, if so, delete 1st post (houskeeping) - FHM
			if($challengee->fb_id == SocialEngine::$user_id)
			{
				// delete challengee's post only if it still exists
				if($challenge_detail->challengee_post)
				{
					SocialEngine::deleteObject($challenge_detail->challengee_post);	
				}
				
			}

		    $this->challenge = $challenge;

			$info = array();

			$info = Utility::showchallenge($challenge->id);

			parent::$data = $info;


			if($challenge_detail->status != 'finished')
			{
				$this->send($challenge->id);
			}
		}
		// check if challenge is toxic - FHM
		else if($challenge_detail->is_toxic == 1)
		{
			$error = addslashes($challenge_detail->error_msg);
		  	Session::set('error', $error);
		  	header('Location:/start');
		}
	}

	// send notice to every user that has cheered  + notice to challengee  
	public function send($challenge_id)
	{
		// will hold list of all the id's that cheered - FHM
		$friend_cheer_list = array();

		$challenge = Challenge::find($challenge_id);
		$challenge_detail = challengeDetail::find($challenge->challengedetail_id);

		$challenger = User::find($challenge_detail->challenger_id); 
		$challengee = User::find($challenge_detail->challengee_id); 

		$challenge_name = strtolower($challenge->name);
		

		if(Utility::checkchallenger($challenge))
		{
			//update the challenge status
			Utility::updatecstatus($challenge->id, 'finished');

			/* Cheer */
			$friend_cheer_list;

			// get the id's for the challenger's cheer side - FHM
			$chr_cheer = SocialEngine::getLikes($challenge_detail->challenger_post, $challenge_detail->id);

			$msg = 'The results are in! Did ' . $challenger->name . ' win the \'' . $challenge_name . '\' challenge?';

			if(!empty($chr_cheer[0]['fql_result_set'][0]))
			{
				// put challenger's cheer ids into array - FHM
				foreach($chr_cheer[0]['fql_result_set'][0]['likes']['friends'] as $friend)
				{
					$friend_cheer_list[] = $friend;
				}
			}

			if($challenge_detail->challengetype_id == 2)
			{
				$msg = 'The results are in! Did ' . $challengee->name . ' or ' . $challenger->name . ' win the \'' . $challenge_name . '\' challenge?';
				// get the id's for the challengee's side - FHM
				// POTENTIAL TOXIC POINT #1 
				$chee_cheer = SocialEngine::getLikes($challenge_detail->challengee_post, $challenge_detail->id);

				if(!empty($chee_cheer[0]['fql_result_set'][0]))
				{
					// put challengee's ids into array - FHM 
					foreach($chee_cheer[0]['fql_result_set'][0]['likes']['friends'] as $friend)
					{
						$friend_cheer_list[] = $friend;
					}
				}
			}

			if(!empty($chr_cheer[0]['fql_result_set'][0]))
			{
				$friend_cheer_list = array_unique($friend_cheer_list);

				if(($key = array_search($challenger->fb_id, $friend_cheer_list)) !== false)
				{
				    unset($friend_cheer_list[$key]);
				}

				if($challenge_detail->challengetype_id == 2 && !empty($chee_cheer[0]['fql_result_set'][0]))
				{
					if(($key = array_search($challengee->fb_id, $friend_cheer_list)) !== false)
					{
					    unset($friend_cheer_list[$key]);
					}
				}

				// go through all the ids and post on cheer wall - FHM
				foreach ($friend_cheer_list as $friend)
				{
					// POTENTIAL TOXIC POINT #2 
					SocialEngine::postContent('feed', FB . '/finish/show/' . $challenge_id , $msg, $friend, null, null, $challenge_detail->id, 'be_toxic');
				}

			}
			
			/* challenger and challengee */

			if($challenge_detail->challengetype_id == 2)
			{
				// POTENTIAL TOXIC POINT #3 
				SocialEngine::postContent('feed', FB . '/finish/show/' . $challenge_id , 'The results are in! Did ' . $challengee->name . ' win the \'' . $challenge_name . '\' challenge?', $challengee->fb_id, null, null, $challenge_detail->id);
			}

			// POTENTIAL TOXIC POINT #4 
			SocialEngine::postContent('feed', FB . '/finish/show/' . $challenge_id, 'The results are in! Did ' . $challenger->name . ' win the \'' . $challenge_name . '\' challenge?', $challenger->fb_id, null, null, $challenge_detail->id);
			

			if($challenge_detail->challenger_post)
			{
				// delete challenger's 1st post (housekeeping) - FHM
				SocialEngine::deleteObject($challenge_detail->challenger_post);
			}

			if($challenge_detail->expiry_notice_post)
			{
				// delete challenger's 2nd post (housekeeping) - FHM
				SocialEngine::deleteObject($challenge_detail->expiry_notice_post);
			}

			// set default timezone to UTC - FHM
  			date_default_timezone_set('UTC');
  			
			// record when challenger clicked link
			$challenge_detail->finish_time = new DateTime();
			$challenge_detail->save();
	    }
	}
}