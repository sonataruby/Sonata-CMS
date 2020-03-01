<?php
namespace Modules\Posts;
use App\Controllers\AdminController;
use \Modules\Posts\Models\ManagerPosts as ModelsManager;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Manager extends AdminController
{
	public $url = "/posts/manager/";
	
	public $title = "Manager";
	public $name = "Posts";
	public function __construct(){
		$this->modelsManager = new ModelsManager;
		
		$this->validateViews('Posts');

	}

	
	public function index()
	{
		return $this->layout('posts/manager_dashboard',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url
		]);
	}

	public function cpanel(){
		return view("posts/manager_cpanel");
	}

	public function breadcrumb(){
		return view("posts/manager_breadcrumb");
	}
	public function record($id=0){
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){
			
		}
		$data = new \stdClass;
		if($id > 0){
			$data = $this->modelsManager->getRecord();
		}
		return $this->layout('posts/record',[
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
		return $this->layout('posts/record',[
			
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