<?php
namespace Libs;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use \Libs\Falsh;


class Seo extends Model
{
    protected $db;
    protected $pageNumber = "10";
    protected $pageQuery = [];
    protected $table      = 'seo';
    protected $primaryKey = 'seo_id';

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['seo_id','type','query_id','urlrewrite','title','description','keyword','image'];

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

    public function getURL($search=""): ?object{

        $user = new \stdClass;
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere(["urlrewrite" => $search],1);

        return $user->getRow();

    }

    public function getTitle($obj){
        return @$obj->seo_title ? @$obj->seo_title : @$obj->title;
    }

    public function getDescription($obj){
        return @$obj->seo_description ? @$obj->seo_description : @$obj->description;
    }

    public function getKeyword($obj){
        return @$obj->seo_keyword ? @$obj->seo_keyword : @$obj->keyword;
    }

    public function getRow($search=""): ?object{

        $user = new \stdClass;
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere(["query_id" => $search],1);

        return $user->getRow();

    }

    private function makeURL($string=""){

        return url_title($string,'-',true);
    }


    public function createURL(){
        
    }
    public function createRecord($key, $arv=[]){
    	if(!$this->getRow($key)){
            $this->db->table($this->table)->insert([
                "query_id" => $key,
                "urlrewrite" => $this->makeURL(@$arv["name"] ? $arv["name"] : $arv["title"]),
            ]);
        }else{
            $this->db->table($this->table)->update([
                "urlrewrite" => $this->makeURL(@$arv["name"] ? $arv["name"] : $arv["title"])
            ],["query_id" => $key]);
        }
    }
}