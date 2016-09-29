<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    	<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Movie World Online</a>
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
		                <li><a href="movies.php">Movies</a></li>
                        <li><a href="songs.php">Songs</a></li>
                        <li><a href="users.php">users</a></li>
                    
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">account_circle</i><?php print_r($_SESSION['usname']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php" class="btn btn-danger btn-raised btn-wd">Log out</a></li>
                    </ul>
                </li>
            </ul>
    	</div>
    </div>
</nav>