<?php
include "conection.php" ;
if(isset($_POST['submit'])){
    // echo "Success";
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];

    //insert query.
    $sql="insert into (name,email,phone,address) values ('$name','$email','$mobile','$address') " ;
    $result=mysqli_query($conn,$sql);
    if($result){
       header('location:display.php');
    }else{
        echo die("Data not inserted");
    }
}

?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="logo">
        <img src="logo.png" alt="">
    </div>
    <div class="container">
        <h1 class="FormTitle">Registration</h1>
        <form action="" method="post" >
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="FullName">Full Name</label>
                <input type="text"
                id="FullName"
                name="FullName"
                placeholder="Enter Full Name">

            </div>
            <div class="user-input-box">
                <label for="UserName">User Name</label>
                <input type="text"
                id="UserName"
                name="UserName"
                placeholder="Enter User Name">

            </div>
            <div class="user-input-box">
                <label for="E-MAil">E-Mail</label>
                <input type="email"
                id="E-MAil"
                name="E-MAil"
                placeholder="Email">

            </div>
            <div class="user-input-box">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text"
                id="PhoneNumber"
                name="PhoneNumber"
                placeholder="Enter Phone Number">

            </div>
            <div class="user-input-box">
                <label for="Password">Password</label>
                <input type="password"
                id="Password"
                name="Password"
                placeholder="Enter Password">

            </div>
            <div class="user-input-box">
                <label for="ConfirmPassword">Confirm Password</label>
                <input type="password"
                id="ConfirmPassword"
                name="ConfirmPassword"
                placeholder="Confirm Password">

            </div>
        </div>
        <div class="gender-details-box">
            <span class="gender-title"> Gender</span>
            <div class="gender-category">
                <input type="radio" name="Gender" id="Male">
                <label for="Male">Male</label>
                <input type="radio" name="Gender" id="Female">
                <label for="Female">Female</label>
                <input type="radio" name="Gender" id="Other">
                <label for="Other">Other</label>
            </div>
        </div>
        <div class="Form-submit-btn">
            <input type="submit" name="submit" value="Register">
        </div>
        </form>
    </div>
    

    
</body>
</html>