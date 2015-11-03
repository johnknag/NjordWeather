<?php

/**
 * Controller
 *
 * An extended version of the Controller class for use with Njord Weather Systems
 *
 * @package  app
 * @extends  Controller
 */
class Controller extends Fuel\Core\Controller
{
	protected $data;

	protected function init($view, $title) {
		$data['view'] = $view;
		$data['title'] = $title;		
	}

}