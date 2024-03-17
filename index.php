<?php
//phpinfo();
session_start();
include 'config.php';




// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    // Check if the "Remember Me" cookie exists
    if (isset($_COOKIE['remember_me_cookie'])) {
        // Extract username and hashed password from the cookie value
        list($username, $hashedPassword) = explode(':', $_COOKIE['remember_me_cookie']);

        // Validate the user's credentials
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Check if the hashed password matches the one stored in the database
            if (password_verify($row['password'], $hashedPassword)) {
                // Set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $username;
                // Redirect to index page
                header("Location: index.php");
                exit();
            }
        }
    }

  // If the session username is still not set, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login-form.php");
    exit();
}
  
}
    // Check if there's a success message in the session
    if (isset($_SESSION['success_message'])) {
      echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
  // Clear the success message from the session
   unset($_SESSION['success_message']);
    }


 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_id'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', '$user_id')";

        if (mysqli_query($conn, $sql)) {
            
            echo '<div class="alert alert-success" role="alert">' . 'Post added successfully!'. '</div>';

            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: user_id not set in session.";
    }
}

include 'show-posts.php';
?>


