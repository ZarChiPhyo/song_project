<?php 
include_once '../include/db.php';


class AlbumsModel{

    public $statement,$con;

    function getAlbums(){
        $this->con = Database::connect();
        $sql = "select * from albums";
        $this->statement = $this->con->prepare($sql);
        if($this->statement->execute()){
            $results = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    function addAlbums($title,$rdate){
        $this->con = Database::connect();
        $sql = "insert into albums(album_name, release_date) values (:name, :release)";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(':name',$title);
        $this->statement->bindParam(':release',$rdate);
        return $this->statement->execute();
    }

}

?>