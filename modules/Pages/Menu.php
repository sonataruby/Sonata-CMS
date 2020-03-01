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
class Menu extends BaseController
{
	public function __construct(){
		$this->modelsPages = new ModelsPages;
		$this->modelsSeo = new ModelsSeo;
	}
	public function navbar($url="")
	{
		$data = new \stdClass;
		$this->modelsPages->setQuery(["parent_id" => 0]);
		$node = $this->modelsPages->getNode(0);
		
		return view('pages/navbar',['node' => $node]);
	}

}