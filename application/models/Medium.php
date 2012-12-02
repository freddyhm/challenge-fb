<?php

/* The medium model connects with challenges and meidum category - FHM */

class Medium extends ActiveRecord\Model
{
	static $belongs_to = array(
		array('challenge'),
		array('medium_category')
		);
}
?>