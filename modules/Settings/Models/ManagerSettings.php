<?php
namespace Modules\Settings\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use Modules\Falsh;


class ManagerSettings extends Model
{
    protected $db;
    public $input;
    protected $table_modules = "modules";
    protected $table = "modules_settings";
    protected $fieldPrivate = "name";
    protected $pageNumber = "10";
    protected $pageQuery = [];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function setQuery($arv=[]){
        $this->pageQuery = array_merge($this->pageQuery, $arv);
    }
    public function getRecord(): ?object{
        $user = NULL;
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere($this->pageQuery,$this->pageNumber);

        $data = $user->getResult();
        $newData = new \stdClass;
        foreach ($data as $key => $value) {
            $newData->{$value->name} = $value->value;
        }
        return $newData;

    }

    public function getRow($module="", $filed=""): ?object{

        $user = NULL;
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere(["module" => $module, "name" => $filed],1);

        return $user->getRow();

    }

    private function updateRow($module,$keyData, $valueData){

        $this->db->table($this->table)->update([
            "value" => is_array($valueData) ? serialize($valueData) : $valueData
        ],["module" => $module,"name" => $keyData]);
    }

    private function insertRow($module,$keyData, $valueData){
        $this->db->table($this->table)->insert([
            "module" => $module,
            "name" => $keyData,
            "value" => is_array($valueData) ? serialize($valueData) : $valueData
        ]);
    }

   

    public function updateRecord($arv=[]){
        
        foreach ($arv as $key => $value) {
            $module = $key;
            $data = (array)$value;
            foreach ($data as $keyData => $valueData) {
                $row = $this->getRow($module,$keyData);
                if($row){
                    $this->updateRow($module,$keyData, $valueData);
                }else{
                    $this->insertRow($module,$keyData, $valueData);
                }
            }
        }
        
    }

    /*
    Modules
    */

    public function getModules(): ?array{
        $user = NULL;
        
        $query = $this->db->table($this->table_modules);
        
        $user = $query->getWhere($this->pageQuery,$this->pageNumber);

        $data = $user->getResult();
        return $data;
    }
    public function setModules($name="", $arv=[]){
        $query = $this->db->table($this->table_modules);
        
        $user = $query->getWhere(["name" => $name],1);

        $data = $user->getRow();
        if(!$data){
            $this->db->table($this->table_modules)->insert([
                "name" => $name,
                "description" => @$arv["description"],
                "version" => @$arv["version"],
                "updated_url" => @$arv["update_url"],
                "author" => @$arv["author"],
                "status" => 1
            ]);
        }
    }

    public function removeModules($name){
        $query = $this->db->table($this->table_modules)->getWhere(["name" => $name],1)->getRow();
        if($query->is_system == 0){
            $this->db->table($this->table_modules)->delete(["name" => $name]);
        }
    }
}