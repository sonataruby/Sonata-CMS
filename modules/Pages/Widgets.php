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
class Widgets extends BaseController
{
	public function breadcrumb(){
		
		return view("breadcrumb",[]);
	}
}