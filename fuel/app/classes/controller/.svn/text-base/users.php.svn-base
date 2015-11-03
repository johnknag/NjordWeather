<?php

class Controller_Users extends Controller_Template
{
	public function before() {
		Lang::load('login');
		Config::load('application', true);		
	}


	public function action_login()
	{
		$data['form'] = 'login';

		// already logged in?
		if (\Auth::check())
		{
			// yes, so go back to the page the user came from, or the
			// application dashboard if no previous page can be detected
			//\Messages::info(__('login.already-logged-in'));
			\Response::redirect_back('windvector/index');
		}
	
		// was the login form posted?
		if (\Input::method() == 'POST')
		{
			// check the credentials.
			if (\Auth::instance()->login(\Input::param('username'), \Input::param('password')))
			{
				// did the user want to be remembered?
				if (\Input::param('remember', false))
				{
					// create the remember-me cookie
					\Auth::remember_me();
				}
				else
				{
					// delete the remember-me cookie if present
					\Auth::dont_remember_me();
				}
				// logged in, go back to the page the user came from, or the
				// application dashboard if no previous page can be detected				
				\Response::redirect('windvector/index');
			}
			else
			{
				// login failed, show an error message
				//\Messages::error(__('login.failure'));
				$data['errors'][] = 'Wrong username/password combo.';
				
				return \View::forge('users/login', $data);
			}
		}
	
		// display the login page
		return \View::forge('users/login', $data);
	}

	public function action_logout()
	{
		// remove the remember-me cookie, we logged-out on purpose
		\Auth::dont_remember_me();
	
		// logout
		\Auth::logout();
	
	//	// inform the user the logout was successful
	//	\Messages::success(__('login.logged-out'));
	
		// and go back to where you came from (or the application
		// homepage if no previous page can be determined)
		\Response::redirect_back();
	}


	public function action_register() {
		$data['form'] = 'register';

		if ( !\Config::get('application.user.registration', false))
	    {
	        // inform the user registration is not possible
		$data['errors'][] =  __('register.errors.registation-not-enabled');	 
	        $data['form'] = 'register';         
	    }

		if (Input::method() == 'POST')
		{
			$errors = null;
			if(!$this->validateRegistration($errors)) {
				$data['errors'] = $errors;
				$data['form'] = 'register';

			} else {
				try {
					if(!Auth::create_user(Input::param("username"), Input::param("password"), Input::param("email"))) {
						$data['errors'][] = __("register.errors.account-creation-failed");
						$data['form'] = 'register';

					} else {
						$data['messages'][] = __("register.messages.registration-success");
						$data['form'] = 'login';
					}

				} catch (\SimpleUserUpdateException $e) {
					// duplicate email address
	                if ($e->getCode() == 2)
	                {
	                    $data['errors'][] = __('register.errors.email-already-exists');
	                } 
	                elseif ($e->getCode() == 3) // duplicate username
	                {
	                    $data['errors'][] = __('register.errors.sername-already-exists');
	                }	                
	                else // this can't happen, but you'll never know...
	                {
	                    $data['errors'][] = $e->getMessage();
	                }
	                $data['form'] = 'register';
				}
			}
		}

		//Response::redirect('site/about');
		return \View::forge('users/login', $data);
	}


	private function validateRegistration(&$errors) {
		$val = Validation::forge();
		$val->add('username', 'Username')->add_rule('required');
		$val->add('email', 'E-Mail address')->add_rule('required');
		$val->add('password', 'Password')->add_rule('required');
		$val->add('passwordVerify', 'Password verification')->add_rule('match_field', 'password');

		if(!$val->run()) {
			$errors = $val->error();
			return false;
		}

		return true;
	}
}
