<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "addjob";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $companyName = $_POST['companyName'];
    $position = $_POST['position'];
    $jobCategory = $_POST['jobCategory'];
    $jobType = $_POST['jobType'];
    $postedDate = $_POST['postedDate'];
    $lastDateToApply = $_POST['lastDateToApply'];
    $CloseDate = $_POST['CloseDate'];

    $sql = "UPDATE jobs SET 
            companyName = '$companyName', 
            position = '$position', 
            jobCategory = '$jobCategory', 
            jobType = '$jobType', 
            postedDate = '$postedDate', 
            lastDateToApply = '$lastDateToApply', 
            CloseDate = '$CloseDate' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // echo "Record updated successfully";
        header("Location:testing.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
