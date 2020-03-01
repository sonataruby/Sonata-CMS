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

class BaseController extends Controller
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
	protected $title;
	protected $description;
	protected $keyword;
	protected $image;
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

		if($this->session->has("locale")){
			$request->setLocale($this->session->has("locale"));
		}

		helper(['url','form','globals']);
		//$this->session->start();
		$this->db = db_connect();
		$this->input = $request;
		$this->user =  new Auth($this->db, $this->input);

		//print_r($this->user->isLogin(""));
	}


	public function setTitle($title=""){
		$this->title = $title;
	}


	public function setDescription($description){
		$this->description = $description;
	}


	public function setKeyword($keyword){
		$this->keyword = $keyword;
	}

	public function setLayout($file=""){
		$this->layout = $file;
	}



	public function layout(string $name, array $data = [], array $options = [])
    {
    	$CallIn = explode('\\',get_called_class());
    	array_pop($CallIn);
    	
    	$Paths = implode(array_merge([strtolower($CallIn[0]),$CallIn[1]],['Views']),'/');

    	$CallIn = implode(array_merge($CallIn,['Widgets']),'\\');
    	

    	$data = array_merge($data, ["account" => $this->user, "input" => $this->input,"Wingets" => $CallIn]);

    	
        return $this->minify_html(view(
            $this->layout,
            [
                'content' => view($name, $data, $options),
                'Wingets' => $CallIn,
                'title' => $this->title,
                'description' => $this->description,
                'keyword' => $this->keyword,
                'image' => $this->image
            ],
            $options
        ));
    }

    private function ContentView($name, $data, $options, $Paths){
    	/*
    	$request = new \Config\Paths;
    	
		if(!file_exists($request->viewDirectory."/{$name}.php")){
			
			return "{$name} not exit";
			
		}
		*/

    	return view($name, $data, $options);
    }

    

    public function minify_html($html)
	{
		
			

	   $search = array(
	    '/(\n|^)(\x20+|\t)/',
	    '/(\n|^)\/\/(.*?)(\n|$)/',
	    '/\n/',
	    '/\<\!--.*?-->/',
	    '/(\x20+|\t)/', # Delete multispace (Without \n)
	    '/\>\s+\</', # strip whitespaces between tags
	    '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
	    '/=\s+(\"|\')/'); # strip whitespaces between = "'

	   $replace = array(
	    "\n",
	    "\n",
	    " ",
	    "",
	    " ",
	    "><",
	    "$1>",
	    "=$1");

		$html = str_replace("\n","",preg_replace($search,$replace,$html));
		return $html;
	}

}


