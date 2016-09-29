<?php
   

    session_start();
    include 'database.php';
    include 'header.php';
    include 'nav.php';

?>

    <!-- Page Content -->
    <div class="container">

    <?php 
        if (isset($_GET["mid"])) {
                $mid  = $_GET["mid"];
            }
            $sql = "SELECT * FROM collection where id='$mid'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["genre"]. "<br>";
                    $banner = $row["banner"];
                    $image = $row["image"];
                    $title = $row["title"];
                    $genre = $row["genre"];
                    $director = $row["director"];
                    $actor = $row["actor"];
                    $description = $row["description"];

                    
                }
            }

        ?>

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?>
                   
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Movie Details</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive" src=<?php echo $banner; ?> alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src=<?php echo $image; ?> alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src=<?php echo $banner; ?> alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $description; ?></p>
                <h3>Movie Details</h3>
                
                    
                    <p>Director: <?php echo $director; ?></p>
                   <p>Actor: <?php echo $actor; ?></p>
                    
                    <a class="btn btn-danger" href="portfolio-item.html">Book Now</i></a>
               
            </div>

        </div>
        <!-- /.row -->

<?php
$sqlb = "SELECT * FROM collection";
            $resultb = $conn->query($sqlb);

            if($resultb->num_rows > 0) {
                // output data of each row
                while($rowb = $resultb->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["genre"]. "<br>";
                    $bannerb[] = $rowb["banner"];
                    

                    
                }
            }

            ?>
        <!-- Related Movies Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Movies</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="<?php echo $bannerb[5]; ?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="<?php echo $bannerb[3]; ?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="<?php echo $bannerb[8]; ?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive img-hover img-related" src="<?php echo $bannerb[7]; ?>" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center">Copyright 2016 &copy; Movie World Online. All Rights Reserved.</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>