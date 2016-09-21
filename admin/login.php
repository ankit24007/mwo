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
            <div class="form">
                
                
                
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

