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
class Controller_Windvector extends Controller_Rest
{	
	// default to HTML, as this controller will serve a dual purpose of
	// displaying the page, and delivering json for the google map stuffs
	protected $rest_format = 'html';


	public function before() 
	{
		// for now, require login for everything; even this page
		if (!Auth::check()) {
		    Response::redirect('home/index');

		} else {
			//$this->init_header("windvector", "Wind Vector Map");
		}
	}


	/**
	 * Main
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$data['showAll'] = 0;
		if (isset($_GET['showAll'])) $data['showAll'] = 1;
		//if($format == 'html') {
			return Response::forge(View::forge('windvector/index', $data));

		//} else {
			// return an array here of the data you need; it should autmagicalyl be
			// converted to json so long as it is called with a .json extension:
			//	i.e: http://www.site.com/windvector/index.json
			//
			// see: http://fuelphp.com/docs/general/controllers/rest.html
		//}
	}


	public function after($response) {
		return $response;
		// any post processing you need will be done here
	}
	
}
