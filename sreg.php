<?php
    include 'conection.php';
   

    if(isset($_POST['submit'])){
        $fullName = $_POST['FullName'];
        $userName = $_POST['UserName'];
        $email = $_POST['Studentemail'];
        $phoneNumber = $_POST['PhoneNumber'];
        $dateOfBirth = $_POST['DateOfBirth'];
        $password = $_POST['Password'];
        $confirmPassword = $_POST['ConfirmPassword'];
        $enrolmentNo = $_POST['EnrolmentNo'];
        $yearLevel = $_POST['yearLevel'];
        $degreeProgram = $_POST['degreeProgram'];
        $gender = $_POST['Gender']; 

        if (empty($fullName) || empty($userName) || empty($email) || empty($password) || empty($confirmPassword) || empty($enrolmentNo) || empty($yearLevel) || empty($degreeProgram) || empty($gender)) {
                    die("All fields are required.");
                }
               
                // Additional validation (you can customize this based on your requirements)
            
                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    die("Invalid email format.");
                }
            
                // Validate password length (for example, at least 6 characters)
                if (strlen($password) < 6) {
                    die("Password should be at least 6 characters long.");
                }
            
                // Check if password and confirm password match
                if ($password !== $confirmPassword) {
                    die("Password and Confirm Password do not match.");
                }
            
        
        $sql = "INSERT INTO `student_regist_test`(`ID`, `FullName`, `UserName`, `Email`, `PhoneNumber`, `DateofBirth`, `Password`, `Confirmpassword`, `EnrolmentNo`, `YearLevel`, `DegreeProgram`, `gender`) 
        VALUES ('','$fullName', '$userName', '$email', '$phoneNumber', '$dateOfBirth', '$password', '$confirmPassword', '$enrolmentNo', '$yearLevel', '$degreeProgram', '$gender')";
        $result = mysqli_query($connection, $sql);

        if($result){
            header('location: index.html');
        } else {
            die("Data not inserted: " . mysqli_error($connection));
        }
    }
?>
