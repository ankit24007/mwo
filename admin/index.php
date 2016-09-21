<?php
	session_start();
	

function loginchecker(){
    if(empty($_SESSION['mwo_admin_user_name'])){
        header('Location: login.php');
    }
}

	loginchecker();

	$user = $_SESSION['mwo_admin_user_name'];
	require 'header.php';
?>

	 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
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

<?php

	require 'footer.php';
?>
