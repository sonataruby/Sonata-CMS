<?php namespace Modules\Auth;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use Modules\Falsh;
class Models extends Model
{
    protected $db;
    protected $session;
    protected $request;
    protected $IpAddress;
    protected $UserAgent;
    protected $tb_user="account";
    protected $tb_groups="account_groups";
    protected $tb_roles="account_roles";
    protected $tb_user_child="account_child";
    protected $tb_user_profile = "account_profile";
    protected $info;
    protected $active_default = 1;
    protected $language_default = 'english';

    public function __construct(ConnectionInterface &$db, $input=NULL)
    {
        $this->db =& $db;
        $this->session = session();

        if($input){
	        $this->request = \Config\Services::request();
	        $this->IpAddress = $input->getIPAddress();
	        $this->UserAgent = $input->getUserAgent();
	    }
    }

    public function isLogin() : bool{
    	$session = $this->getSession();
    	if(!is_null($session) && $session->logged_in == true){
    		return true;
    	}
    	return false;
    }

    public function isAdmin(){
    	$session = $this->getSession();
    	if(!is_null($session) && $session->logged_in == true){
    		return true;
    	}
    	return false;
    }

    public function isAccess(){

    }

    public function isMod(){
    	
    }

    public function focusChild($child){
    	$data = array_merge($this->session->get("userlogin"),["child" => $child]);
    	$this->session->set(["userlogin" => $data]);
    }

    public function getSession(){
    	if($this->session->has("userlogin")){
	    	return (object)$this->session->get("userlogin");
	    }
	    return NULL;
    }

    public function info(): ?object{
    	$this->info = NULL;
    	if($this->session->has("userlogin") && is_null($this->info)){
	    	$this->info = $this->getData($this->getSession()->email);
	    	unset($this->info->password_hash);
	    }
	    return $this->info;
    }

    public function setLogin( $email = NULL , $password=NULL): bool
	{
		
		$data = $this->getData($email);

		if(!is_null($data)){

			if($this->password_verify($password, $data->password_hash)){
				$userlogin = 
					["userlogin" => [
							"account_id" => $data->account_id, 
							"role" => $data->role, 
							"email" => $data->email, 
							"username" => $data->username, 
							"first_name" => $data->first_name, 
							"last_name" => $data->last_name, 
							"last_login" => $data->last_login, 
							"last_ip" => $data->last_ip,  
							
							"display_name" => $data->display_name, 
							"timezone" => $data->timezone, 
							"language" => $data->language,
							"avatar"	=> $data->avatar,
							"child"     => $data->child,
							"logged_in" => true
						]
					];
				$this->session->set(["locale" => @$data->language ? $data->language : service('request')->getLocale()]);
				$this->session->set($userlogin);
				return true;
			}
		}
		return false;

	}

	private function password_verify( $str, $hash ): bool
	{
		return password_verify( $str, $hash );
	}

	private function hash( $str, $algo = PASSWORD_DEFAULT, $cost = 12 ): string
	{
		return password_hash( $str, $algo, ['cost' => $cost] );
	}


	public function create( $email, $password ): bool
	{
		$data = $this->getData($email);
		$password = $this->hash($password);

		list($username, $dot) = explode('@', $email);

		if(is_null($data)){
			
			$this->db->table($this->tb_user)->insert([
				'email' => $email,
				'username' => $username,
				'password_hash' => $password,
				'active' => $this->active_default,
				'timezone' => 'GMT7',
				'language' => $this->language_default,
				'display_name' => strtoupper($username)
			]);
			return true;
		}
		return false;

	}

	public function getData($arv=NULL): ?object{
		$user = NULL;
		$sql = '
			SELECT u.* 
			FROM '.$this->tb_user.' u
			WHERE (
				LOWER( u.username ) = ? OR
				LOWER( u.email ) = ?
			)
			GROUP BY u.account_id
			LIMIT 1';

		$query = $this->db->query( $sql, [
			strtolower($arv),
			strtolower($arv)
		]);

		$user = $query->getRow();

		if(!is_null($user)){
			$profile = $this->getAvatar($user->account_id);
			if(!is_null($profile)){
				$user->avatar = $profile->avatar_url;

			}else{
				$user->avatar = "/assent/image/avatar.jpg";
			}
			$child = $this->getChildFirst($user->account_id);
			if(!is_null($child)){
				$user->child = $child->account_serial;
				$user->child_name = $child->account_serial_name;
			}else{
				$user->child = "N/A";
				$user->child_name = "N/A";
			}
		}

		return $user;
	}

	public function getAvatar($arv=NULL): ?object{
		$user = NULL;
		$sql = '
			SELECT u.* 
			FROM '.$this->tb_user_profile.' u
			WHERE (
				LOWER( u.account_id ) = ?
			)
			GROUP BY u.account_id
			LIMIT 1';

		$query = $this->db->query( $sql, [
			strtolower($arv)
		]);

		$user = $query->getRow();

		

		return $user;
	}


	public function getChild(){
		$user = NULL;
		
		$query = $this->db->table($this->tb_user_child);
		
		$user = $query->getWhere(["account_id" => $this->info()->account_id],10);


		return $user->getResult();
	}

	private function getChildFirst($account_id): ?object{
		$user = NULL;
		
		$query = $this->db->table($this->tb_user_child);
		
		$user = $query->getWhere(["account_id" => $account_id],1)->getRow();


		return $user;
	}
	
}