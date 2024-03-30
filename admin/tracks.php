<?php 

include_once '../layout/sidebar.php';
include_once '../controller/tracksController.php';

$tracks = new TracksController();
$results = $tracks->getTracks();

?>

<div class="row my-3">
    <div class="col-md-3">
        <a href="add-song.php" class="btn btn-success">Add New Song</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Song Title</th>
                    <th>Mp-3 File</th>
                    <th>Album ID</th>
                    <th>Type ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($results as $track){
                    echo "<tr>";
                    echo "<td>{$track['track_id']}</td>";
                    echo "<td>{$track['track_title']}</td>";
                    echo "<td>{$track['url']}</td>";
                    echo "<td>{$track['album_id']}</td>";
                    echo "<td>{$track['track_id']}</td>";
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