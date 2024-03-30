<?php 
include_once '../layout/sidebar.php';
include_once '../controller/artistsController.php';

$artists = new artistController();
$results = $artists->getAtrtists();

?>

<div class="row my-3">
    <div class="col-md-3">
        <a href="add-artist.php" class="btn btn-success">Add New Artist</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>   
            </thead>
            <tbody>
                    <?php 
                        foreach($results as $data){
                            echo "<tr>";
                            echo "<td>{$data['artist_id']}</td>";
                            echo "<td>{$data['artist_name']}</td>";
                            echo "<td>{$data['artist_country']}</td>";
                            echo "<td>{$data['artist_photo']}</td>";
                            echo "<td><a href='' class='btn btn-primary m-1'>View</a><a href='' class='btn btn-primary m-1'>Edit</a><a href='' class='btn btn-danger m-1'>Delete</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
</div>


<?php include_once '../layout/footer.php';?>