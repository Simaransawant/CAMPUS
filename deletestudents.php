<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "managestudent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'delete' parameter is set in the URL
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];

    // Perform the SQL delete operation
    $sql = "DELETE FROM `students` WHERE id = $idToDelete";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Redirect back to the joblist.php page after deleting
    header("Location: managestudents.php");
    exit();
} else {
    // If 'delete' parameter is not set, display an error message
    echo "Error: Delete parameter not set.";
}
?>