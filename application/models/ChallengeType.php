<?php

/* The challengetype model connects challenge details -  FHM */

class ChallengeType extends ActiveRecord\Model
{
	
	static $has_many = array(
			array('challenge_details'),
			array('suggested_challenges')
		);
}
