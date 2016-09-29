<?php 
require 'header.php';
require 'fun.php';
if(!empty($_SESSION['usname'])){
        header('Location: index.php');
    }
?>

<body class="signup-page">
    <div class="wrapper">
	<div class="header header-filter" style="background-image: url('bootmdl/assets/img/bg.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
              <?php  signup();  ?>
		<div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="card card-signup">
                            <form class="form" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
				<div class="header header-primary text-center">
                    <h4>Sign Up</h4>
                </div>
                                
			<!--	<p class="text-divider">Or Be Classical</p> -->
				<div class="content">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="material-icons">face</i></span>
					<input type="text" class="form-control" placeholder="Name..." name="rname">
                </div>
                <div class="input-group">
					<span class="input-group-addon"><i class="material-icons">email</i></span>
					<input type="email" class="form-control" placeholder="Email..." name="remail">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                    </span>
					<input type="password" placeholder="Password..." class="form-control" name="rpass"/>
                </div>
			</div>
            <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-wd btn-lg" name="signup">Get Started</button>
                    <hr />
               
                <h4>Already have an account?</h4>
                <p><a href="login.php" class="btn btn-primary btn-raised btn-wd">Log in</a></p>
            </div>
        </form>
	</div>
</div>
</div>
 </div>
               
<?php
    require 'footer.php';