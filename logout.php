<?php
session_start();
session_unset();
session_destroy();
 // Delete the "Remember Me" cookie
 setcookie("remember_me_cookie", "", time() - 3600, "/");
header("Location: login-form.php");
exit(); // Ensure script execution stops after redirection
?>
