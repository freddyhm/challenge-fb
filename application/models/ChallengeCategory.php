<?php

/* The challenge category connects challenges - FHM */

class ChallengeCategory extends ActiveRecord\Model
{
	static $has_many = array(
		array('challenges'),
		array('suggested_challenges')
	);
}
?>