<?php
// Database connection parameters
include 'connections.php';

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
    $sql = "DELETE FROM `jobs` WHERE id = $idToDelete";

    if ($conn->query($sql) === TRUE) {
        echo "<script>windows.location.herf='testing.php#Jobs-List-content' </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Redirect back to the joblist.php page after deleting
    header("Location: testing.php");
    exit();
} else {
    // If 'delete' parameter is not set, display an error message
    echo "Error: Delete parameter not set.";
}
?>
