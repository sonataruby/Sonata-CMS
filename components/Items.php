<?php 
namespace Components;

class Items{
	protected $view = __DIR__."/views/";
	public function view($file="", $arv=[]){
		if(!file_exists($this->view.$file.".php")){
			return "Components {$file} not exists";
		}
		ob_start();
			$content = (object)$arv;
			include $this->view.$file.".php";
		$data = ob_end_flush();
		return $data;
	}


	public function pages(){
		
	}

	public function sitemap(){
		
	}
}