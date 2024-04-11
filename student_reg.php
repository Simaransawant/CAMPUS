<?php
include 'conection.php';

if (isset($_POST['submit'])) { // Change 'submit' to match the name attribute of your submit button
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
  

    // Check if any required field is empty
    if (empty($fullName) || empty($userName) || empty($email) || empty($password) || empty($confirmPassword) || empty($enrolmentNo) || empty($yearLevel) || empty($degreeProgram) || empty($gender)) {
        die("All fields are required.");
    }

    // Check if username is already taken
    $checkUsernameQuery = "SELECT * FROM student WHERE UserName='$userName' LIMIT 1";
    $resultUsername = mysqli_query($connection, $checkUsernameQuery);
    $usernameExists = mysqli_fetch_assoc($resultUsername);

    // Check if email is already registered
    $checkEmailQuery = "SELECT * FROM student WHERE Studentemail='$email' LIMIT 1";
    $resultEmail = mysqli_query($connection, $checkEmailQuery);
    $emailExists = mysqli_fetch_assoc($resultEmail);

    if ($usernameExists) {
        die("Username already exists.");
    }

    if ($emailExists) {
        die("Email address is already registered.");
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

    // Insert the record into the database if validation passes
    $sql = "INSERT INTO `student`(`FullName`, `UserName`, `Studentemail`, `PhoneNumber`, `DateofBirth`, `Password`, `Confirmpassword`, `EnrolmentNo`, `yearLevel`, `DegreeProgram`, `Gender`) 
            VALUES ('$fullName', '$userName', '$email', '$phoneNumber', '$dateOfBirth', '$password', '$confirmPassword', '$enrolmentNo', '$yearLevel', '$degreeProgram', '$gender')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('location: index.html');
        exit(); // Ensure script execution stops after redirection
    } else {
        die("Data not inserted: " . mysqli_error($connection));
    }
}
?>
