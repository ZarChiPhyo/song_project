<?php 

include_once '../model/typesModel.php';

class TypesController{

    public $types;

    public function __construct()
    {
        $this->types = new TypesModel();
    }

    function getTypes(){
        return $this->types->getTypes();
    }

    function addTypes($type){
        return $this->types->addTypes($type);
    }

}

?>