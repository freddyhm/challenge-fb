<?php

/* Extracts friend's list and outputs the result - FHM */
class PickFriend extends Controller 
{

	//private $appEngine = SocialEngine::startEngine();
	private $indexNow = 0;

   public function __construct()
   {
	  parent::__construct();
   }

   // extracts friends from engine and sends array to view
   public function show($friend = null)
   {
      $friend_list = SocialEngine::loadFriendList();
      $challenge = Session::get('challenge');
      $list = array('challenge' => $challenge, 'friends' => $friend_list);

      //get friends
      if($friend)
      {
         echo json_encode($list['friends']);
      }
      else
      {
         parent::$data = $list;   
      }
   }

   // called by invite friends to cheer box. Takes in params through post and sends invites as wall posts
   public function invitecheer()
   {
      $friendlist = '';
      $challenge_id = '';

      if(isset($_POST['list']))
      {
         $friendlist = $_POST['list'];
      }

      if(isset($_POST['challenge_id']))
      {
         $challenge_id = $_POST['challenge_id'];
      }

      $challenge = Challenge::find($challenge_id);

      foreach($friendlist as $friend)
      {
         $post_id = SocialEngine::postContent('feed', FB . '/viewchallenge/show/' . $challenge->id, 'Hey my growple challenge is to ' . $challenge->name . '. Cheer me on!' , $friend->fb_id, null, null);
      }

      echo $post_id;
   }
}