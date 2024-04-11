<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "managestudent";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_add_student"])) {
    $StudentName = $_POST["StudentName"];
    $RollNumber = $_POST["RollNumber"];
    $Department = $_POST["Department"];
    $Year = $_POST["Year"];

    // Perform SQL insert with prepared statement
    // $stmt = $conn->prepare("INSERT INTO students (StudentName, RollNumber, Department, Year) VALUES (?, ?, ?, ?)");
    // $stmt->bind_param("ssss", $StudentName, $RollNumber, $Department, $Year);

        $sql = "INSERT INTO `students` (`StudentName`, `RollNumber`, `Department`, `Year`)
         VALUES ('$StudentName', '$RollNumber', '$Department', '$Year')";


    if (mysqli_query($conn,$sql)) {
        echo "Student added successfully";
        header('location:managestudents.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }   
}
$conn->close();
?>