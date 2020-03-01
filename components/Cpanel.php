<?php namespace Components;

class Cpanel{
	public function Loadhtml($arv=""){
		ob_start();
		
		if(file_exists(FCPATH . "templates/".$arv["load"].".php")){
			
			print_r(view($arv["load"]));
		}
		$data = ob_end_flush();
		return $data;
	}
}