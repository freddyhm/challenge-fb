<?php

/* 1. import our base files and kickstart our boot strap class - FHM */
error_reporting(1);
//error_reporting( E_ALL );


require 'application/controllers/utility.php';
require 'application/classes/socialengine.php';

require 'config/paths.php';
require 'config/database.php';

require LIBS . 'Bootstrap.php';
require LIBS . 'Controller.php';
require LIBS . 'View.php';
require LIBS . 'Session.php';
require LIBS . 'Database.php';

// init session variable class if session doesn't exist - FHM
if(!Session::exist())
{
	Session::init();
	SocialEngine::init();
}

$app = new Bootstrap();
