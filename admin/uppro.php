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
            <div class="col-xs-12 col-sm-4 col-md-2">
                <div class="list-group">
                    
                    <a href="adpro.php" class="list-group-item">Add Movie</a>
                    <a href="products.php" class="list-group-item">Show Movies</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-10">
                
            
        <?php
      if (isset($_GET['prid']) && is_numeric($_GET['prid'])){
                    // get id value
                        $prid = $_GET['prid'];
                        $sql = 'SELECT * FROM collection WHERE id='.$prid;
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $pname = $row['title'];
                                $banner = $row['banner'];
                                $image = $row['image'];
                                $genre = $row['genre'];
                                $director = $row['director'];
                                $actor = $row['actor'];
                                $description = $row['description'];
                            } 
                        }
                    }  
    ?>
            <form action="movies.php?prid=<?php echo $prid; ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-offset-1 col-sm-10">
                        <h3>Update Movie</h3>
                    </div>
                </div>
            
            
                <div class="row">
                    <div class="col-lg-offset-1 col-sm-6">
                        <div class="form-group">
                        <label>Select Category: </label>    
                        <?php

                            $sql = "SELECT id, name FROM category order by id asc";
                            $result = $conn->query($sql);
                            if ($result -> num_rows > 0) {
                            // output data of each row
                        ?>
                        <select name="cid" style="width:470px">
                        <?php
                            while($row = $result->fetch_assoc()) {
                                if($row['id']==1){
                                    echo "<option value=".$row['id']." selected>".$row['name']."</option>";
                                } else {
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                                }
                            }
                        ?>
                    </select>
                        <?php     
                        }
                        ?>
                    </div>
                    </div> 
                </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Name/Title</label>
                        <input type="text" value="<?php echo $pname; ?>" class="form-control" name="pname" required />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" style="width:470px">
                            <option value="<?php echo $genre; ?>" selected><?php echo $genre; ?></option>
                            <option value="none">None</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Drama">Drama</option>
                            <option value="Romance">Romance</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Horror">Horror</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Science Fiction">Science Fiction</option>
                            <option value="Mystery/Crime">Mystery/Crime</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Director</label>
                        <input type="text" value="<?php echo $director; ?>" class="form-control" name="director" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Actor</label>
                        <input type="text" value="<?php echo $actor; ?>" class="form-control" name="actor" />
                    </div>
                </div>
            </div>


            <br>
            

            <div class="row">
                <div class="col-lg-offset-1 col-sm-2">
                   <img src="../<?php echo $banner; ?>">
                        <label>Upload Banner</label>
                        <input type="file" value="<?php echo $banner; ?>" name="banner" >
                 
                </div>

                <div class="col-lg-offset-1 col-sm-2">
                        <img src="../<?php echo $image; ?>">
                        <label>Upload Image</label>
                        <input type="file"  value="<?php echo $image; ?>" name="image" >
                </div>
            </div>
             <br>
            <div class="row">
                
            </div>


            <div class="row">
                <div class="col-lg-offset-1 col-sm-4 col-md-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" name="cdes"><?php echo $description; ?></textarea>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4">
                    <button type="submit" name="uppro" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>
        </form>
    </div>
    </div>
</div>
</body>

    <?php
        require 'footer.php';
        
        
        