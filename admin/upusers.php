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
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adcus.php" class="list-group-item">Add Users</a>
                    <a href="users.php" class="list-group-item">Show Users</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                
            
        <?php
      if (isset($_GET['cuid']) && is_numeric($_GET['cuid'])){
                    // get id value
                        $cuid = $_GET['cuid'];
                        $sql = 'SELECT * FROM users WHERE id='.$cuid;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $cuname = $row['name'];
                                $cutin = $row['email'];
                                $cucontact = $row['password'];
                                
                            } 
                        }
                    }  
    ?>
                <form action="users.php?cuid=<?php echo $cuid; ?>" method="post">
           
            <div class="row">
                <div class="col-lg-offset-1 col-sm-10">
                    <h3>Update Users</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">User Name</label>
                        <input type="text" value="<?php echo $cuname; ?>" class="form-control" name="name" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Email</label>
                        <input type="email" value="<?php echo $cutin; ?>" class="form-control" name="email" />
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Password</label>
                        <input type="text" value="<?php echo $cucontact; ?>" class="form-control" name="password" />
                    </div>
                </div>
            </div>
            
                    
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="input-group">
                        <button type="submit" name="upcus" class="btn btn-raised btn-primary btn-wd">Update</button>
                    </div>
                </div>
            </div>
        </form>
                </div>
    </div>
</div>
</body>
<?php
    require 'footer.php';
        
        
        