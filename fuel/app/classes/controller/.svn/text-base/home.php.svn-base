<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Home Controller.
 *
 * Display of the home dashboard
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Home extends Controller
{	
	public function before() 
	{
		// for now, require login for everything; even this page
		if (!Auth::check()) {
		     Response::redirect('users/login');
		} else {
			//$this->init("home", "Welcome to Njord weather systems");
		}
	}


	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('home/index'));
	}


	public function after($response) {
		return $response;
		// any post processing you need will be done here
	}
	
}
