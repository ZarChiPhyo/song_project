<?php 

include_once '../layout/sidebar.php';
include_once '../controller/tracksController.php';
include_once '../controller/albumsController.php';
include_once '../controller/typesController.php';

$tracks = new TracksController();


$albums = new AlbumsController();
$album_lists = $albums->getAlbums();

$types = new TypesController();
$type_lists = $types->getTypes();


if(isset($_POST['add'])){
    $error = false;
    //var_dump($_FILES['mp-3']);
    $filename = $_FILES['mp-3']['name'];
    $fileError = $_FILES['mp-3']['error'];
    $filesize = $_FILES['mp-3']['size'];
    $fileinfo = explode('.',$filename);
    $filetype = end($fileinfo);
    $allowtype = ['mp3'];

    if(!empty($_POST['title'])){
        $title = $_POST['title'];
    }
    else{
        $error = true;
        echo "Retype song name!";
    }
    if(!empty($_FILES['mp-3'])){
        if($fileError == 0)
        {
            if($filesize<8000000)
            {
                if(in_array($filetype,$allowtype))
                {
                    if( move_uploaded_file($_FILES['mp-3']['tmp_name'],'../tracks/'.$filename))
                    {
                        echo "success uploading";
                    }
                    else echo "failed";
                }
                else echo "file type is not allowed";
            }
        else echo "insufficient file size";    
        }
    }
    $song = $tracks->getSong($title);
    //print_r($song);
    $album = $_POST['album'];
    $type = $_POST['mtype'];
    
    

    
    if(!$error){
        if($song['total'] == 0) {
            $status = $tracks->addTracks($title,$fname,$album,$type);
            if($status){
            $message = 'success';
            header('location:tracks.php?status='.$message);
            }  
        }      
    }
}

?>

<div class="row">
    <form action="" enctype="multipart/form-data" method="post">
    <div class="row"> 
        <div class="">
            <label for="" class="form-label">Song Title</label>
            <input type="text" class="form-control" name="title" require>
        </div>
        <div class="">
            <label for="" class="form-label">Mp-3 File</label>
            <input type="file" class="form-control" name="mp-3" require>
        </div>
        <div>
            <label for="" class="form-label">Choose Album </label>
            <select name="album" id="" class="form-select">
                <?php 
                    foreach($album_lists as $album){
                        echo "<option value='{$album['album_id']}'>{$album['album_name']}</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label for="" class="form-label">Select Music Type</label>
            <select name="mtype" id="" class="form-select">
                <?php 
                    foreach($type_lists as $mtype){
                        echo "<option value='{$mtype['type_id']}'>{$mtype['type_name']}</option>";
                    }
                ?>
            </select>
        </div>
        <div class="">
            <button class="btn btn-success mt-4" name="add">Add</button>
        </div>
    </div>
    </form>
</div>

<?php 
include_once '../layout/footer.php';
?>
