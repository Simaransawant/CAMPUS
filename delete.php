<?php
include 'connections.php'; // Include your database connection file

// Check if the ID parameter is set in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $studentId = mysqli_real_escape_string($conn, $_GET['id']);

    // Create the DELETE query
    $sql = "DELETE FROM student WHERE id = $studentId";

    // Execute the DELETE query
    if(mysqli_query($conn, $sql)) {
        // If the deletion is successful, redirect back to the student details page
        header('Location: testing.php#manage-Students-content');
        exit;
    } else {
        // If an error occurs, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If the ID parameter is not set, display an error message
    echo "ID parameter is missing.";
}

// Close the database connection
mysqli_close($conn);
?>
