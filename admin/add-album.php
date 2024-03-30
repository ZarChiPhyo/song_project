<?php 

include_once '../layout/sidebar.php';
include_once '../controller/albumsController.php';

$albums = new AlbumsController();
if(isset($_POST['add'])){
    $error = false;

    if(!empty($_POST['album'])){
        $album = $_POST['album'];
    }
    else{
        $error = true;
        echo "Type album name!";
    }
    if(!empty($_POST['date'])){
        $date = $_POST['date'];
    }
    else{
        $error = true;
        echo "Type release date";
    }

    if(!$error){
        $status = $albums->addAlbums($album,$date);
        if($status){
            $message = "success";
            header('location:albums.php?status='.$message);
        }
    }
    
}

?>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <div>
                <label for="" class="form-label">Album Name</label>
                <input type="text" class="form-control" name="album">
            </div>
            <div>
                <label for="" class="form-label">Release Date</label>
                <input type="date" class="form-control" name="date">
            </div>
            <div>
                <button class="btn btn-success mt-3" name="add">Add</button>
            </div>
        </form>
    </div>
</div>

<?php 
include_once '../layout/footer.php';
?>