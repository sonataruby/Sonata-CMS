<?php namespace Modules\Auth;
use App\Controllers\BaseController;
class Access extends BaseController
{
	public function index()
	{
		return $this->layout('home');
	}

	public function login(){
		if($this->input->getMethod() == "post"){
			$email = $this->input->getPost("email");
			$password = $this->input->getPost("password");
			$this->user->setLogin($email,$password);

		}
		return $this->layout('auth/login');
	}

	public function register()
	{
		if($this->input->getMethod() == "post"){
			$email = $this->input->getPost("email");
			$password = $this->input->getPost("password");
			$this->user->create($email,$password);

		}
		return $this->layout('auth/register');
	}


	public function logout(){
		$this->session->destroy();
		return redirect()->to("/");
	}

	public function focus($child=""){
		$this->user->focusChild($child);
		return redirect()->to("/");
	}

	//--------------------------------------------------------------------

}
