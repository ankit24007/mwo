<?php
session_start();
require 'header.php';
function loginchecker(){
    if(empty($_SESSION['usname'])){
        header('Location: login.php');
    }
}
loginchecker();
require 'navbar.php';

include 'database.php';
?>
<body>
    <div class="container-fluid">
        <div class="row">
            
        
        <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="list-group">
                    <a href="adcat.php" class="list-group-item">Add Category</a>
                    <a href="adpro.php" class="list-group-item">Add Movies</a>
                    <a href="category.php" class="list-group-item">Show Categories</a>
                    <a href="products.php" class="list-group-item">Show Movies</a>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-8 col-md-9">
    <?php 
       
    if(isset($_POST["adpro"])) {
        $cid = mysql_real_escape_string(filter_input(INPUT_POST, 'cid'));
        $pname = mysql_real_escape_string(filter_input(INPUT_POST, 'pname'));
        $genre = mysql_real_escape_string(filter_input(INPUT_POST, 'genre'));
        $director = mysql_real_escape_string(filter_input(INPUT_POST, 'director'));
        $actor = mysql_real_escape_string(filter_input(INPUT_POST, 'actor'));
       
        $cdes = mysql_real_escape_string(filter_input(INPUT_POST, 'cdes'));
                date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s'); 
    
        $target_dir = "../mfiles/";
        $target_file_banner = $target_dir . basename($_FILES["banner"]["name"]);
        $target_file_image = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileTypeBanner = pathinfo($target_file_banner,PATHINFO_EXTENSION);
        $imageFileTypeImage = pathinfo($target_file_image,PATHINFO_EXTENSION);

        $bannerfilepath = "mfiles/". basename($_FILES["banner"]["name"]);
        $imagefilepath = "mfiles/". basename($_FILES["image"]["name"]);

        $checkImage = false;
        $checkBanner = false;
        
        // Check if image file is a actual image or fake image
        if(empty($_FILES["banner"]["tmp_name"]) && empty($_FILES["image"]["tmp_name"])){
          ?>
                <div class="alert alert-danger" role="alert">
                    <div class='alert-icon'>
                                <i class='material-icons'>error_outline</i>
                            </div>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                            </button>
                    <span class="sr-only">Error:</span>
                    Error! Banner od Image is not selected.
                </div>
          <?php
        
        }else {
          $checkBanner = getimagesize($_FILES["banner"]["tmp_name"]);
          $checkImage = getimagesize($_FILES["image"]["tmp_name"]);

        if($checkBanner == false && $checkImage == false) {
        ?>
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                        <i class='material-icons'>error_outline</i>
                </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                </button>
                <span class="sr-only">Error:</span>
                Error! File is not an image.
            </div>
              <?php
             
              $uploadOk = 0;

              }else if(file_exists($target_file_banner)){ 
              // Check if banner file already exists
                ?>
                  <div class="alert alert-danger" role="alert">
                        <div class='alert-icon'>
                                    <i class='material-icons'>error_outline</i>
                                </div>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                                </button>
                        <span class="sr-only">Error:</span>
                        Error! This banner file is already exists for another movie.
                    </div>
                <?php

            $uploadOk = 0;

          }else if(file_exists($target_file_image)){ 
          // Check if image file already exists
            ?>
              <div class="alert alert-danger" role="alert">
                    <div class='alert-icon'>
                                <i class='material-icons'>error_outline</i>
                            </div>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                            </button>
                    <span class="sr-only">Error:</span>
                    Error! This Image file is already exists for another movie.
                </div>
            <?php
        
        $uploadOk = 0;

      }else if($_FILES["banner"]["size"] > 5000000){ 
      // Check file size
        ?>
        <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Banner file is too large.
            </div>

          <?php
     
        $uploadOk = 0;

    } else if($_FILES["image"]["size"] > 5000000){
?>
  <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Image file is too large.
            </div>
          <?php

      
        $uploadOk = 0;
    
      } else if($imageFileTypeBanner != "jpg" && $imageFileTypeBanner != "png" && $imageFileTypeBanner != "jpeg" && $imageFileTypeBanner != "gif"){
        // Allow certain file formats
?>
        
          <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error!  Only JPG, JPEG, PNG & GIF files are allowed.
            </div>
          <?php

       
        $uploadOk = 0;
    } else if($imageFileTypeImage != "jpg" && $imageFileTypeImage != "png" && $imageFileTypeImage != "jpeg" && $imageFileTypeImage != "gif"){


    }else if($uploadOk == 0){
        // Check if $uploadOk is set to 0 by an error
      ?>
      <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error!  File uploading error.
            </div>
          <?php
        

      } else{
        $sql = "INSERT INTO collection(title, genre, director, actor, banner, image, rating, description, created_at) VALUES ('$pname','$genre','$director','$actor','$bannerfilepath','$imagefilepath','','$cdes','$timestamp')";

        if($conn->query($sql) === TRUE  && move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file_banner) && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_image)) {
                    ?>
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> New Movie Added successfully.
                    </div>
                    <?php
                                    
                
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                  } 
      }
    }
  }
?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" enctype="multipart/form-data">
           <div class="row">
                <div class="col-lg-offset-1 col-sm-5">
                   <h3>Add Movie</h3>
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
                        <input type="text" value="" class="form-control" name="pname" required />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" style="width:470px">
                            <option value="Action">None</option>
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
                        <input type="text" value="" class="form-control" name="director" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Actor</label>
                        <input type="text" value="" class="form-control" name="actor" />
                    </div>
                </div>
            </div>
        <br>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-2">
                   <label>Upload Banner</label>
                    <input type="file" name="banner" >
                </div>

                <div class="col-lg-offset-1 col-sm-2">
                    <label>Upload Image</label>
                    <input type="file" name="image" >
                </div>
            </div>
        <br>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-4 col-md-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" rows="3" name="cdes"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-sm-6">
                    <button type="submit" name="adpro" class="btn btn-raised btn-primary btn-wd">Submit</button>
                </div> 
            </div>  
        </form>
       </div>        
    </div>
</div>
</body>

    <?php
        require 'footer.php';