<?php
namespace Modules\Forex;
use App\Controllers\AdminController;
use \Modules\Forex\Models\ManagerForex as ModelsManager;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Manager extends AdminController
{
	public $url = "/forex/manager/";
	
	public $title = "Manager";
	public $name = "Forex";
	public function __construct(){
		$this->modelsManager = new ModelsManager;
		
		$this->validateViews('Forex');

	}

	
	public function index()
	{
		return $this->layout('forex/dashboard',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url
		]);
	}

	public function cpanel(){
		return false;
	}

	public function breadcrumb(){
		return view("forex/manager_breadcrumb");
	}
	public function record($id=0){
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			
		}
		$data = new \stdClass;
		if($id > 0){
			$data = $this->modelsManager->getRecord();
		}
		return $this->layout('forex/record',[
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"record" => $data
		]);
	}


	public function create($id=0){
		$this->getRole("editer");
		if($this->input->getMethod() == "post"){
			
		}
		$data = new \stdClass;
		if($id > 0){
			$data = $this->modelsManager->getRow();
		}
		return $this->layout('forex/record',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"record" => $data
		]);
	}

	public function delete(){
		$this->getRole("editer","deleted");
	}
}