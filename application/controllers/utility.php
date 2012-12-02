<?php

class Utility 
{
	// write error to file and redirect to controller (start page) - FHM
	public static function error($err_msg, $controller = null)
	{
		$myFile = "logerrors.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");

		if(isset($msg))
		   $msg .= $err_msg . "\n" . "\n";	
		else
		   $msg = $err_msg . "\n" . "\n";

		fwrite($fh, $msg);
		fclose($fh);

		if(isset($controller))
		{
			$redirect = new $controller();
			$redirect->index();
		}
	}

   // checks the challenger's access token to see if it's up-to-date
   public static function checktoken($challenger_id)
   {
      $challenger = User::find($challenger_id);

      // access token is no longer same as the one int
      if($challenger->access_token != SocialEngine::$access_token)
      {
         $challenger->access_token = SocialEngine::$access_token;
         $challenger->save();
      }
   }

   // checks to see if user is already in db - FHM
   public static function checkacct($fb_id)
   {
      $user = User::find('one', array('conditions' => array('fb_id=?', $fb_id)));
      return $user;
   }

   // checks if logged in fb usr is challengee - FHM
   public static function checkchallengee($challenge)
   {
		$challengee_id =  $challenge->challenge_detail->challengee_id;

		// get challenge's challengee facebook id - FHM
		$challengee_fb_id = User::find($challengee_id)->fb_id;

     // echo 'logged in:' . SocialEngine::$user_id . '   ';

     // echo $challengee_fb_id;
   //  echo $challengee_fb_id . '  ';

      //echo SocialEngine::$user_id;

		return SocialEngine::$user_id == $challengee_fb_id;
   }

   // checks if logged in fb usr is challenger - FHM
   public static function checkchallenger($challenge)
   {
		$challenger_id =  $challenge->challenge_detail->challenger_id;

		// get challenge's challengee facebook id - FHM
		$challenger_fb_id = User::find($challenger_id)->fb_id;

		return SocialEngine::$user_id == $challenger_fb_id;
   }

   public static function checkuchallenge($user_id, $challenge_id)
   {
		// see if user_challenge record exists - FHM
		$user_challenge = UserChallenge::find('one', array('conditions' => array('user_id=? AND challenge_id=?', $user_id, $challenge_id)));

		return $user_challenge;
   }


   // strips out tags that aren't part of strings
   public static function sanitize($name)
   {
        //strip away backslash inserted by browser for apostrophe
        $name = str_replace('\\', '', $name);

   	  return filter_var($name, FILTER_SANITIZE_STRING);
   }

   // 
   public static function getsuggs($id)
   {
   	 return SuggestedChallenge::find($id);
   }

   public static function createuser($session_user)
   {
   		$user = self::checkacct($session_user['fb_id']);

   		if(!$user)	
   		{

	   		$user = new User();
	   		$user->fb_id = $session_user['fb_id'];
	   		$user->name = $session_user['name'];
        $user->sex = $session_user['sex'];
	   		$user->pic_small = $session_user['pic_small'];
	   		$user->pic_big = $session_user['pic_big'];
	   		$user->pic_square = $session_user['pic_square'];

        if(isset($session_user['source']))
        {
          $user->source = $session_user['source'];
        }
        
	   		$user->save();
	   	}

         // add access token for offline access if it has changed or hasn't been set yet (60 days)
         self::checktoken($user->id);

   		return $user;
   }


   public static function createchallenge($session_challenge, $session_challenge_d, $challenger_id)
   {
  		$challenge_detail = new ChallengeDetail();

  		$challenge_detail->challenger_id = $challenger_id;

  		if(isset($session_challenge_d['challengee_id']))
  		{	
  			$challenge_detail->challengee_id = $session_challenge_d['challengee_id'];
  		}
  		

  		$challenge_detail->challengetype_id = $session_challenge_d['challengetype_id'];
  		$challenge_detail->player_start_time = $session_challenge_d['player_start_time'];
      $challenge_detail->player_stop_time = $session_challenge_d['player_stop_time'];
  	
  		$challenge_detail->server_stop_time = $session_challenge_d['server_stop_time'];
  		$challenge_detail->status = $session_challenge_d['status'];
      $challenge_detail->challenger_token = $session_challenge_d['challenger_token'];
      
  		$challenge_detail->save();

   		$challenge = new Challenge();

   		$challenge->challengedetail_id = $challenge_detail->id;

   		if(isset($session_challenge['challengecategory_id']))
   		{
   			$challenge->challengecategory_id = $session_challenge['challengecategory_id'];		
   		}
   	

   		if(isset($session_challenge['suggestedchallenge_id']))
   		{
   			$challenge->suggestedchallenge_id = $session_challenge['suggestedchallenge_id'];
   		}

   		$challenge->name = $session_challenge['name'];

   		$challenge->save();
   		return $challenge;
   }

   public static function createuserchallenge($user_id, $challenge_id, $session_user_challenge)
   {
   		$user_challenge = self::checkuchallenge($user_id, $challenge_id);

   		if(!$user_challenge)	
   		{
	   		$user_challenge = new UserChallenge();

	   		$user_challenge->user_id =  $user_id;
	   		$user_challenge->challenge_id = $challenge_id;
	   		$user_challenge->usercategory_id = $session_user_challenge['usercategory_id'];

	   		$user_challenge->save();
   		}

   	return $user_challenge;
   }

   public static function updateustatus($user_id, $challenge_id, $msg)
   {
		$user_challenge = UserChallenge::find('one', array('conditions' => array('user_id=? AND challenge_id=?', $user_id, $challenge_id)));      
      $user_challenge->state = $msg;
		$user_challenge->save();
   }

   public static function updatecstatus($challenge_id, $msg)
   {
      
   		$challenge = Challenge::find($challenge_id);
   		$challenge_detail = ChallengeDetail::find($challenge->challenge_detail->id);
   		$challenge_detail->status = $msg;
         $challenge_detail->total_cheers = 5;
   		$challenge_detail->save();

   }

   public static function updateuser($challenge_detail, $player_id)
   {
         $user = User::find($player_id);

         if($challenge_detail->winner_id == $player_id)
         {
            $user->wins += 1;
         }
         else if($challenge_detail->loser_id == $player_id)
         {
            $user->losses += 1;
         }
         else if($challenge_detail->is_tie == 1)
         {
            $user->ties += 1;
         }

         $user->total_challenges += 1;
         $user->save();
   }


   // syncs cheers wit db from the central post
   public static function updatecheers($challenge_id, $cheers)
   {
      $challenge = Challenge::find($challenge_id);
      $challenge_detail = ChallengeDetail::find($challenge->challenge_detail->id);

      // check if the source is from fb and the player type, if so update with the array - FHM

      if($cheers['likes']['challenger']['source'] == 'fb')
      {
         $challenge_detail->challenger_cheers = $cheers['likes']['challenger']['count'];
      }

      if($challenge_detail->challengetype_id == 2 && ($cheers['likes']['challengee']['source'] == 'fb'))
      {
         $challenge_detail->challengee_cheers = $cheers['likes']['challengee']['count'];
      }

      // save to db
      $challenge_detail->save();
   }

   public static function showchallenge($challenge_id)
   {
		$challenge_arr = array();
		$message = '';

		// get challenge - FHM
		$challenge = Challenge::find($challenge_id);
		// get type (solo/multi) - FHM
		$type = $challenge->challenge_detail->challengetype_id;

		$challenge_name = $challenge->name;
		$challenge_player_stop_time = $challenge->challenge_detail->player_stop_time;

		// get user info based on challenge - FHM
		$challenger_obj = User::find($challenge->challenge_detail->challenger_id);
		$challenger_arr = $challenger_obj->to_array();

		$challenge_detail_obj = $challenge->challenge_detail;
		$challenge_detail_arr = $challenge_detail_obj->to_array();

		// add challenger array to details array - FHM
		$challenge_detail_arr['challenger'] = $challenger_arr;

	    // check type of challenge (multi vs solo) - FHM
	    if($type == 2)
	    {
	    	$challengee_obj = User::find($challenge->challenge_detail->challengee_id);

	    	$challengee_arr = $challengee_obj->to_array();

	    	// add challengee array to details array - FHM
	    	$challenge_detail_arr['challengee'] = $challengee_arr;

	    	 if(Utility::checkchallengee($challenge) && ($challenge_detail_arr['status'] == 'sent request' || $challenge_detail_arr['status'] == 'viewed by challengee'))
		    {
		    	$message = 'is challengee';

            // update challengee's user challenge, check if it exists, if not create and update - FHM
            Utility::createuserchallenge($challenge_detail_obj->challengee_id, $challenge->id, array('usercategory_id' => 2));
		    	Utility::updateustatus($challenge_detail_obj->challengee_id, $challenge->id, 'viewed challenge');
		    	Utility::updatecstatus($challenge->id, 'viewed by challengee');
		    }
		}

	    if(Utility::checkchallenger($challenge))
	    {
	    	$message = 'is challenger';
	    }
	    else if(!isset($message))
	    {
	    	$message = 'unknown user';
	    }

       $challenge_detail_arr['message'] = $message; 

		// wrap our array in 'challenge' index (make show and load method output w/ same name convention) - FHM
		$challenge_arr = array('name' => $challenge_name, 'id' => $challenge->id, 'challenge_detail' => $challenge_detail_arr);
		$info = array('challenge' => $challenge_arr);

		return $info;
   }

}