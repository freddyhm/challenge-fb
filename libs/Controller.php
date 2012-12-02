<?php
/* base class for all controllers - FHM */

class Controller {

	// used to send data to the view
	public static $data;

	// create view object
	public function __construct() 
	{
		$this->view = new View();
		// auto call index whenever the controller is called - FHM
		
	}

	// render view
	public function index()
	{
	  $this->view->render(get_class($this), self::$data);
	}

}