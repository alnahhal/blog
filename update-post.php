<?php
include "config.php";

if (isset($_POST['update'])) {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id='$post_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
     
        session_start();
        $_SESSION['success_message'] = "Record updated successfully.";
        header('Location: index.php');
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$post_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
?>
          

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">

    <title>Edit Post</title>
</head>

    <section class="vh-100" style="background-color: #f5f7fa;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

       

        <div class="card" style="border-radius: 15px;">
        
          <div class="card-body">
          <h1 class="mb-4 text-center" style="color: #0b5ed7;">Edit Post</h1>
           <form action="" method="post">
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Title</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title"  required  value="<?php echo $title; ?>">
                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
              </div>
            </div>

           <!-- ////////////////// -->

            <div class="row align-items-center py-3">
               <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Content</h6>

               </div>
              <div class="col-md-9 pe-5">

                
                <textarea  class="form-control form-control-lg"  name="content" placeholder="Content" style="height: 200px;" required><?php echo $content; ?></textarea>
             
              </div>
            </div>

           

            <div class="row justify-content-center">
               <div class="col-md-6 text-center">
                  <button type="submit" name='update' class="btn btn-primary btn-lg">Edit Post</button>
              </div>
            </div>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<?php
        }
    } else {
        header('Location: index.php');
        exit(); // Ensure script execution stops after redirection
    }
}
?>
