<?php 

include_once '../layout/sidebar.php';
include_once '../controller/typesController.php';

$types = new TypesController();
$results = $types->getTypes();
?>

<div class="row my-3">
    <div class="col-md-3">
        <a href="add-type.php" class="btn btn-success">Add New Type</a>
    </div>
</div>

<div class="row">
    <div class="col-md-row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Music Types</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                foreach($results as $type){
                    echo "<tr>";
                    echo "<td>{$type['type_id']}</td>";
                    echo "<td>{$type['type_name']}</td>";
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