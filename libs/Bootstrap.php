<?php

/* 2. We grab the url and parse so the proper controller is called - FHM */

class Bootstrap 
{
	public function __construct() 
	{
		// extract and trim last '/'' in URL - FHM 
	    // get url only if it has been set - FHM
		$url = (isset($_GET['url'])) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		//sanitize URL
		//$url = filter_var($url, FILTER_SANITIZE_URL);
		// create array from url - FHM 
		$url = explode('/', $url);

		$this->reroute($url);
	}

	public function reroute($url)
	{
		$file = 'application/controllers/' . $url[0] . '.php';	

		// handle case where there is no specific page specified in url -> send to a new index page - FHM
		if(empty($url[0]))
		{
			require('application/controllers/start.php');
			$start = new start();
			Utility::error('Bootstrap: no specific page specified in url', $start);
			return false;
		}

		// look for file, import the file, log error, send to start page - FHM
		if (file_exists($file)) 
		{
			require $file;
		} 
		else 
		{
			require('application/controllers/start.php');
			$start = new start();
			Utility::error('Bootstrap: page/controller does not exist', $start);
			return false;
		}
		
		// instantiate controller
		$controller = new $url[0];

		// called with 3 arguments, reroute to proper function and pass data ex: /start/add/d/1/2 or /start/add/1/2/3- FHM
		
		if(isset($url[5]))
		{
			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}($url[3], $url[4], $url[5]);
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2], $url[3], $url[4], $url[5]);

					$controller->index();
				}		
			}
			else
			{
				if($url[0] != 'start')
					require('application/controllers/start.php');

				$start = new start();
				Utility::error('Bootstrap in 4 args: method does not exist', $start);
				return false;
			}
		}
		else if(isset($url[4]))
		{
			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}($url[3], $url[4]);
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2], $url[3], $url[4]);

					$controller->index();
				}		
			}
			else
			{
				if($url[0] != 'start')
					require('application/controllers/start.php');

				$start = new start();
				Utility::error('Bootstrap in 3 args: method does not exist', $start);
				return false;
			}
		}
		// called with 2 arguments, reroute to proper function and pass data  ex:/start/add/d/1  or /start/add/1/2 - FHM
		else if(isset($url[3]))
		{
			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}($url[3]);
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2], $url[3]);

					$controller->index();
				}
			}
			else
			{
				if($url[0] != 'start')
					require('application/controllers/start.php');

				$start = new start();
				Utility::error('Bootstrap in 2 args: method does not exist', $start);
				return false;
			}
		}
		// called w/1 arguments ex: /start/add/d/ or /start/add/1
		else if (isset($url[2])) 
		{
			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}();
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2]);

					$controller->index();
				}
			}
			else
			{
				if($url[0] != 'start')
					require('application/controllers/start.php');

				$start = new start();
				Utility::error('Bootstrap in 1 args: method does not exist', $start);	
				return false;
			}
			
		} 
		// called w/0 arguments ex:/start/add
		else if (isset($url[1])) 
		{
			if(method_exists($controller, $url[1]))
			{
				$controller->{
				$url[1]
				}();

				$controller->index();
			}
			else
			{
				if($url[0] != 'start')
					require('application/controllers/start.php');

				$start = new start();
				Utility::error('Bootstrap in 0 args: method does not exist', $start);	
				return false;
			}
		}
		else
		{
			

			$controller->index();

			/*
			// if a function is called with no arguments, reroute index  ex: /start/add - FHM
			// or if a controller is called without a function, reroute to inded ex: /start/ - FHM
			if (isset($url[1]) || isset($url[0])) 
			{
				$controller->index();
			}
			*/
		}
	}	
}
