<?php
function signup(){
    include '../database.php';
    if(isset($_POST['admin_reg'])){
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $pass = filter_input(INPUT_POST, 'password');
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d h:i:s'); 
    
        if(empty($name) || empty($email) || empty($pass)){
                ?>
           
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Some fields are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            
           
            }else{
            $sql = "INSERT INTO admin (username, email, password, created_at, updated_at)
            VALUES ('$name', '$email', '$pass', '$timestamp','$timestamp')";

                if($conn->query($sql) === TRUE) {
                    
                    $_SESSION['mwo_admin_user_name'] = $name;            
                
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
}
// sign up function ends here *******************************************************

function loginchecker(){
    if(empty($_SESSION['mwo_admin_user_name'])){
        header('Location: login.php');
    }
}
// login checker function ends here *******************************************************

function loginhandler(){
    include '../database.php';
    if(isset($_POST['admin_login'])){
        
        $lname = mysql_real_escape_string(filter_input(INPUT_POST, 'email'));
        $lpass = mysql_real_escape_string(filter_input(INPUT_POST, 'password'));
       
        if(empty($lname) || empty($lpass)){
                ?>
           
        
            <div class="alert alert-danger" role="alert">
                <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                <span class="sr-only">Error:</span>
                Error! Some fields are empty or wrong value. Please fill correct values.
            </div>
                  
       <?php
            
           
            }else{
            $sql = "SELECT username, password FROM admin WHERE (email = '$lname') AND password = '$lpass'";
            
    
            $result = $conn->query($sql);

            if ($result -> num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $_SESSION['mwo_admin_user_name'] = $row['username'];
                    
                    header('Location: index.php');
                }
            }else{
                 
                echo "<div class='alert alert-danger'>
                    
                        <div class='alert-icon'>
                            <i class='material-icons'>error_outline</i>
                        </div>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='material-icons'>clear</i></span>
                        </button>
                        <b>Error Alert:</b> The username and password you entered did not match our records. Please try again.
                    
                </div>";
                
            } 
        }
    }
}
