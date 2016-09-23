<?php
	session_start();
	

function loginchecker(){
    if(empty($_SESSION['mwo_admin_user_name'])){
        header('Location: login.php');
    }
}

	loginchecker();

	$user = $_SESSION['mwo_admin_user_name'];
	include 'header.php';
?>

	<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">MWO</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>
            
          </ul>
        </li>
      
    </ul>
  </div>
</nav>




<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3">
      <ul class="nav nav-pills nav-stacked">
        <li class="active" id="wel"><a href="#" onclick="welcome()">DashBoard</a></li>
        <li id="mF"><a href="#" onclick="movieForm()">Add Movie</a></li>
        
      </ul> 
    </div>
    
    <div class="col-sm-9">
      <?php
  include '../database.php';

  if(isset($_POST["submit"])) {
    $title = filter_input(INPUT_POST, 'title');
    $genre = filter_input(INPUT_POST, 'genre');
    $actor = filter_input(INPUT_POST, 'actor');
    $description = filter_input(INPUT_POST, 'description');
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
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              Banner or Image is not selected.
          </div>
      <?php
        
    }else {
      $checkBanner = getimagesize($_FILES["banner"]["tmp_name"]);
      $checkImage = getimagesize($_FILES["image"]["tmp_name"]);

      if($checkBanner == false && $checkImage == false) {
          ?>
          <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              File is not an image.
          </div>
          <?php
         
          $uploadOk = 0;

      }else if(file_exists($target_file_banner)){ 
      // Check if banner file already exists
        ?>
          <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              Sorry, This Banner file already exists for another movie.
          </div>
        <?php

        $uploadOk = 0;

      }else if(file_exists($target_file_image)){ 
      // Check if image file already exists
        ?>
          <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              Sorry, This Image file already exists for another movie.
          </div>
        <?php
        
        $uploadOk = 0;

      }else if($_FILES["banner"]["size"] > 5000000){ 
      // Check file size
        ?>
        <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              Sorry, Banner file is too large.
          </div>

          <?php
     
        $uploadOk = 0;

    } else if($_FILES["image"]["size"] > 5000000){
?>
  <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              Sorry, Image file is too large.
          </div>
          <?php

      
        $uploadOk = 0;
    
      } else if($imageFileTypeBanner != "jpg" && $imageFileTypeBanner != "png" && $imageFileTypeBanner != "jpeg" && $imageFileTypeBanner != "gif"){
        // Allow certain file formats
?>
        <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              Only JPG, JPEG, PNG & GIF files are allowed.
          </div>
          <?php

       
        $uploadOk = 0;
    } else if($imageFileTypeImage != "jpg" && $imageFileTypeImage != "png" && $imageFileTypeImage != "jpeg" && $imageFileTypeImage != "gif"){


    }else if($uploadOk == 0){
        // Check if $uploadOk is set to 0 by an error
      ?>
      <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              file uploading error.
          </div>
          <?php
        

      } else{
        $sql = "INSERT INTO movie(title, genre, actor, banner, image, rating, description, created_at) VALUES ('$title','$genre','$actor','$bannerfilepath','$imagefilepath','','$description','$timestamp')";

        if($conn->query($sql) === TRUE  && move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file_banner) && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_image)) {
                    ?>
                      <div class="alert alert-success" role="alert">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        &nbsp; file uploaded successfully.
                      </div>
                    <?php
                                    
                
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                  }
       

          
          
          
          
      }
    }
  }
  

      
  

?>
        <div class="content"></div>
        
    </div>
      
  </div>
</div>

<?php

	include 'footer.php';
?>
