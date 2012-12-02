<?php

class Result extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// send result selection if the inputs are legit and logged in user fb id is same as challenger fb id  - FHM
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
		
		if($challenge_detail->is_toxic == 0)
		{
			if(Utility::checkchallenger($challenge))
			{
				// set default timezone to UTC - FHM
	  			date_default_timezone_set('UTC');
	  			
				// record when challenger clicked link
				$challenge_detail->update_time = new DateTime();
				$challenge_detail->save();

				$info = array();
				$info = Utility::showchallenge($challenge->id);

				parent::$data = $info;
			}
			else if($challenge_detail->status == 'finished')
			{
				header('Location:'.URL.'/finish/show/' . $challenge->id);
			}
			else if($challenge_detail->status == 'started')
			{
				header('Location:'.URL.'/viewchallenge/show/' . $challenge->id);
			}
			else
			{
				header('Location:'.URL.'/start');
			}

		}
		else if(SocialEngine::$user_id && $challenge_detail->is_toxic == 1)
		{
			$error = addslashes($challenge_detail->error_msg);
		  	Session::set('error', $error);
		  	header('Location:'.URL.'/start');
		}
		

	}


	// set winner, loser, tie depending on what the user select
	public function response($challenge_id, $outcome, $player_num)
	{
		// verify if input is legit
		$challenge = Challenge::find($challenge_id);
		$challenge_detail = ChallengeDetail::find($challenge->challengedetail_id);
		$type = $challenge_detail->challengetype_id;

		if($challenge_detail->is_toxic == 0)
		{
				// depending on which player won, update the challenge's table
			if($player_num == 1)
			{
				if($outcome == 'won')
				{
					$challenge_detail->winner_id = $challenge_detail->challenger_id;
				}	
				else
				{
					$challenge_detail->loser_id = $challenge_detail->challenger_id; 
				}
			}
			else if($player_num == 2 && $outcome == 'won')
			{
				$challenge_detail->winner_id = $challenge_detail->challengee_id; 
				$challenge_detail->loser_id = $challenge_detail->challenger_id;
			}
			else if($outcome == 'tied')
			{
				$challenge_detail->is_tie = 1;
				$challenge_detail->winner_id = null; 
				$challenge_detail->loser_id = null;
			}

			// update user_challenger's status & user status
			Utility::updateustatus($challenge_detail->challenger_id, $challenge->id, $outcome);
			Utility::updateuser($challenge_detail, $challenge_detail->challenger_id);

			// update user_challengee's & user status if challengee is set
			if(SocialEngine::$user_id && $challenge_detail->challengee_id)
		 	{
				Utility::updateustatus($challenge_detail->challengee_id, $challenge->id, $outcome);
				Utility::updateuser($challenge_detail, $challenge_detail->challengee_id);
			}
			
			
			$challenge_detail->save();

			header('Location:'.URL.'/finish/show/' . $challenge->id);

		}
		else if($challenge_detail->is_toxic == 1)
		{
			$error = addslashes($challenge_detail->error_msg);
		  	Session::set('error', $error);
		  	header('Location:'.URL.'/start');
		}

		
	}


	/*
	// called by a CRON job, when the challenge is up - FHM
	public function update($challenge_detail_id)
	{	
		$challenge = Challenge::find('one', array('conditions' => "challengedetail_id = " . $challenge_detail_id));
		$challenger = User::find($challenge->challenge_detail->challenger_id);

		// render name lowercase - FHM
		$challenge_name = strtolower($challenge->name);
		
		// post content to challenger's wall - FHM
		SocialEngine::postContent('feed', 'https://apps.facebook.com/growple/result/show/' . $challenge->id, 'Your challenge ' . $challenge_name . '  is up! Click the link to update it!', $challenger->fb_id, null, null);
	}
	*/
}