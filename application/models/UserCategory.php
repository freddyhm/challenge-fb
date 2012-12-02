<?php

/* The user category model connects with user challenges - FHM */

class UserCategory extends ActiveRecord\Model
{
	static $has_many = array(
			array('user_challenges')
		);
}
?>