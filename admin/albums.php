<?php 

include_once '../layout/sidebar.php';
include_once '../controller/albumsController.php';

$albums = new AlbumsController();
$resutls = $albums->getAlbums();

?>

<div class="row my-3">
    <div class="col-md-3">
        <a href="add-album.php" class="btn btn-success">Add New Album</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Album Title</th>
                    <th>Release Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($resutls as $album){
                    echo "<tr>";
                    echo "<td>{$album['album_id']}</td>";
                    echo "<td>{$album['album_name']}</td>";
                    echo "<td>{$album['release_date']}</td>";
                    echo "<td><a href='' class='btn btn-primary m-1'>View</a><a href='' class='btn btn-primary m-1'>Edit</a><a href='' class='btn btn-danger m-1'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php 

include_once '../layout/footer.php';

?>