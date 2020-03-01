<?php
namespace Modules\Settings;
use App\Controllers\AdminController;
use \Modules\Settings\Models\ManagerSettings as ModelsManager;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class General extends AdminController
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
		return view("settings/cpanel",["data" => $data]);
	}

	public function index()
	{
		
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			$this->modelsManager->updateRecord($this->input->getPost("settings"));
			return redirect()->to('/settings/general');
		}

		$this->modelsManager->setQuery(["module" => "Core"]);
		$data = $this->modelsManager->getRecord();
		
		return $this->layout('settings/general',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"data" => $data
		]);
	}



	public function email()
	{
		$this->title = "Email";
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			$this->modelsManager->updateRecord($this->input->getPost("settings"));
			return redirect()->to('/settings/general/email');
		}
		
		$this->modelsManager->setQuery(["module" => "Core"]);
		$data = $this->modelsManager->getRecord();
		
		return $this->layout('settings/settings_email',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"data" => $data
		]);
	}



	public function seo()
	{
		$this->title = "SEO Manager";
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			$this->modelsManager->updateRecord($this->input->getPost("settings"));
			return redirect()->to('/settings/general/seo');
		}
		
		$this->modelsManager->setQuery(["module" => "Core"]);
		$data = $this->modelsManager->getRecord();
		
		return $this->layout('settings/settings_seo',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"data" => $data
		]);
	}




	public function module($type="", $name=""){
		$this->title = "Modules Manager";
		$this->getRole("manager");

		if($type == "install" && is_dir(ROOTPATH."modules/".$name)){
			$this->installModules($name);
		}

		if($type == "uninstall" && is_dir(ROOTPATH."modules/".$name)){
			$this->uninstallModules($name);
		}

		if($this->input->getMethod() == "post"){
			$this->modelsManager->updateRecord($this->input->getPost("settings"));
			return redirect()->to('/settings/general/module');
		}
		
		
		//$this->modelsManager->setQuery(["is_system" => 0]);
		$data = $this->modelsManager->getModules();
		$atech = [];
		foreach ($data as $key => $value) {
			$atech[$value->name] = $value->name;
		}
		$dataLocale = $this->scanModules($atech);

		return $this->layout('settings/modules',[
			"loadhtml" => $this->cpanel,
			"breadcrumb" => $this->breadcrumb,
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"data" => $data,
			"dataLocale" => $dataLocale
		]);
	}

	private function scanModules($obj){
		$arvs = glob(ROOTPATH."modules/*",GLOB_ONLYDIR);
		
		$data = [];
		foreach ($arvs as $key => $value) {
			$name = basename($value);

			if(!in_array(basename($name), $obj) && file_exists($value."/info.php")){
				$arv = [];
				include $value."/info.php";
				$data = array_merge($arv, $data);
			}
			
		}
		return $data;
	}

	private function installModules($name=""){
		$info = ROOTPATH."modules/{$name}/info.php";
		if(file_exists($info)){
			$arv = [];
			include $info;
			$this->modelsManager->setModules($name, $arv);
		}
	}

	private function uninstallModules($name){
		$this->modelsManager->removeModules($name);
	}
}