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
?>


<?php
    require 'navbar.php';
?>
<body>
    <div class="container"> 
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        
                        <?php
                        $sql = "SELECT id FROM users";
                        $result = $conn->query($sql);
                        $tamt =0;
                        if ($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $bamt = $row['id'];
                                $tamt++;
                            }
                        }
                        echo "<p style='color: skyblue; font-size: 20px'>Total Users: <a href='users.php' style='font-size: 20px; color: black'>".$tamt."</p></a>";
                        ?>
                        
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                         
                        <?php
                        $sql = "SELECT id FROM collection";
                        $result = $conn->query($sql);
                        $tdamt =0;
                        if ($result -> num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $damt = $row['id'];
                                $tdamt++;
                            }
                        }
                        echo "<p style='color: orange; font-size: 20px'>Total Movies Collection: <a href='movies.php' style='font-size: 20px; color: black'>".$tdamt."</p></a>";
                        ?>
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        
                        <?php 
                            $treceipt = 48;
                            echo "<p style='color: yellowgreen; font-size: 20px'>Total Bookings: <span style='font-size: 20px; color: black'>".$treceipt."</span></p>";
                        ?>
                        <br>
                    </div>
                </div>    
            </div>
        </div>
    </div> 
<?php
require 'footer.php';
