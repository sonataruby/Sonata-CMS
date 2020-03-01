<?php
namespace Libs;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use \Libs\Falsh;
use \Libs\Seo as ModelsSeo;

class Pages extends Model
{
    protected $db;
    public $input;
    
    protected $pageNumber = "10";
    protected $pageQuery = [];
    protected $table      = 'pages';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','revision_id','user_id','parent_id','template_id','meta_id','language','type','title','navigation_title','navigation_title_overwrite','hidden','status','publish_on','data','created_on','edited_on','allow_move','allow_children','allow_edit','allow_delete','sequence'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $request;
    protected $locale="en";

    public function setService(){
        $this->request = service('request');
        $this->locale = $this->request->getLocale();
    }
    public function setQuery($arv=[]){
        $this->pageQuery = array_merge($this->pageQuery, $arv);
    }

    public function getRecord(): ?array{
        $this->setService();
        $user = new \stdClass;
        
        $query = $this->db->table($this->table);
        $this->pageQuery["language"] = $this->locale;
        $user = $query->getWhere($this->pageQuery,$this->pageNumber);

        return $user->getResult();

    }

    public function getRow($id=0): ?object{
        $this->setService();
        $user = new \stdClass;
        
        $query = $this->db->table($this->table);
        
        $user = $query->getWhere([$this->primaryKey => $id],1);

        return $user->getRow();

    }

    public function getLastId(){
    	$data = (array)$this->db->query('SELECT LAST_INSERT_ID()')->getRow();
        return array_shift(array_values($data));
    }

    public function createRecord($arv=[], $parent=0): ?bool{
        $this->setService();
        $this->db->table($this->table)->insert([
            "title" => $arv["title"],
            "parent_id" => $parent == NULL ? 0 : $parent,
            "language" => $this->locale
        ]);
        
        return true;
    }


    public function updateRecord($arv=[]): ?bool{
         $this->db->table($this->table)->update([
            "title" => $arv["title"]
        ],$this->pageQuery);
         return true;
    }

    public function deleteRecord($id=0){

        $this->db->table($this->table)->update(["is_deleted" => 1],["id" => $id]);
        $node = $this->getNode($id);
        foreach ($node as $key => $value) {
            $this->db->table($this->table)->update(["is_deleted" => 1],["id" => $value->id]);
            if(is_array($value["child"])){
                $this->deleteRecord($value->id);
            }
        }
    }

    public function getNode($parent=0){
        $this->setService();
        $node = [];
        $seo = new ModelsSeo;
        $query = $this->db->table($this->table);
        $data = $query->getWhere(["parent_id" => $parent, "language" => $this->locale,"is_deleted" => 0])->getResult();
        foreach ($data as $key => $value) {
            $child = "";
            $dataCound = $query->getWhere(["parent_id" => $value->id])->getResultArray();
            if(count($dataCound) > 0){
                $child = $this->getNode($value->id);
            }
            $getURL = $seo->getRow("pages_".$value->id);
            $node[] = ["id" => $value->id, "pid" => $value->parent_id, "name" => $value->title, "child" => $child, "url" => @$getURL->urlrewrite];
            
        }
        return $node;
    }


    public function getWidgets($page_id){
        $query = $this->db->table("pages_widgets");
        $data = $query->getWhere(["page_id" => $page_id, "language" => $this->locale,"is_deleted" => 0])->getResult();
        $arv = [];
        foreach ($data as $key => $value) {
            $arv[] = [
                "name" => $value->widget_name,
                "class" => $value->widget_class,
                "content" => $value->widget_contents
            ];
        }
        return $arv;
    }
}