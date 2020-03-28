<?php
namespace Modules\Forex;
use App\Controllers\BaseController;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Forex extends BaseController
{
	public function index()
	{
		return $this->layout('forex/home');
	}

}