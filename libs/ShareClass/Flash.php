<?php 
namespace Libs;
use \Config\Services;
class Flash{
	private $flash;
	public function __construct()
    {
    	$this->flash = Services::session();
    }
    public function setError($arv=[]){
    	$this->flash->setFlashdata("error",$arv);
    }

    public function getError($arv=[]): ?string{
    	$data = $this->flash->getFlashdata("error");
    	$html = '';
    	if(is_array($data)){
    		foreach ($data as $key => $value) {
    			# code...
    		}
    	}
    	return $html;
    }
}