

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,0)), url(images/f1.jpg)!important;
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
        .navbar-brand {
            color: white;
        }
        .container {
            /* margin-top: 50px; */
        }
        .form-container {
            background-color: #D3D9E9;
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
            /* background-color: #0a0d1c; */
              background-color: #005050;
      color: #fff;
      /* transform: scale(1.1); */
        }
        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" >
        <div class="container">
            <a class="navbar-brand" href="index.html">Campus Placement</a>
            <a class="navbar-brand text-end" href="index.html" style="color: #fff;">Go Back</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-container">
                    <h1>Student Login</h1>
                    <form action="" method="post">
                        <input class="form-control" type="text" placeholder="Enter UserName" name="UserName" required>
                        <input class="form-control" type="password" placeholder="Enter Password" name="Password" required>
                        <p class="forgot-password">Forget password?</p>
                        <button type="submit" class="btn btn-login" name="s">Login</button>
                        <div class="text-center">
                            <p class="p-2" >Not a Member? <span><a href="studentregister.php"> Sign Up</a></span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        sessionStorage.setItem('currentSection', 'StudentProfile-content');
    </script>
</body>
</html>


<?php 
session_start();


if(isset($_POST['s'])) {
    $usr = @$_POST['UserName']; 
    $pass = @$_POST['Password']; 
    
   
    include "connections.php"; 
$query = "SELECT * FROM  student WHERE username = '$usr' AND password = '$pass'";
$result = mysqli_query($conn, $query);

if($result) {

    if(mysqli_num_rows($result) == 1) {
        

        $_SESSION['username'] = $usr; 
        header("Location: studentpanelpage.php"); 
        exit; 
    } else {
 
        echo "Wrong username or password....";
    }
} else {

    echo "Error: " . mysqli_error($conn);
}
}
?>
