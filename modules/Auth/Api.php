<?php 
namespace Modules\Auth;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Restserver\Libraries\Format;
class Api extends BaseController
{
	use ResponseTrait;
	public function register()
	{
		$params = (object)json_decode(file_get_contents('php://input'), TRUE);
		
		if($this->input->getMethod() == "post"){
			$email = $params->email;
			$password = $params->password;
			
			if($this->user->create($email,$password) == true){
				return $this->respondCreated((array)$this->user->getData($email));
			}else{
				return $this->respondCreated(NULL, 404);
			}

		}
		return $this->respondCreated(NULL, 404);
		
	}
	
	public function login()
	{
		$params = (object)json_decode(file_get_contents('php://input'), TRUE);
		
		if($this->input->getMethod() == "post"){
			$email = $params->email;
			$password = $params->password;
			if($this->user->setLogin($email,$password) == true){
				return $this->respondCreated((array)$this->user->getData($email));
			}else{
				return $this->respondCreated(NULL, 404);
			}

		}
		return $this->respondCreated(NULL, 404);
	}
}