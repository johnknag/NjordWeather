<?php
return array(
	'_root_'  			=> 'home/index',  		// The default route
	'_404_'   			=> 'home/index',    	// The main 404 route

	'login'				=> 'home/index',		// login page

	'windvector'		=> 'windvector/index',	// wind vector map
	'stationdata'		=> 'stationdata/index',	// station data
	
	
	'hello(/:name)?' 	=> array('welcome/hello', 'name' => 'hello'),
);