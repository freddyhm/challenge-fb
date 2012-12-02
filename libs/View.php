<?php

/* base class for all views - FHM */

class View {

	function __construct() {
	}

	// check if data is sent in form of array, extract variable
	public function render($viewname, $data = null)
	{
		if(isset($data))
		{
			extract($data);	
		}
		
		$viewname = strtolower($viewname);

		require 'application/views/common/header.php';
		require 'application/views/' . $viewname . '.php';
		require 'application/views/common/footer.php';
	}
}