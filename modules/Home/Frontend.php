<?php 
namespace Modules\Home;
use App\Controllers\BaseController;
//use \Libs\Firebase;
class Frontend extends BaseController
{
	public function index()
	{
		//$firebase = new Firebase("https://smartiq-291982.firebaseio.com", "KK1vtuzDOVQt0bBRLNBObNtRntHlJHXPZMM51npe");
		//print_r($firebase->push("chatRoom",["chatContent" => "New Trader %s opened:\n%s at %s\nLots ( %s ) Stoploss : ( %s ) Takeprofit ( %s )\nTime : %s","thumnail" => "", "userName" => "Ai the"]));
		return $this->layout('home');
	}

	//--------------------------------------------------------------------

}
