<?php namespace Modules\Auth;
use App\Controllers\BaseController;
class Settings extends BaseController
{
	public function index()
	{
		return $this->layout('auth/dashboard');
	}
	public function profile()
	{
		return $this->layout('auth/profile');
	}
}