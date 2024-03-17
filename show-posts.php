<?php
// Check if the session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<html>
<head>
    <title>Blog</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/show.css">
</head>
<body>
   

    
    <section class="intro">
  <div class="bg-image h-100" style="background-color: #f5f7fa;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">

         
          <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container mt-5">
  
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <h1 style="color: #0b5ed7;">Welcome, <?php echo $_SESSION['username']; ?></h1>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
       
        <a class="btn btn-primary me-3" href="create-form.php">create Post</a>
        <a class="btn btn-danger me-3"  href="logout.php">Logout</a>

      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->


          <h2 class='text-center' style="color: #0b5ed7;">POSTS</h2>
            <div class="card">
                
              <div class="card-body p-0">

             
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                  <table class="table table-striped mb-0">
                    <thead style="background-color: #0b5ed7;">
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $user_id = $_SESSION['user_id'];
                      $sql = "SELECT * FROM posts WHERE user_id = '$user_id'";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['content'] . "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-danger' href='delete-post.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this post?');\">Delete</a>";
                            echo "&nbsp;";
                            echo "<a class='btn btn-info' href='update-post.php?id=" . $row['id'] . "'>Edit</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                          echo "<tr><td colspan='3' class='text-center'>No posts yet.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="js/scripts.js"></script>
</body>
</html>





