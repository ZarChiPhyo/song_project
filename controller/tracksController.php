<?php 

include_once '../model/tracksModel.php';

class TracksController{

    public $track;

    public function __construct()
    {
        $this->track = new TracksModel();
    }

    function getTracks(){
        return $this->track->getTracks();
    }

    function addTracks($title,$url,$album_id,$track_id){
        return $this->track->addTracks($title,$url,$album_id,$track_id);
    }

    function getSong($title){
        return $this->track->getSong($title);
    }

}

?>