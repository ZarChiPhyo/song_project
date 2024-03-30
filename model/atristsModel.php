<?php 
include_once '../include/db.php';


class ArtistModel{

    public $statement,$con;

    function getArtists(){
        $this->con = Database::connect();
        $sql = "select * from artists";
        $this->statement = $this->con->prepare($sql);
        if($this->statement->execute()){
            $results = $this->statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }

    function addArtists($aname,$acountry,$aphoto){
        $this->con = Database::connect();
        $sql = "insert into artists(artist_name, artist_country, artist_photo) values (:artist, :location, :image)";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(':artist',$aname);
        $this->statement->bindParam(':location',$acountry);
        $this->statement->bindParam(':image',$aphoto);
        return $this->statement->execute();
    }

    function getName($name){
        $this->con = Database::connect();
        $sql = "select count(*) as total from artists where artist_name =:caption";
        $this->statement = $this->con->prepare($sql);
        $this->statement->bindParam(':caption',$name);
        if($this->statement->execute()){
            $results = $this->statement->fetch(PDO::FETCH_ASSOC);
            return $results;
        }
    }

}

?>