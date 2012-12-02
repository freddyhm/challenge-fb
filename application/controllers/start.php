<?php

/* tracks users footprint, redirects to prev page if user hasn't visited other pages */

/*
$steps = Session::get('steps');

if(isset($steps))
{
   if(!in_array('start', $steps))
   {
      $steps[] = 'start';
      Session::set('steps', $steps);
   }
}
else
{
   $steps = array('start');
   Session::set('steps', $steps);
}
*/
/*  - FHM  */

class Start extends Controller {

   function __construct()
   {
      parent::__construct();

      // outputs message if error has been set - FHM
      if(Session::get('error'))
      {
         echo "<script>alert('" . Session::get('error') . "')</script>";
         Session::set('error', '');
      }
   }

   // track where users are coming from - FHM
   function in($source)
   {
      $result = SocialEngine::loadUser('me()');
      $me = $result[0]['fql_result_set'][0];

       // set logged in user - FHM
      $user = array();

      // rename index from uid to fb_id - FHM
      $user = $me; 
      $user['fb_id'] = $user['uid'];
      unset($user['uid']);
      $user['source'] = $source;

      $growple_user = Utility::createuser($user);
      return $growple_user;
   }

   function sharecount($num, $fb_id)
   {
      $user = Utility::checkacct($fb_id);

      if(!$user)
      {
         $user = $this->in('invite_box');  
      }

      $user->invite_friends += $num;
      $user->save();
   }
}