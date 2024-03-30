<?php 

include_once '../model/albumsModel.php';

class AlbumsController{

    public $album;

    function __construct()
    {
        $this->album = new AlbumsModel();
    }

    function getAlbums(){
        return $this->album->getAlbums();
    }

    function addAlbums($name,$rdate){
        return $this->album->addAlbums($name,$rdate);
    }
}

?>