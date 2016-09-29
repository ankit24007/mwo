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

?>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="list-group">
                    <a href="adcat.php" class="list-group-item">Add Category</a>
                    <a href="adpro.php" class="list-group-item">Add Movie</a>
                    <a href="category.php" class="list-group-item">Manage Categories</a>
                    <a href="products.php" class="list-group-item">Manage Movies</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-4 col-md-9">
                <?php

                // get id for update movie details
                if(isset($_POST['uppro'])){
                    
                    if (isset($_GET['prid']) && is_numeric($_GET['prid'])){
                    // get id value
                        $prid = $_GET['prid'];
                    }
                    $cid = filter_input(INPUT_POST, 'cid');
                    $pname = filter_input(INPUT_POST, 'pname');
                    $genre = filter_input(INPUT_POST, 'genre');
                    $director = filter_input(INPUT_POST, 'director');
                    $actor = filter_input(INPUT_POST, 'actor');
                    $cdes = filter_input(INPUT_POST, 'cdes');
                    $banner = filter_input(INPUT_POST, 'banner');
                    $image = filter_input(INPUT_POST, 'image');
                    $uname= $_SESSION['usname'];
                    date_default_timezone_set('Asia/Kolkata');
                    $timestamp = date('Y-m-d h:i:s');
                    if(empty($pname) || empty($genre) || empty($director)){
            ?>
            
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Some fields are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            
            }else{
            $sql = "UPDATE collection SET title='$pname', genre='$genre', "
                    . "director='$director', actor='$actor', banner='$banner', image='$image', description='$cdes', "
                    . "created_at='$timestamp' WHERE id='$prid'";
            
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
                // Delete movie details
                if (isset($_GET['id']) && is_numeric($_GET['id'])){
                    // get id value
                    $id = $_GET['id'];

                    // delete the entry
                    $sql = 'DELETE FROM product WHERE id='.$id;

                    if ($conn->query($sql) === TRUE) { 
                        ?>
                <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Success!</strong> Record Deleted successfully.
                                    </div>
                 <?php
                }else {
                    echo "Error deleting record: " . $conn->error;
                    }
                }
             
// ***********************  pagination ***************************                
                $page = 0;
                if (isset($_GET["page"])) { 
                    $page  = $_GET["page"];
                        if($page==0){
                            $page = 1;
                        }

                    } else { $page=1; }; 
    
                    $start_from = ($page-1) * 5; 
                
                $sql = "SELECT * FROM collection ORDER BY id desc LIMIT $start_from, 5";
                 $result = $conn->query($sql);

                if ($result -> num_rows > 0) {
                     // count products for pagination    
                        $sqlb = "SELECT COUNT(id) FROM collection"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 5);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4>Movies <span class="badge"><?php echo $total_records; ?></span></h4></div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Genre</th>
                            <th>Director</th>
                            <th>actor</th>
                            <th>rating</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                <tbody>
                <?php    
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                          // get name of category name by category ID
                            $sqlcat = "SELECT name, description FROM category WHERE id=1";
                            $resultcat = $conn->query($sqlcat);
                            if($resultcat -> num_rows > 0){
                                while($rowcat = $resultcat -> fetch_assoc()){
                                    $catn = $rowcat['name']; 
                                }
                            }
                            echo "<tr>"
                                    . "<td class='text-center'>".$row['id']. "</td><td>".$row['title']. "</td><td> " 
                                    . $catn. "</td><td>" . $row['genre']."</td><td>".
                                     $row['director']. "</td><td>" . $row['actor']."</td><td>" . $row['rating']."</td>".
                                    "<td><a href='uppro.php?prid=" . $row['id'] . "'><i class='material-icons'>mode_edit</i></a></td>".
                                    "<td>"?>
                        <form action="products.php?id=<?php echo $row['id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to Delete it?');">
                            <button type="submit" class="btn btn-primary btn-raised btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Delete!"/><i class="material-icons">delete_forever</i></button>
                        </form>
                                    <?php   "</td></tr>";

                        }
                    }else {
                        echo "0 results";
                    }
                    ?>
              </table>
                   </div>
                <nav aria-label="...">
                            <ul class="pager">
                                <?php
                                
                                    if($page <= 1){
                                        echo "<li class='disabled'><a>Previous</a></li>";
                                    }else {
                                       
                                        echo "<li><a href='products.php?page=$pagem'>Previous</a></li>";
                                    }
                                if($page >= $total_pages){
                                    echo "<li class='disabled'><a>Next</a></li>";
                                }else{
                                   
                                    echo "<li><a href='products.php?page=$pagea'>Next</a></li>";
                                }
                               ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </body>
<script>
$(document).ready(function(){
  
    $('.badge').tooltip({title: "Total Movies", placement: "right"}); 
    $('.btn-tooltip').tooltip();
});
</script>
    <?php
        require 'footer.php';
        