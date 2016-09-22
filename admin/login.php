<?php
session_start();
    require 'header.php';
    include 'fun.php';
    loginhandler();
    if(!empty($_SESSION['mwo_admin_user_name'])){
        header('Location: index.php');
    }
?>

<link href="css/style.css" rel="stylesheet">
<body>
		<div class="login-page">
         <h3 class="text-center">Movie World Online</h3>
            <div class="form">
               
                <h4>Admin Panel</h4>
                <br>
                
                
                <form class="login-form" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                <input type="text" placeholder="Email Address" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <button type="submit" name="admin_login">login</button>
                <br><br>
                <p>Not registered? <a href="registration.php">Create an account</a></p>
                
                </form>
            </div>
        </div>

<?php
    require 'footer.php';

