<?php
include "config.php";
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $sql = "DELETE FROM posts WHERE id ='$post_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Record deleted successfully.";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
