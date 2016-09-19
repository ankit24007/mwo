<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:#ff4d4d;">Movie World Online</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
               
                    <li>
                        <a href="#">Movies</a>
                    </li>
                    <li>
                        <a href="#">Songs</a>
                    </li>
<?php
        if( empty($_SESSION['usname'])){
            ?>
             
                        <!-- Trigger the modal with a button -->
                        <li><a href="#" type="button" class="btn-default" data-toggle="modal" data-target="#myModal">Sign In</a>
                    </li>
                    <?php


        }else{

            $name= $_SESSION['usname'];
            ?>
            <li class="dropdown">
  <a class="btn-default dropdown-toggle" href="#" type="button" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true">&nbsp; <?php echo $name;  ?></i>

  <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="logout.php">Log Out</a></li>
   
  </ul>
</div>
            </li>
            <?php
            
        }                        
?>

                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In</h4>
        
      </div>
      <div class="modal-body">
        <form method="post" action="index.php">
					
					<div class="form-group">
						<div class="input-group margin-bottom-sm">
	  						<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
	  						<input class="form-control" type="text" name="email" placeholder="Email address">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
							<input class="form-control" type="password" name="password" placeholder="Password">
						</div>
					</div>
                    
                    <div class="checkbox">
    					<label><input type="checkbox"> Remember me</label>
  					</div>
					
					<button type="submit" name="login" class="btn btn-default">Log In</button>
                    <a href="signup.php" class="btn btn-danger">Create Account</a>
                    
				</form>
                
                
      </div>
    </div>

  </div>
</div>