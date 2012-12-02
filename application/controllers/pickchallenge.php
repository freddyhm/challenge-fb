<?php

/*   - FHM  */

class PickChallenge extends Controller {

   private $challenge;

   public function __construct()
   {
      parent::__construct();
   }

   // create new challenge (type is 1-solo or 2-multi)- FHM
   public function add($type)
   {
      // get logged in user's friend - FHM
      $result = SocialEngine::loadUser('me()');
      $me = $result[0]['fql_result_set'][0];

      // set logged in user - FHM
      $user = array();

      // rename index from uid to fb_id - FHM
      $user = $me; 
      $user['fb_id'] = $user['uid'];
      unset($user['uid']);
      
      // create challenge_detail array and set params - FHM
      $challenge_detail = array();
      $challenge_detail['challenger'] = $user;
      $challenge_detail['challengetype_id'] = $type;
      $challenge_detail['challenger_token'] = SocialEngine::$access_token;

      // create first player user challenge array and set - FHM
      $user_challenge_fplayer = array();
      $user_challenge_fplayer['status'] = 'created challenge';
      $user_challenge_fplayer['usercategory_id'] = 1;

       // create challenge array and set
      $challenge = array();
      $challenge['challenge_detail'] = $challenge_detail;
      $challenge['challenge_detail']['status'] = 'created';

      // set session variables with arrays
      Session::set('user', $user);
      Session::set('challenge_detail', $challenge_detail);
      Session::set('challenge', $challenge);
      Session::set('user_challenge_fplayer', $user_challenge_fplayer);

      // solo mode
      if($type == 1)
      {
         $steps = Session::get('steps');
         $steps[] = 'solo';
         Session::set('steps', $steps);
      }

      $this->showcat($type);
   }

   // saves challenge name in database - FHM
   public function setname($input)
   {
      $challenge = Session::get('challenge');

      if(is_numeric($input))
      {
         // search suggested challenges, return and set challenge. Set input - FHM
         $is_suggested = Utility::getsuggs($input);

         if($is_suggested)
         {
            $challenge['challengecategory_id'] = $is_suggested->challengecategory_id;
            $challenge['name'] = $is_suggested->name;
            $challenge['suggestedchallenge_id'] = $is_suggested->id;
         }
      }
      else if(is_string($input))
      {
         $clean_name = Utility::sanitize(urldecode($input));
         $challenge['name'] = $clean_name;   
      }

      Session::set('challenge', $challenge);

      $challenge_detail = Session::get('challenge_detail');

      if($challenge_detail['challengetype_id'] == 1)
         header('Location:'. URL .  '/sendchallenge/show');
      else if ($challenge_detail['challengetype_id'] == 2)
         header('Location:' . URL . '/pickfriend/show');
   }
      

   // gets categories from databse and sends names to view - FHM
   public function showcat($type)
   {
   
      $challenge_list = SuggestedChallenge::find('all', array('conditions' => array('challengetype_id=?', $type)));    
      $cat_arr = array();

      foreach ($challenge_list as $value)
      {
         $cat_arr[] = $value->to_array();
      }

      $info = array('categories' => $cat_arr);
   
      parent::$data = $info;
   }
}