



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
          .navbar {
      background: linear-gradient(135deg, #005050, #74bdbd);
    }
    .nav-link {
  color: #fff;
  text-decoration: none;
  position: relative;
}
body{
   
   
   background-image:linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0)),
   url(images/f1.jpg)!important;
   
   height: 100vh;
   background-size: cover;
   background-position: center;
   font-family: 'Roboto', sans-serif;

}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark   ">
        <div class="container-fluid">
            <a style="color: #fff;" class="navbar-brand" href="">Admin Panel</a>
            <a style="color: #fff;" class="navbar-brand text-end   " href="index.html">Go Back</a>
        </div>
    </nav>

                            <div class="container form-control shadow-lg w-25  mx-auto c_border mt-5"style="background-color:#D3D9E9 ;">
                            <?php if(isset($error)) { ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php } ?>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-container mt-1 ">

                                    <form action="hello.php" method="post">
                                    <h2 class="FormTitle text-center mt-2 ">Admin Register</h2>
                              <div class="form-group m-2">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required>
                              </div>
                              <div class="form-group m-2">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required>
                              </div>
                              <div class="form-group m-2">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" id="confirm-password" name="c_password" required>
                              </div>
                              <div class="form-group m-2">
                                <button type="submit" name="submit" class="btn  btn-block w-75  mt-3  " style="background-color: #161A30;color:white; ">Submit</button>
                              </div>
                              </form>

                                    </div>
                                </div>
                            </div>
                        </div>
</body>
</html>


