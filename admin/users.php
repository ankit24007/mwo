<?php
session_start();

include 'database.php';
require 'header.php';
?>
<!doctype html>
<?php
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
    
    <div class="container">
        <div class="row">
            
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php
                if(isset($_POST['upcus'])){
                    
                    if (isset($_GET['cuid']) && is_numeric($_GET['cuid'])){
                    // get id value
                        $cuid = $_GET['cuid'];
                    }
                    
                    $name = filter_input(INPUT_POST, 'name');
                    $email = filter_input(INPUT_POST, 'email');
                    $password = filter_input(INPUT_POST, 'password');
                    $password = md5($password);
                    
                    $uname= $_SESSION['usname'];
                    date_default_timezone_set('Asia/Kolkata');
                    $timestamp = date('Y-m-d h:i:s');
                    if(empty($name)){
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
            // echo "<br />";     
           
            // exit();
            }else{
            $sql = "UPDATE users SET name='$name', email='$email', password='$password', created_at='$timestamp' WHERE id='$cuid'";
            
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
                    $sql = 'DELETE FROM users WHERE id='.$id;

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
                
                // ***********************  pagination ***************************                
                $page = 0;
                if (isset($_GET["page"])) { 
                    $page  = $_GET["page"];
                        if($page==0){
                            $page = 1;
                        }

                    } else { $page=1; }; 
    
                    $start_from = ($page-1) * 5;
                $sql = "SELECT * FROM users ORDER BY id desc LIMIT $start_from, 5";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                            
                           // count products for pagination    
                        $sqlb = "SELECT COUNT(id) FROM users"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 5);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                            ?>
                <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4>Users <span class="badge"><?php echo $total_records; ?></span></h4></div>
                    
  
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                
                                <th>Email</th>
                                
                               <th>Password</th>
                               <th>Edit</th>
                               <th>Delete</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                <?php    
                
                        $c = $start_from+1;
                            
                            // output data of each row
                    
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td class='text-center'>".$c."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['password']."</td><td><a href='upusers.php?cuid=" . $row['id'] . "'><i class='material-icons'>mode_edit</i></a></td><td>"?><form action="users.php?id=<?php echo $row['id'] ?>" method="POST" onsubmit="return confirm('Are you sure you want to Delete it?');"><button type="submit" class="btn btn-primary btn-raised btn-round btn-sm" data-toggle="tooltip" data-placement="top" title="Delete!"/><i class="material-icons">delete_forever</i></button>
                        </form>
                                    <?php   "</td></tr>";
                           $c++;
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
                                        echo "<li><a href='customer.php?page=$pagem'>Previous</a></li>";
                                    }
                                if($page >= $total_pages){
                                    echo "<li class='disabled'><a>Next</a></li>";
                                }else{
                                    echo "<li><a href='customer.php?page=$pagea'>Next</a></li>";
                                }
                                
                                        
                                ?>
                            </ul>
                        </nav>
                
            </div>
        </div>
    </div>

    <!-- Modal for customer bills details -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
          <div id="bdata">
          
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-info ">Save</button> -->
      </div>
    </div>
  </div>
</div>
        </body>
<script>
$(document).ready(function(){
  
    $('.badge').tooltip({title: "Total Users", placement: "right"}); 
});
</script>
    <?php
        require 'footer.php';
        