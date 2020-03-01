<?php
namespace Modules\Media;
use App\Controllers\AdminController;
use \Modules\Media\Models\ManagerMedia as ModelsManager;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Manager extends AdminController
{
	public $url = "/media/manager/";
	
	public $title = "Manager";
	public $name = "Media";
	public function __construct(){
		$this->modelsManager = new ModelsManager;
		
		$this->validateViews('Media');

	}

	
	public function index()
	{
		return $this->layout('media/manager_dashboard',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"button" => "submit"
		]);
	}

	public function cpanel(){
		return view("media/cpanel");
	}

	public function breadcrumb(){
		return view("media/manager_breadcrumb");
	}
	public function record($id=0){
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			
		}
		$data = new \stdClass;
		if($id > 0){
			$data = $this->modelsManager->getRecord();
		}
		return $this->layout('media/record',[
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
		return $this->layout('media/record',[
			
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