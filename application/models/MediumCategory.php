<?php

/* The medium category model connects with media - FHM */

class MediumCategory extends ActiveRecord\Model
{
	static $has_many = array(
			array('media')
		);

}
?>