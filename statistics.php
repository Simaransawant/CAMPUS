<?php
include 'connections.php'; 

// Create connection
// $conn = new mysqli($servername1, $username1, $password1, $dbname1);
$sql = "SELECT COUNT(*) AS total_students FROM student";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_students = $row['total_students'];


// Create connection
// $conn1 = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT COUNT(*) AS total_jobs FROM jobs";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_jobs = $row['total_jobs'];

// $conn1 = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT COUNT(*) AS total_applications FROM applied_jobs";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_applications = $row['total_applications'];

$sql = "SELECT COUNT(*) AS total_interviews FROM applied_jobs WHERE yes='YES' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_interviews = $row['total_interviews'];




// // Fetch total number of students
// $sql_students = "SELECT COUNT(*) AS total_students FROM students";
// $result_students = mysqli_query($conn, $sql_students);
// $row_students = mysqli_fetch_assoc($result_students);
// $total_students = $row_students['total_students'];

// // Fetch total number of companies
// $sql_companies = "SELECT COUNT(*) AS total_companies FROM jobs";
// $result_companies = mysqli_query($conn, $sql_companies);
// $row_companies = mysqli_fetch_assoc($result_companies);
// $total_companies = $row_companies['total_companies'];

// // Fetch total number of applications
// $sql_applications = "SELECT COUNT(*) AS total_applications FROM applications";
// $result_applications = mysqli_query($conn, $sql_applications);
// $row_applications = mysqli_fetch_assoc($result_applications);
// $total_applications = $row_applications['total_applications'];

// Create an array to hold the statistics
// $statistics = array(
//     'total_students' => $total_students,
//     'total_companies' => $total_companies,
//     'total_applications' => $total_applications
// );


// echo json_encode($statistics);


mysqli_close($conn);

?>
