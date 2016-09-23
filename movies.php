<?php

    session_start();
    include 'database.php';
    include 'header.php';
    include 'nav.php';
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Latest Movies
                    <small>Book Now</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Latest Movies</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        <?php
            // ***********************  pagination ***************************                
                $page = 0;
                if (isset($_GET["page"])) { 
                    $page  = $_GET["page"];
                        if($page==0){
                            $page = 1;
                        }

                    } else { $page=1; }; 
    
                    $start_from = ($page-1) * 5; 
                
                $sql = "SELECT * FROM movie ORDER BY id desc LIMIT $start_from, 5";
                 $result = $conn->query($sql);
                        if ($result -> num_rows > 0) {
                            
                            
                            // count products for pagination    
                        $sqlb = "SELECT COUNT(id) FROM movie"; 
                        $resultb = $conn->query($sqlb);
                        $rowb = mysqli_fetch_row($resultb); 
                        $total_records = $rowb[0]; 
                        $total_pages = ceil($total_records / 5);  
                        $pagem = $page - 1;
                        $pagea = $page +1;
                        $count = 0;
                        while($row = $result->fetch_assoc()) {
                            
                            $id[] = $row["id"];
                            $banner[] = $row["banner"];
                            $image[] = $row["image"];
                            $title[] = $row["title"];
                            $genre[] = $row["genre"];
                            $description[] = $row["description"];


                            ?>
                            <!-- Project One -->
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="movie-details.php?mid=<?php echo $id[$count]; ?>">
                                        <img class="img-responsive img-hover" src=<?php echo $banner[$count]; ?> alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3><?php echo $title[$count]; ?></h3>
                                    <h4><?php echo $genre[$count]; ?></h4>
                                    <p><?php echo $description[$count]; ?></p>
                                    <a class="btn btn-danger" href="portfolio-item.html">Book Now</i></a>
                                </div>
                            </div>
                        <!-- /.row -->

                        <hr>


                            <?php
                            $count++;
                        
                        }
                           
                    }
        ?>
        

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>

                        <a href="movies.php?page=<?php echo $pagem; ?>">&laquo;</a>
                    </li>
                    <?php

                    for($i=1; $i<=$total_pages; $i++){
                        ?>
                            <li>
                                <a href="movies.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php
                    }
                    ?>
                    
                    <li>
                        <a href="movies.php?page=<?php echo $pagea; ?>">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

<?php

    include "footer.php";

?>