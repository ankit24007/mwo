<?php

session_start();
include 'database.php';



function signup(){
    include 'database.php';
    if(isset($_POST['signup'])){
        $reg_name = filter_input(INPUT_POST, 'name');
        $reg_email = filter_input(INPUT_POST, 'email');
        $reg_password = filter_input(INPUT_POST, 'password');
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s'); 
    
        if(empty($reg_name) || empty($reg_email) || empty($reg_password)){
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
            $sql = "INSERT INTO users (name, email, password, created_at, updated_at)
            VALUES ('$reg_name', '$reg_email', '$reg_password', '$timestamp','$timestamp')";

                if($conn->query($sql) === TRUE) {
                    
                    $_SESSION['usname'] = $reg_name;
                    
            
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
}
// sign up function ends here *******************************************************
// login checker function ends here *******************************************************

function loginhandler(){
    include 'database.php';
    if(isset($_POST['login'])){
        
        $email = mysql_real_escape_string(filter_input(INPUT_POST, 'email'));
        $password = mysql_real_escape_string(filter_input(INPUT_POST, 'password'));
       
        if(empty($email) || empty($password)){
                ?>
           
        <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Error! Some fields are empty or wrong value. Please fill correct values.
</div>
            
                  
       <?php
            
           
            }else{
            $sql = "SELECT name, email FROM users WHERE (email= '$email') AND password = '$password'";
            
    
            $result = $conn->query($sql);

            if ($result -> num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $_SESSION['usname'] = $row['name'];
                    // $_SESSION['ustatus'] = $row['ustatus'];
                    header('Location: index.php');
                }
            }else{
                 
                echo "<div class='alert alert-danger'>
                    
                        <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                        <b>Error Alert:</b> The username and password you entered did not match our records. Please try again.
                    
                </div>";
                
            } 
        }
    }
}

signup();
loginhandler();


include 'header.php';

include 'nav.php';
?>
<!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <?php 

            $sql = "SELECT * FROM movie order by id desc limit 10";
            $result = $conn->query($sql);

if($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id[] = $row["id"];
        $banner[] = $row["banner"];
        $image[] = $row["image"];
        $title[] = $row["title"];
        $genre[] = $row["genre"];
        $description[] = $row["description"];

        
    }
}

        ?>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url(<?php echo $banner[0]; ?>);"></div>
                <div class="carousel-caption">
                    <h2><?php echo $title[0]; ?></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(<?php echo $banner[1]; ?>);"></div>
                <div class="carousel-caption">
                    <h2><?php echo $title[1]; ?></h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(<?php echo $banner[2]; ?>);"></div>
                <div class="carousel-caption">
                    <h2><?php echo $title[2]; ?></h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-sm-3">
                <ul class="list-group" style="padding-top:45px;">
                    <li class="list-group-item list-group active"><b>Top Movies</b></li>
                    <?php
                        for($i=0; $i<10; $i++){
                           
                            echo "<li class='list-group-item list-group'><a href='movie-details.php?mid=".$id[$i]."' class='btn-block'>". $title[$i]."</a></li>";
                        
                        }
                    ?>

                    
                </ul>
            </div>
            
        
        <!-- Portfolio Section -->
        
            <div class="col-sm-9">
                <h2 class="page-header">Now Showing</h2>
            </div>
            
            
            <div class="col-md-3 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src=<?php echo $image[0]; ?> alt="">
                    <div class="caption">
                        <h3><?php echo $title[0]; ?><br>
                            <small><?php echo $genre[0]; ?></small>
                        </h3>
                        <p><?php echo $description[0]; ?></p>
                        
                        <button type="button" class="btn btn-danger">Book Now</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src=<?php echo $image[1]; ?> alt="">
                    <div class="caption">
                        <h3><?php echo $title[1]; ?><br>
                            <small><?php echo $genre[1]; ?></small>
                        </h3>
                        <p><?php echo $description[1]; ?></p>
                       
                        <button type="submit" class="btn btn-danger">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="thumbnail">
                    <img class="img-responsive" src=<?php echo $image[2]; ?>  alt="">
                    <div class="caption">
                        <h3><?php echo $title[2]; ?><br>
                            <small><?php echo $genre[2]; ?></small>
                        </h3>
                        <p><?php echo $description[2]; ?></p>
                       

                        <button type="button" class="btn btn-danger">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    <hr>

         <div class="row">
            <div class="col-sm-4 text-center">
              <h3 style="padding-top:10px;">Gifts</h3>
                 <img src="img/gift.jpg" alt="Gifts" width="120" height="120" />
                <p style="padding-top:5px; padding-bottom:10px">With GiftMyShow cards, you can gift your friends & family movie & play tickets, concert passes, whatever it is they love for their birthdays, anniversaries or simply for no reason other than how you feel about them. Pretty sweet, aint it? </p>
                <button type="button" class="btn btn-default">Buy A Gift Card</button>
            </div>
            <div class="col-sm-4 text-center">
                <h3 style="padding-top:10px; padding-bottom:10px">Offers</h3>
                <svg width="100" height="100" id="icon-offer" viewBox="0 0 100 100"><path d="M50 95c-.5 0-1-.1-1.5-.4l-36.4-21c-.9-.5-1.5-1.5-1.5-2.6V29c0-1.1.6-2.1 1.5-2.6l36.4-21c.9-.5 2.1-.5 3 0l36.4 21c.9.5 1.5 1.5 1.5 2.6v42c0 1.1-.6 2.1-1.5 2.6l-36.4 21c-.5.3-1 .4-1.5.4zm0-88.6c-.3 0-.6.1-.8.2l-36.4 21c-.5.3-.8.8-.8 1.4v42c0 .6.3 1.1.8 1.4l36.4 21c.5.3 1.2.3 1.7 0l36.4-21c.5-.3.8-.9.8-1.4V29c0-.6-.3-1.1-.8-1.4l-36.4-21c-.3-.2-.6-.2-.9-.2z"></path><path d="M31.7 69.9c-.2 0-.3-.1-.5-.2-.3-.3-.3-.7 0-1l37.3-37.3c.3-.3.7-.3 1 0s.3.7 0 1L32.2 69.7c-.2.1-.3.2-.5.2zM35.6 41.6c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6zm0-10.6c-2.5 0-4.6 2.1-4.6 4.6s2.1 4.6 4.6 4.6 4.6-2.1 4.6-4.6c.1-2.5-2-4.6-4.6-4.6zM65 71c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6zm0-10.6c-2.5 0-4.6 2.1-4.6 4.6s2.1 4.6 4.6 4.6 4.6-2.1 4.6-4.6-2-4.6-4.6-4.6z"></path></svg>
                <p style="padding-top:10px; padding-bottom:10px">Delight yourself with crazy offers while you book your tickets. Whether its cashback, freebies or discounts you're after, there's a can't-miss bargain for every single one of you. </p>
                <button type="button" class="btn btn-default">View Offers</button>
            </div>
            <div class="col-sm-4 text-center">
                <h3 style="padding-top:10px; padding-bottom:10px">Mobile App</h3>
                    <svg width="100" height="100" id="icon-mobile" viewBox="0 0 100 100"><path d="M73.5 95.2H26.8c-1.3 0-2.3-1-2.3-2.3V7.6c0-1.3 1-2.3 2.3-2.3h46.7c1.3 0 2.3 1 2.3 2.3V93c0 1.2-1.1 2.2-2.3 2.2zM26.8 6.4c-.6 0-1.1.5-1.1 1.1v85.4c0 .6.5 1.1 1.1 1.1h46.7c.6 0 1.1-.5 1.1-1.1V7.6c0-.6-.5-1.1-1.1-1.1l-46.7-.1z"></path><path d="M68.8 78.9H31.3c-.6 0-1.2-.5-1.2-1.2V16c0-.6.5-1.2 1.2-1.2h37.5c.6 0 1.2.5 1.2 1.2v61.7c0 .6-.5 1.2-1.2 1.2zm0-62.9H31.3v61.6h37.4l.1-61.6zM49.8 90.4c-2.3 0-4.1-1.9-4.1-4.1 0-2.3 1.9-4.1 4.1-4.1 2.3 0 4.1 1.9 4.1 4.1.1 2.3-1.8 4.1-4.1 4.1zm0-7.1c-1.6 0-2.9 1.3-2.9 2.9s1.3 2.9 2.9 2.9 2.9-1.3 2.9-2.9c.1-1.5-1.2-2.9-2.9-2.9zM44.3 11.2h-1.6c-.3 0-.6-.3-.6-.6s.3-.6.6-.6h1.6c.3 0 .6.3.6.6s-.3.6-.6.6zM55.3 11.2h-6.5c-.3 0-.6-.3-.6-.6s.3-.6.6-.6h6.5c.3 0 .6.3.6.6s-.2.6-.6.6z"></path></svg>
                <p style="padding-top:10px; padding-bottom:10px">Book your tickets on the go, only with a couple of clicks. Choose from a whopping 3,000+ cinema screens across India and book as late as 20 minutes before showtime for those spur-of-the-moment plans. </p>
                <button type="button" class="btn btn-default">Download Now</button>

            </div>
        </div>
    </div>
    <br>
    <br>

</body>


<?php

include 'footer.php';
?>
