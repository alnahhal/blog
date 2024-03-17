<?php

session_start();
include 'config.php';

     

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql); // Using procedural MySQLi functions

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Using procedural MySQLi functions
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;
      

           // Check if the "Remember Me" checkbox is checked
           if (isset($_POST['rememberMe'])) {
            // Hash the password and set a cookie with the user's login credentials
            $hashedPassword = password_hash($row['password'], PASSWORD_DEFAULT);
            $cookieValue = $username . ':' . $hashedPassword;
            setcookie("remember_me_cookie", $cookieValue, time() + 60, "/");
        }

            header("Location: index.php");
            exit(); // Ensure script execution stops after redirection

        } else {
            echo "Invalid username or password";
         
          
        }
    } else {
        echo "Invalid username or password";
        $_SESSION['error_message'] = "Invalid username or password";
            header("Location: login-form.php");
            exit(); 
    }

       
}


?>
