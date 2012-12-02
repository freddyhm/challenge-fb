<?php

/* The challenge detail model connects challenge, user, and challenge type -  FHM */

class ChallengeDetail extends ActiveRecord\Model
{
	static $belongs_to = array(
			array('challenge'),
			array('user'),
			array('challenge_type')

		);
}
