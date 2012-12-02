<?php

/* The challenge model connects with media, user_challenges, users, cheers, challenge category, challenge detail, suggested challenge - FHM */

class Challenge extends ActiveRecord\Model
{
	static $has_many = array(
			array('media'),
			array('user_challenges'),
			array('users', 'through' => 'user_challenges'),
			array('cheers')
		);
	
	static $belongs_to = array(
		array('challenge_category'),
		array('challenge_detail'),
		array('suggested_challenge')
		);

}
