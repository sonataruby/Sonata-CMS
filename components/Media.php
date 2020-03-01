<?php 
namespace Components;
use \Components\Items;
class Media extends Items{

	public function UploadImage($arv=[]){
		return $this->view("media/upload_image", $arv);
	}

	public function UploadGallery($arv=[]){
		return $this->view("media/upload_gallery", $arv);
	}

	public function UploadFile($arv=[]){
		return $this->view("media/upload_file", $arv);
	}

	public function UploadYoutube($arv=[]){
		return $this->view("media/upload_youtube", $arv);
	}


	/*
	Views
	*/
	public function image($arv=[]){
		return $this->view("media/image", $arv);
	}


	public function gallery($arv=[]){
		return $this->view("media/gallery", $arv);
	}

	public function video($arv=[]){
		return $this->view("media/video", $arv);
	}

	public function slider($arv=[]){
		return $this->view("media/slider", $arv);
	}
}