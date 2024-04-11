<?php 
session_start();

if(isset($_POST['sumbit1'])) {
    $usr = @$_POST['username']; 
    $pass = @$_POST['password']; 
    
    include "connections.php"; 
    $query = "SELECT * FROM admin WHERE username = '$usr' AND password = '$pass'";
    $result = mysqli_query($conn, $query);

    if($result) {
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['admin'] = $usr; 
            header("Location: testing.php"); 
            exit; 
        } else {
            // echo "Wrong username or password....";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
   
   
   background-image:linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0)),
   url(images/f1.jpg)!important;
   
   height: 100vh;
   background-size: cover;
   background-position: center;
   font-family: 'Roboto', sans-serif;

}
    .navbar{
        background: linear-gradient(135deg, #005050, #74bdbd);
    }
        .navbar-brand {
            color: white;
        }
        .container {
            /* margin-top: 50px; */
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }
        .form-container h1 {
            color: black;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .btn-login {
            background-color: #008080;
            transition: all 0.3s ease;
            color: white;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #005050;
      color: #fff;
        }
        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">Campus Placement</a>
            <a class="navbar-brand text-end" href="index.html" style="color: #fff;">Go Back</a>
        </div>
    </nav>

    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-container">
                    <h1>Admin Login</h1>
                    <form action="#" method="post">
                        <input class="form-control" type="text" placeholder="Enter UserName" name="username" required>
                        <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
                        <p class="forgot-password p-1">Forget password?</p>
                        <button type="submit" class="btn btn-login" name="sumbit1">Login</button>
                    </form>
                    <p>Not a Member? <span><a href="adminregistt.php">Sign Up</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        sessionStorage.setItem('currentSection', 'Placement-Statistics-content');
        sessionStorage.setItem('openDropdownId', 'lol');


    </script>
</body>
</html>
