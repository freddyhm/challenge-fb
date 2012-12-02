<?php

/* The user challenge model connects with cheers and user category- FHM */

class UserChallenge extends ActiveRecord\Model
{
	static $has_many = array(
			array('cheers')
		);

	static $belongs_to = array(
			array('user'),
			array('user_category'),
			array('challenge')

		);
}
?>