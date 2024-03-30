<?php 
include_once '../include/db.php';


class TypesModel{

    public $statement,$con;

    function getTypes(){
        $this->con = Database::connect();
        // print_r($this->con);
        $sql = "select * from music_types";
        $this->statement = $this->con->prepare($sql);
        if($this->statement->execute()){
            $results = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    function addTypes($type){
        $this->con = Database::connect();
        $sql = "insert into music_types(type_name) values(:typename)";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(':typename',$type);
        return $this->statement->execute();
    }

}

?>