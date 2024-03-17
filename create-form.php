

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">

    <title>create post</title>
</head>

    <section class="vh-100" style="background-color: #f5f7fa;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

       

        <div class="card" style="border-radius: 15px;">
        
          <div class="card-body">
          <h1 class="mb-4 text-center" style="color: #0b5ed7;">Create Post</h1>
           <form method="post" action="index.php">
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Title</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="title"  class="form-control form-control-lg" placeholder="Enter Title"  required/>
             
              </div>
            </div>

           <!-- ////////////////// -->

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Content</h6>

              </div>
              <div class="col-md-9 pe-5">

                
                <textarea  class="form-control form-control-lg"  name="content" placeholder="Content" style="height: 200px;" required></textarea>
              </div>
            </div>

           

            <div class="row justify-content-center">
               <div class="col-md-6 text-center">
                  <button type="submit" class="btn btn-primary btn-lg">Add Post</button>
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