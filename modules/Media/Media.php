<?php
namespace Modules\Media;
use App\Controllers\BaseController;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Media extends BaseController
{
	public function index()
	{
		return $this->layout('media/home');
	}


	public function gallery($serial=""){

	}

	public function downloads($serial=""){

	}

	public function thumbails($w=200, $h=200, $src=""){

	}
}