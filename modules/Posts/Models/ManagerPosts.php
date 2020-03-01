<?php
namespace Modules\Posts\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use Modules\Falsh;


class ManagerPosts extends Model
{
    protected $db;
    public $input;
    
    protected $pageNumber = "10";
    protected $pageQuery = [];
    protected $table      = 'posts';
    protected $primaryKey = 'post_id';

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['post_id','post_name'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function setQuery($arv=[]){
        $this->pageQuery = array_merge($this->pageQuery, $arv);
    }

    public function getLastID($arv=[]): ?int{
        
        $data = (array)$this->db->query('SELECT LAST_INSERT_ID()')->getRow();
        return array_shift(array_values($data));
    }

    public function getRecord(): ?array{
        $user = [];
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere($this->pageQuery,$this->pageNumber);

        return $user->getResult();

    }

    public function getRow($id=0): ?object{

        $user = new \stdClass;
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere([$this->primaryKey => $id],1);

        return $user->getRow();

    }

    public function createRecord($arv=[]): ?bool{
        $this->db->table($this->table)->insert($arv);
        return true;
    }

    public function updateRecord($arv=[]): ?bool{
        $this->db->table($this->table)->update($arv,$this->pageQuery);
        return true;
    }
    public function deleteRecord(){
        $this->db->table($this->table)->delete($this->pageQuery);
    }
}