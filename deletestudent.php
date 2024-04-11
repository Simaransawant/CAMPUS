<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'delete' parameter is set in the URL
if (isset($_GET['delete1'])) {
    $idToDelete = $_GET['delete1'];

    // Perform the SQL delete operation
    $sql11 = "DELETE FROM `addstudents` WHERE id = $idToDelete";

    if ($conn->query($sql11) === TRUE) {
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Redirect back to the joblist.php page after deleting
    header("Location:testing.php#manage-Students-content");
    exit();
} else {
    // If 'delete' parameter is not set, display an error message
    echo "Error: Delete parameter not set.";
}
?>
