<?php namespace Modules\Render;
use App\Controllers\AdminController;
class Dashboard extends AdminController
{
	public function index()
	{
		return $this->layout('home');
	}

	public function conbo($a="",$b=""){
		print_r($b);
	}
	//--------------------------------------------------------------------

}
