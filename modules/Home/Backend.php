<?php namespace Modules\Home;
use App\Controllers\AdminController;
class Backend extends AdminController
{
	public function index()
	{
		return $this->layout('home');
	}

	//--------------------------------------------------------------------

}
