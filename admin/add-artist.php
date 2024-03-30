<?php 

include_once '../layout/sidebar.php';
include_once '../controller/artistsController.php';
$artists = new artistController();
//$results = $artists->addArtists($aname,$acountry,$aphoto);

if(isset($_POST['add'])){
    $error = false;
    var_dump($_FILES['aphoto']);
    $filename = $_FILES['aphoto']['name'];
    $fileError = $_FILES['aphoto']['error'];
    $filesize = $_FILES['aphoto']['size'];
    $fileinfo = explode('.',$filename);
    $filetype = end($fileinfo);
    $allowtype = ['jpg','jpeg','png','webp','jiff'];

    if(!empty($_POST['aname'])){
        $name = $_POST['aname'];
    }
    else{
        $error = true;
        echo "Retype artist name!";
    }
    if(!empty($_POST['acountry'])){
        $country = $_POST['acountry'];
    }
    else{
        $error = true;
        echo "Retype country name!";
    }
    if(!empty($_FILES['aphoto'])){
        if($fileError == 0)
        {
            if($filesize<2000000)
            {
                if(in_array($filetype,$allowtype))
                {
                        $photo = move_uploaded_file($_FILES['aphoto']['tmp_name'],'../artist_photo/'.$filename);
                        if($photo)
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
    

    $aname = $artists->getName($name);
    if(!$error){
        if($aname['total']== 0){
            $status = $artists->addArtists($name,$country,$filename);
            if($status){
                $message = 'success';
                header('location:artists.php?status='.$message);
            }
        }
    }

}

?>

<div class="row">
    <form action="" enctype="multipart/form-data" method="post">
    <div class="row"> 
        <div class="">
            <label for="" class="form-label">Artist Name</label>
            <input type="text" class="form-control" name="aname">
        </div>
        <div class="">
            <label for="" class="form-label">Artist Country</label>
            <input type="text" class="form-control" name="acountry">
        </div>
        <div class="">
            <label for="file" class="form-label">Artist Photo</label>
            <input type="file" class="form-control" name="aphoto">
        </div>
        <div class="">
            <button class="btn btn-success mt-4" name="add">Add Artist</button>
        </div>
    </div>
    </form>
</div>

<?php 
include_once '../layout/footer.php';
?>