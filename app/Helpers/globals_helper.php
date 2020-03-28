<?php

function is_home(){
	$request = \Config\Services::request();
	if($request->uri->getTotalSegments() == 0){
		return true;
	}
	return false;
}

function is_ajax(){
	$request = \Config\Services::request();
	if($request->uri->isAJAX()){
		return true;
	}
	return false;
}

function is_json(){
	$request = \Config\Services::request();
	if($request->uri->getJSON()){
		return true;
	}
	return false;
	
}

function IncludeFile($file=""){
	$request = new \Config\Paths;
	if(file_exists($request->viewDirectory."/{$file}.php")){
		include $request->viewDirectory."/{$file}.php";
	}
}

/*Widget & Plugins*/
function Widgets($obj, $action="", $arv=[]){
	$class = '\\'.$obj.'::'.$action;
	
	if(method_exists('\\'.$obj, $action)){
		return view_cell($class,$arv);
		//return true;
	}
	
	return false;
}

function getWidget($arv=[], $postion="left"){
	if(isset($arv[$postion]) || !empty($arv[$postion])){
		foreach ($arv[$postion] as $key => $value) {
			$data = [];
			print_r(view_cell($value["class"],$data));
		}
	}
}
function Plugins($obj, $action="", $arv=[]){
	list($c,$action) = explode('::', $obj);

	$class = '\Plugins\\'.$obj;
	if(method_exists('\Plugins\\'.$c, $action)){
		view_cell($class,$arv);
	}

}

/*Components*/
function Components($obj, $arv=[]){
	list($c,$action) = explode('::', $obj);

	$class = '\Components\\'.$obj;
	if(method_exists('\Components\\'.$c, $action)){
		view_cell($class,$arv);
	}

	if(defined("DEBUG")){
		echo $class." not exists";
	}
	
}