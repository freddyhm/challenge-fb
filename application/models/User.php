<?php

/* The user model connects with user challenges and cheers - FHM */

class User extends ActiveRecord\Model
{
	static $has_many = array(
		array('user_challenges')
	  );
}
?>