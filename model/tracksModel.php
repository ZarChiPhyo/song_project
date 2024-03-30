<?php 

include_once '../include/db.php';

class TracksModel{

    public $con,$statement;

    function getTracks(){
        $this->con = Database::connect();
        $sql = "select * from tracks";
        $this->statement = $this->con->prepare($sql);
        if($this->statement->execute()){
            $results = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    function addTracks($title,$url,$album_id,$type_id){
        $this->con = Database::connect();
        $sql = "insert into tracks (track_title, url, album_id, type_id) values (:name, :link, :aid, :tid)";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(':name',$title);
        $this->statement->bindParam(':link',$url);
        $this->statement->bindParam(':aid',$album_id);
        $this->statement->bindParam(':tid',$type_id);
        return $this->statement->execute();
    }

    function getSong($title){
        $this->con = Database::connect();
        $sql = "select count(*) as total from tracks where track_title =:caption";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(':caption',$title);
        if($this->statement->execute()){
            $results = $this->statement->fetch(PDO::FETCH_ASSOC);
            return $results;
        }
    }

}

?>