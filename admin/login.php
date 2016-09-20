<?php
session_start();
    require 'header.php';
    require 'fun.php';
    
    if(!empty($_SESSION['mwo_admin_user_name'])){
        header('Location: index.php');
    }
?>


<body>
    <?php loginhandler(); ?>
		<div class="login-page">
            <div class="form">
                <form class="register-form">
                  <input type="text" placeholder="name"/>
                  <input type="password" placeholder="password"/>
                  <input type="text" placeholder="email address"/>
                  <button>create</button>
                  <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form">
                  <input type="text" placeholder="username"/>
                  <input type="password" placeholder="password"/>
                  <button>login</button>
                  <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>

<?php
    require 'footer.php';

