<?php

require_once '/home/freddyhm/public_html/vendors/php-activerecord/ActiveRecord.php';
require_once '/home/freddyhm/public_html/libs/Controller.php';
require_once '/home/freddyhm/public_html/libs/View.php';
require_once '/home/freddyhm/public_html/application/controllers/result.php';
require_once '/home/freddyhm/public_html/application/controllers/utility.php';
require_once '/home/freddyhm/public_html/scripts/facebook/php-sdk/src/facebook.php';

// db config 

define('DB_TYPE','');
define('DB_HOST','localhost');
define('DB_NAME','');
define('DB_USER','');
define('DB_PASS','');
define('MODEL_DIR','');

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(MODEL_DIR);
    $cfg->set_connections(array(
        'development' => DB_TYPE . '://' . DB_USER . ':' . DB_PASS . '@' . DB_HOST . '/' . DB_NAME ));
});


// fb config info

$config = array();
$config[‘appId’] = ''; // Insert App ID
$config[‘secret’] = ''; // Insert secret token

$facebook = new Facebook($config);



// search through all the challenges, match current time with stop time, if match call page to send notice - FHM

// declare time variables - FHM
date_default_timezone_set(UTC);

$now = getdate();
$thishour = $now['hours'];

$challenge_detail_arr = array();
$challenge_details = ChallengeDetail::find('all');


// declare variables to be used in loops - FHM
$challenge_detail;
$challenge;
$challenge_name;
$challenge_id;
$notices = array();

// turn every challenge detail into array form and store in new array - FHM
foreach($challenge_details as $challenge_detail)
{
	 $challenge_detail_arr[] = $challenge_detail->to_array();
}

// go thrugh challegne detail array and push selected challengedetail_id's that are expired and correspond with the current hour - FHM
foreach($challenge_detail_arr as $detail)
{
	$challengehour = substr($detail['server_stop_time'], 11, 2);

	// only send notice if it's the expired hour, notice hasn't been sent, and the status of the challenge is accept or started (1p vs 2p)
	if(($challengehour == $thishour) && $detail['sent_expiry_notice'] == 0 && $detail['status'] == 'started' && $detail['is_toxic'] == 0)
	{
		// push this detail id in array - FHM
		array_push($notices, $detail['id']);
	}
}


foreach($notices as $id)
{
	$challenge = Challenge::find($id);
	$challenge_detail = ChallengeDetail::find($challenge->challengedetail_id);

	$challenge_name = strtolower($challenge->name);

	$msg = 'Your challenge \'' . $challenge_name . '\' is up! Click the link to update it!';
	$name = 'My awesome \''  .  $challenge_name . '\' challenge';
	$description = 'Growple! is a fun app that lets you challenge yourself and your friends to anything and everything! Start your own challenge today!';
	$link = 'https://apps.facebook.com/growple/result/show/' . $challenge->id . '';
	$picture =  'https://bidloo.ca/public/img/wallpost.png';
	$access_token = $challenge_detail->challenger_token;


	$path = '/' . $challenger->fb_id . '/feed';
	$params = array('access_token' => $access_token, 'message' => $msg, 'link' => $link, 'picture' => $picture, 'name' => $name, 'description' => 'Growple! is a fun app that lets you challenge yourself and your friends to anything and everything! Start your own challenge today!', 'caption' => ' ');

	
	try {
		
		// send fb post
		$ret_obj = $facebook->api($path, 'POST', $params);
		$post_id = $ret_obj['id'];
		echo $post_id;

		// record results in database
		$challenge_detail->expiry_notice_post = $post_id;
		$challenge_detail->sent_expiry_notice = 1;
		$challenge_detail->expiry_notice_time = date("Y-m-d H:i:s");
		$challenge_detail->save();

	}
	catch(FacebookApiException $e)
	{
		// If the user is logged out, you can have a
		// user ID even though the access token is invalid.
		// In this case, we'll get an exception, so we'll
		// just ask the user to login again here.
		
		//write errors to log and alert user - FHM
		$err_msg = 'Error in checkchallenge.php:' . $e->getType() . '  ' . $e->getMessage() . ' challenge_detail_id:' . $challenge_detail->id;
		echo $err_msg;
		Utility::error($err_msg);
	}
	catch(Exception $e)
	{
		//write errors to log
		$err_msg = 'Error in checkchallenge.php: Message: ' . $e->getMessage()  . ' challenge_detail_id:' . $challenge_detail->id;
		echo $err_msg;
		Utility::error($err_msg);
	}
}

?>