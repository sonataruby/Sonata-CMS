<?php
namespace Modules\Pages;
use App\Controllers\AdminController;
use \Libs\Pages as ModelsPages;
use \Libs\Seo as ModelsSeo;
use \Libs\Media as ModelsMedia;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Manager extends AdminController
{
	public $url = "/pages/manager/";
	public $cpanel = "pages/cpanel";
	public $breadcrumb = "pages/breadcrumb";
	public $title = "Manager";
	public $name = "Pages";
	
	public function __construct(){
		$this->modelsPages = new ModelsPages;
		$this->modelsSeo = new ModelsSeo;
		$this->validateViews('Pages');
		
	}

	
	public function index()
	{
		return $this->layout('pages/dashboard',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"button" => "create"
		]);
	}

	public function cpanel(){
		$data = new \stdClass;
		$this->modelsPages->setQuery(["parent_id" => 0]);
		
		$node = $this->modelsPages->getNode(0);
		
		return view("pages/cpanel",["node" => $node]);
	}

	
	

	public function breadcrumb(){
		return view("pages/breadcrumb");
	}



	public function record($id=0){
		$this->getRole("manager");
		if($this->input->getMethod() == "post"){

		}
		
		return $this->layout('pages/record',[
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"button" => "create"
		]);
	}


	public function create($id=0){
		$this->getRole("editer");
		if($this->input->getMethod() == "post"){

			if($id == 0 && $this->modelsPages->createRecord($this->input->getPost("Pages"), $this->input->getGet("parent"))){
				$id = $this->modelsPages->getLastId();
				$this->modelsSeo->createRecord("pages_{$id}",$this->input->getPost("Seo"));
				return redirect()->to('/pages/manager/create/'.$id);
			}else if($id > 0){
				$this->modelsPages->setQuery(["id" => $id]);
				$pageInput = $this->input->getPost("Pages");
				$this->modelsPages->updateRecord($pageInput);
				$this->modelsSeo->createRecord("pages_{$id}",array_merge((array)$this->input->getPost("Seo"),["title" => $pageInput["title"]]));
			}
			return redirect()->to('/pages/manager/create/'.$id);
		}

		$data = new \stdClass;
		$seo = new \stdClass;
		if($id > 0){
			$this->active_id = $id;
			$data = $this->modelsPages->getRow($id);
			$seo = $this->modelsSeo->getRow("pages_".$id);

		}
		return $this->layout('pages/create',[
			
			"title"		=> $this->title,
			"name"		=> $this->name,
			"url" => $this->url,
			"record" => $data,
			"seo" => $seo,
			"button" => "submit"
		]);
	}

	public function template(){
		return view("pages/template");
	}

	public function delete($id=0){
		$this->getRole("editer","deleted");
		$this->modelsPages->deleteRecord($id);
		return redirect()->to('/pages/manager/create/');
	}


	public function renderurl(){
		$url = $this->input->getPost("url");
		$seotitle = $this->input->getPost("name");
		$title = $this->input->getPost("title");
		$arv = $this->modelsSeo->createURL($url,$seotitle,$title);
		echo json_encode($arv);
	}
}