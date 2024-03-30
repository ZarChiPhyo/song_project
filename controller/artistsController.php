<?php 

include_once '../model/atristsModel.php';

class ArtistController{

    public $artist;

    function __construct()
    {
        $this->artist = new artistModel();
    }

    function getAtrtists(){
        return $this->artist->getArtists();
    }

    function addArtists($aname,$acountry,$aphoto){
        return $this->artist->addArtists($aname,$acountry,$aphoto);
    }

    function getName($name){
        return $this->artist->getName($name);
    }
}

?>