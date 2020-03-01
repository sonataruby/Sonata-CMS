<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use \Modules\Auth\Models as Auth;
class AdminController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	protected $db;
	protected $user;
	public $layout = "layout";
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		
		if (session_status() == PHP_SESSION_NONE)
        {
			$this->session = session();
		}
		
		//$this->session->start();

		/*Change Locale*/
		if($this->session->has("locale")){
			$request->setLocale($this->session->has("locale"));
		}
		
		helper(['url','form','globals']);
		$this->db = db_connect();
		$this->input = $request;
		$this->user =  new Auth($this->db, $this->input);

		if(!$this->user->isAdmin()){
			
		}
	}
	public function layout(string $name, array $data = [], array $options = [])
    {
    	$CallIn = get_called_class();
    	
    	
    	$data = array_merge($data, ["account" => $this->user, "input" => $this->input,"Wingets" => $CallIn]);
    	
        return view(
            $this->layout,
            [
                'content' => view($name, $data, $options),
                'Wingets' => $CallIn
            ],
            $options
        );
    }

    public function setGlobals(){
    	
    }

    public function validateViews($paths=""){
		$path = PUBLIC_PATH . '/templates/' .strtolower($paths);
		$source = ROOTPATH . 'Modules/'.$paths.'/Views/' .strtolower($paths);
		$admin = FCPATH . '/templates/' .strtolower($paths);
		
		if(!is_dir($path) || defined("OVER_WRITE")){
			helper('filesystem');
			$map = directory_map($source, 1);
			if(!is_dir($path)) mkdir($path, 0777, true);
			foreach ($map as $key => $value) {
				if(is_file($source."/".basename($value))) copy($source."/".basename($value), $path."/".basename($value));
				
			}

			

		}
		if(!is_dir($admin) || defined("OVER_WRITE")){
			helper('filesystem');
			$map = directory_map($source."/admin", 1);
			
			if(!is_dir($admin)) mkdir($admin, 0777, true);
			foreach ($map as $key => $value) {
				if(is_file($source."/admin/".basename($value))) copy($source."/admin/".basename($value), $admin."/".basename($value));
				
			}
		}
	}


	public function getRole($arv=""){

	}
}

