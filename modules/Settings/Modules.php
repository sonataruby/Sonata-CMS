<?php
namespace Modules\Settings;
use App\Controllers\AdminController;
use \Modules\Settings\Models\ManagerSettings as ModelsManager;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Modules extends AdminController
{
	public $url = "/settings/manager/";
	public $cpanel = "settings/cpanel";
	public $breadcrumb = "settings/breadcrumb";
	public $title = "General";
	public $name = "Settings";
	public function __construct(){
		$this->modelsManager = new ModelsManager;
		$this->validateViews('Settings');

	}

	public function cpanel(){
		$this->modelsManager->setQuery(["is_system" => 0]);
		$data = $this->modelsManager->getModules();
		return view("settings/cpanel_module",["data" => $data]);
	}

	public function breadcrumb(){
		return view("settings/breadcrumb");
	}

	public function manager(){
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			$this->modelsManager->updateRecord($this->input->getPost("settings"));
			return redirect()->to('/settings/general');
		}
		return $this->layout("settings/modules_manager");
	}
}