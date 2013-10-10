<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Share extends Controller_Template {

	public function action_index()
	{
		$this->template->title = "Share - Partager vos fichiers avec vos amis";
		$this->template->content = View::factory('share')
		->bind('user', $user)
		->bind('errors', $errors)
		->bind('message', $message)
		->bind('file', $file)
		->bind('share', $share);
		// Load the user information
		$user = Auth::instance()->get_user();
		
		// if a user is not logged in, redirect to login page
		if (!$user)
		{
			$this->redirect('/Connect/create');
		}
		
		$file = ORM::factory('file')->where('id_user', '=', $user->id)->find_all();

		if( count($file) == 0)
		{
			$file = FALSE;
		}

		$share = ORM::factory('share')->where('id_owner','=',$user->id);

		if( count($share) == 0)
		{
			$file = FALSE;
		}

		foreach ($share as $value)
		{
			$shared_files[] = $values->id_owner;
		}

		if(!isset($shared_files))
		{
			$shared_files = FALSE;
		}


	}

	public function action_add()
	{
		if (HTTP_Request::POST == $this->request->method()) 
		{
			$this->template->title = "Share - partagez vos fichiers avec vos amis !";
			$this->template->content = View::factory('file')
			->bind('user', $user)
			->bind('errors', $errors)
			->bind('message', $message)
			->bind('file', $file);

			$user = Auth::instance()->get_user();
			
			if (!$user)
			{
				$this->redirect('/Connect/create');
			}
			
			$validation = Validation::factory($this->request->post());
			$validation->rule('email', 'not_empty')->rule('email', 'regex', array(':value', '/[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/'));
			$validation->rule('file','not_empty');

			if($validation->check())
			{
				if
				$file = $share = ORM::factory('file')->where('id','=',$this->request->post('file'))->find();
				if($file->loaded())
				{
					$share = ORM::factory('share');
					$share->id_owner = $user->id;
					$share->email_share = $this->request->post('email');
					$share->name = $this->request->post('folder');
					$share->save();
				}
				

				$this->redirect('/File/index/'.$id);

			}
				
			$errors = $validation->errors('folder');
		}
		else
		{
			$this->redirect('/File/index/'.$id);
		}
		array(3)
		{
			["addshare"]=> string(8) "Partager"
			["email"]=> string(13) "asas.fr@df.de"
			["file"]=> string(2) "31"
		}

		var_dump($_POST);

		
	}

}