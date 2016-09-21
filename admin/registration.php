<?php
session_start();
    require 'header.php';
    
    include 'fun.php';
    signup();
    if(!empty($_SESSION['mwo_admin_user_name'])){
        header('Location: index.php');
    }
?>

<link href="css/style.css" rel="stylesheet">
<body>
		<div class="login-page">
            <div class="form">
                
                <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                  <input type="text" placeholder="username" name="name" />
                  <input type="text" placeholder="email address" name="email" />
                  <input type="password" placeholder="password" name="password" />
                  <button type="submit" name="admin_reg">Submit</button>
                  <br><br>
                  <p>Already registered? <a href="login.php">Sign In</a></p>
                </form>
            
            </div>
        </div>

<?php
    require 'footer.php';

