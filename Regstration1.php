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
    <link rel="stylesheet" href="r1.css">
</head>
<body>
    <div class="logo">
        <img src="images/logo.png" alt="">
    </div>
    <div>
    <div class="container">
        <h1 class="FormTitle">Registration</h1>
        <form action="Registration1.php" method="post" >
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="FullName">Full Name</label>
                <input type="text"
                id="FullName"
                name="FullName"
                placeholder="Enter Student Name">

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
                <input type="number"
                id="PhoneNumber"
                name="PhoneNumber"
                placeholder="Enter Phone Number">

            </div>
           
            <div class="user-input-box">
                <label for="DateOfBirth">Date of Birth :</label>
            <input type="date" id="Date of Birth" name="Date of Birth" placeholder="Enter Date of Birth" autocomplete="off"/><br>
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
                       

            <div class="user-input-box">
                <label for="SelectYourCountry">Select your Country:</label>
                <select name="country">
                    <option value="" selected="selected" disabled="disabled">Select your country</option>
                    <option value="1">India</option>
                    <option value="2">other</option>
                    </select>
            </div>

            <div class="put-box">
                <label class="sub" for="SelectYourCourses">Select your Courses:</label><br>
                <input type="checkbox" id="Course1" name="Course1" >
                <label for="Course1">Web Development</label><br>
                <input type="checkbox" id="Course2" name="Course2">
                <label for="Course2"> App Development</label><br>
                <input type="checkbox" id="Course3" name="Course3" >
                <label for="Course3"> Computer Graphics</label>
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
            <div class="user-input">
                <label for="UploadCV">Upload CV:</label>
              <input type="file" id="UploadCV" name="UploadCV">
            </div>
        </div>
        
        <div class="Form-submit-btn">
           <input class="button" type="submit" value="submit">

            <input class="button" type="reset" value="reset">
           
        </div>
        </form>
    </div>
    
    

</div>
</body>
</html>

<?php
    include 'conection.php';

  
    if(isset($_POST['submit'])){
        // echo "Success";
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];

        //insert query.
        $sql="insert into employee(name,email,phone,address) values ('$name','$email','$mobile','$address') " ;
        $result=mysqli_query($conn,$sql);
        if($result){
           header('location:');
        }else{
            echo die("Data not inserted");
        }
}

    ?>