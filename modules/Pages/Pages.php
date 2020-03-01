<?php
namespace Modules\Pages;
use App\Controllers\BaseController;
use \Libs\Seo as ModelsSeo;
use \Libs\Pages as ModelsPages;
use \Libs\Media as ModelsMedia;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Pages extends BaseController
{
	public function __construct(){
		$this->modelsPages = new ModelsPages;
		$this->modelsSeo = new ModelsSeo;
	}
	public function index($url="")
	{
		$data = (array)$this->modelsSeo->getURL($url);
		$page_id = str_replace('pages_', '', $data["query_id"]);
		$pageData = (array)$this->modelsPages->getRow($page_id);
		$pageWidgets = (array)$this->modelsPages->getWidgets($page_id);
		$info = array_merge($pageData, $data,["widget" => $pageWidgets]);
		
		
		$this->setTitle($this->modelsSeo->getTitle((object)$info));
		$this->setDescription($this->modelsSeo->getDescription((object)$info));
		$this->setKeyword($this->modelsSeo->getKeyword((object)$info));
		
		$pagelayout = $this->getLayout('layout/'.$info->template_name);
		return $this->layout($pagelayout,["row" => (object)$info]);
	}

	private function getLayout($file=""){
		
		$request = new \Config\Paths;
		if(file_exists($request->viewDirectory."/{$file}.php")){
			return $file;
		}
		return "layout/pages";
	}


	
}