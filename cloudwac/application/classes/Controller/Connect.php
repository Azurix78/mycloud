<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Connect extends Controller_Template {

	public function action_index()
	{
		$this->template->content = View::factory('home')->bind('user', $user);
		$this->template->title = "myCloud - Bienvenue sur myCloud";
		// Load the user information
		$user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			$this->redirect('/Connect/create');
		}
	}

	public function action_create() 
	{
		$this->template->content = View::factory('connect')
		->bind('errors', $errors)
		->bind('message', $message);
		$this->template->title = "myCloud - Inscription gratuite";
			
		if (HTTP_Request::POST == $this->request->method()) 
		{			
			try {
				// Create the user using form values
				$user = ORM::factory('user')->create_user($this->request->post(), array(
					'username',
					'password',
					'email'				
				));
				// Grant user login role
				$user->add('roles', ORM::factory('role', array('name' => 'login')));
				
				// Reset values so form is not sticky
				$_POST = array();
				
				// Set success message
				mkdir('./upload/'.$user->id);
				Session::instance()->set('success','Vous êtes inscrit.');
				$this->redirect('/Connect/login');
				
			} catch (ORM_Validation_Exception $e) {
				
				// Set failure message
				$message = 'Informations invalides.';
				
				// Set errors using custom messages
				$errors = $e->errors('models');
			}
		}
	}
	
	public function action_login()
	{
		$this->template->content = View::factory('login')
		->bind('message', $message);
		$this->template->title = "Login myCloud";
		

		if (HTTP_Request::POST == $this->request->method()) 
		{
			// Attempt to login user
			$remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
			$user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
			
			// If successful, redirect user
			if ($user) 
			{
				Session::instance()->set('success','Vous êtes connecté.');
				$this->redirect('/Home');
			} 
			else 
			{
				$message = 'Mauvais Logins';
			}
		}
	}
	
	public function action_logout() 
	{
		// Log user out
		Auth::instance()->logout();
		
		// Redirect to login page
		$this->redirect('/Connect/login');
	}

}
?>