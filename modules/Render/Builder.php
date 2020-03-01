<?php namespace Modules\Render;
use App\Controllers\AdminController;

class Builder extends AdminController
{
	public function index()
	{
		
		return $this->layout('builder/dashboard',["loadhtml" => 'builder/cpanel']);
	}

	public function module($a="",$b=""){
		$databaseList = $this->db->listTables();
		$primary_key = "";
		$allowField = [];
		if($this->input->getMethod() == "post"){
			helper('filesystem');
			$name = ucfirst(trim($this->input->getPost("module")));
			$databasedefault = strtolower(trim($this->input->getPost("databasedefault")));
			
			if($databasedefault && $this->db->tableExists($databasedefault)){
				$fields = $this->db->getFieldData($databasedefault);

				foreach ($fields as $field)
				{
				        if($field->primary_key == 1){
				        	$primary_key = $field->name;
				        }
				        $allowField[] = "'".$field->name."'";
				}
			}

			$controller = $this->input->getPost("controller");
			$controller = array_merge((array)$controller,["manager"]);
			$database = $this->input->getPost("database");

			if(!is_dir(ROOTPATH . "modules/{$name}")){
				$arv = ['Config','Helpers','Libraries','Models','Views','Views/'.strtolower($name),'Views/'.strtolower($name).'/admin'];
				foreach ($arv as $key => $value) {
					if(!is_dir(ROOTPATH . "modules/{$name}/{$value}")){
						mkdir(ROOTPATH . "modules/{$name}/{$value}",0777, TRUE);
					}
				}
				$client = file_get_contents(__DIR__."/public.txt");
				$info = file_get_contents(__DIR__."/info.txt");
				

				$search = ['{name}','{controller}','{home}','{url}','{cpanel}','{record}','{breadcrumb}','{database}','{fieldprivate}','{allowField}'];
				

				$client = str_replace($search, [$name, $name, strtolower($name).'/home','','',''], $client);
				
				$info = str_replace($search, [$name, $name, strtolower($name).'/home','','',''], $info);

				write_file(ROOTPATH . "modules/{$name}/{$name}.php", $client);
				
				write_file(ROOTPATH . "modules/{$name}/info.php", $info);

				$viewhome = file_get_contents(__DIR__."/views/view_home.txt");
				$viewhome = str_replace($search, [$name, $name, strtolower($name).'/home','','',''], $viewhome);
				write_file(ROOTPATH . "modules/{$name}/Views/".strtolower($name)."/home.php", $viewhome);


				

				foreach ($controller as $key => $value) {
					if(isset($database[$key]) && $this->db->tableExists($database[$key])){
						$wdb = "";
						$wfield = "";
					}else{
						$wdb = $databasedefault ? $databasedefault : "";
						$wfield = $primary_key ? $primary_key : "";
					}
					if(trim($value)){
						/*Admin Panel*/
						$admin = file_get_contents(__DIR__."/admin.txt");
						$admin_dashboard = file_get_contents(__DIR__."/views/admin/dashboad.txt");
						$admin_record = file_get_contents(__DIR__."/views/admin/record.txt");
						$admin_cpanel = file_get_contents(__DIR__."/views/admin/cpanel.txt");
						$admin_breadcrumb = file_get_contents(__DIR__."/views/admin/breadcrumb.txt");
						$models = file_get_contents(__DIR__."/models.txt");
						$admin = str_replace($search, [$name, ucfirst($value), strtolower($name).'/'.strtolower($value).'_dashboard','/'.strtolower($name).'/manager/',strtolower($name).'/'.strtolower($value).'_cpanel',strtolower($name).'/record',strtolower($name).'/'.strtolower($value).'_breadcrumb'], $admin);
						write_file(ROOTPATH . "modules/{$name}/".ucfirst($value).".php", $admin);
						
						$admin_dashboard = str_replace($search, [$name, $name, strtolower($name).'/'.strtolower($value).'_dashboard','','',''], $admin_dashboard);
						write_file(ROOTPATH . "modules/{$name}/Views/".strtolower($name).'/admin/'.strtolower($value).'_dashboard.php', $admin_dashboard);


						
						$admin_record = str_replace($search, [$name, $name, strtolower($name).'/'.strtolower($value).'_record','','',''], $admin_record);
						write_file(ROOTPATH . "modules/{$name}/Views/".strtolower($name).'/admin/'.strtolower($value).'_record.php', $admin_record);

						
						$admin_cpanel = str_replace($search, [$name, $name, strtolower($name).'/'.strtolower($value).'_cpanel','','',''], $admin_cpanel);
						write_file(ROOTPATH . "modules/{$name}/Views/".strtolower($name).'/admin/'.strtolower($value).'_cpanel.php', $admin_cpanel);

						
						$admin_breadcrumb = str_replace($search, [$name, $name, strtolower($name).'/'.strtolower($value).'_breadcrumb','','',''], $admin_breadcrumb);
						write_file(ROOTPATH . "modules/{$name}/Views/".strtolower($name).'/admin/'.strtolower($value).'_breadcrumb.php', $admin_breadcrumb);
						
						$models = str_replace($search, [$name, ucfirst($value).$name, strtolower($name).'/home','','','','',$wdb, $wfield,implode($allowField, ',')], $models);

						write_file(ROOTPATH . "modules/{$name}/Models/".ucfirst($value)."{$name}.php", $models);
					}
				}

			}
		}
		return $this->layout('builder/modules',["loadhtml" => 'builder/cpanel',"tables" => $databaseList]);
	}
	

	public function allowfield($database=""){
		$allowField = [];
		if($database && $this->db->tableExists($database)){
				$fields = $this->db->getFieldData($database);

				foreach ($fields as $field)
				{
				        if($field->primary_key == 1){
				        	$primary_key = $field->name;
				        }
				        $allowField[] = "'".$field->name."'";
				}
			}
		echo implode($allowField, ',');
	}
}
