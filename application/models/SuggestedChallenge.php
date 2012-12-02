<?php

/* The suggested challenge model connects challenge and challenge category-  FHM */

class SuggestedChallenge extends ActiveRecord\Model
{
	static $belongs_to = array(
			array('challenge'),
			array('challenge_category'),
			array('challenge_type')
		);
}
