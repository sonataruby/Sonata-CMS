<?php
namespace Modules\Posts;
use App\Controllers\BaseController;
//--------------------------------------------------------------------
// CRM Auto Pool
// Contact thietkewebvip@gmail.com
//--------------------------------------------------------------------
class Posts extends BaseController
{
	public function index()
	{
		return $this->layout('posts/home');
	}

}