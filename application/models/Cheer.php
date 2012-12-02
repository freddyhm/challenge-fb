<?php

/* The cheer model connects with users and challenges  - FHM */

class Cheer extends ActiveRecord\Model
{
	static $belongs_to = array(
		array('challenge')
	);
}
?>