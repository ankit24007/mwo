<?php
	
	include 'database.php';
	include 'header.php';
	include 'nav.php';

	?>

	<div class='container'>
		<div class="row">
			<div class="col-sm-6">	
			<br>
				<h2 style="color:#ff4d4d;">A world of Entertainment Awaits.</h2>
				<br /><br />
				<p style=""><font face="verdana" size="2em">Welcome to the Entertainment zone <span style="color:#ff4d4d; font-size:18px;"><b>Movie World Online</b></span>.<br />Here you can Book your movie shows, watch trailers, download movie songs and lots of entertaining and cool things, which makes you stay away from the stress full world. So, Join us to begin the fun.</font></p>
			</div>	
			<div class="col-sm-6 pull-right">	
			<div class="jumbotron">
				<h3>Create new Account</h3>
				<form method="post" action="index.php">
					<div class="form-group">
						<div class="input-group margin-bottom-sm">
	  						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
	  						<input class="form-control" type="text" name="name" placeholder="User Name">
						</div>
					</div>
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
					
					<button type="submit" name="signup" class="btn btn-default">Submit</button>
				</form>
			</div>
			</div>
		</div>
	</div>

	<?php
	include 'footer.php';