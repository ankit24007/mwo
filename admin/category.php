<?php
session_start();

include 'database.php';
require 'header.php';
function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
require 'navbar.php';
// require 'stockfun.php';
?>
<body>
    <div class="container-fluid">
       <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="list-group">
                    <a href="adcat.php" class="list-group-item">Add Category</a>
                    <a href="adpro.php" class="list-group-item">Add Movies</a>
                    <a href="category.php" class="list-group-item">Show Categories</a>
                    <a href="movies.php" class="list-group-item">Show Movies</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-9">
                <?php
                if(isset($_POST['upcat'])){
                    
                    if (isset($_GET['eid']) && is_numeric($_GET['eid'])){
                    // get id value
                        $eid = $_GET['eid'];
                    }
                    $upcat = filter_input(INPUT_POST, 'upncat');
                    $updes = filter_input(INPUT_POST, 'updes');
                    $uname= $_SESSION['usname'];
                    date_default_timezone_set('Asia/Kolkata');
                    $timestamp = date('Y-m-d h:i:s');
                    if(empty($upcat) || empty($updes)){
            ?>
            
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Category field are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            
            }else{
            $sql = "UPDATE category SET name='$upcat', description='$updes', created_at='$timestamp' WHERE id='$eid'";
            
            if ($conn->query($sql) === TRUE) {
        ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <p><strong>Success!</strong> Record Updated successfully.</p> 
                </div>
                <?php
                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
                }
        if (isset($_GET['id']) && is_numeric($_GET['id'])){
    // get id value
    $id = $_GET['id'];
 
    // delete the entry
    $sql = 'DELETE FROM category WHERE id='.$id;

    if ($conn->query($sql) === TRUE) { 
        ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> Record Deleted successfully.
                    </div>
        <?php
           
        }   
        else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
                    <div class="panel-heading"><h4>Categories</h4></div>
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                <?php    
                $sql = "SELECT id, name, description FROM category";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                        // output data of each row
                    
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>"
                                    . "<td class='text-center'>".$row['id']. "</td><td> " 
                                    . $row['name']. "</td><td>" . $row['description']."</td>".
                                    "<td><a href='upcat.php?eid=" . $row['id'] . "'><i class='material-icons'>mode_edit</i></a></td>".
                                    "<td><a href='category.php?id=" . $row['id'] . "'><i class='material-icons'>clear</i></a></td></tr>";
                        }
                    }else {
                        echo "0 results";
                    }
                    ?>
                
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
    require 'footer.php';
        