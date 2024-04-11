<?php
// Check if the form is submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if either "status" or "delete" field is set in the form data
    if (isset($_POST["status"])) {
        // Retrieve the values from the form
        $jobId = $_POST["job_id"];
        $status = $_POST["status"];
        
        // Perform any necessary validation or sanitization
        
        // Update the status in the database
        include 'connections.php';
        $sql = "UPDATE applied_jobs SET status='$status' WHERE job_id='$jobId'";
        if ($conn->query($sql) === TRUE) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . $conn->error;
        }
        $conn->close();
    } elseif (isset($_POST["delete"])) {
        // Retrieve the value from the form
        $jobId = $_POST["job_id"];
        
        // Perform any necessary validation or sanitization
        
        // Delete the record from the database
        include 'connections.php';
        $sql = "DELETE FROM applied_jobs WHERE job_id='$jobId'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    } else {
        // Handle cases where neither "status" nor "delete" field is set
        echo "Invalid request: Neither status nor delete action specified.";
    }
} else {
    // Handle cases where the form is not submitted via POST request
    echo "Invalid request: Form not submitted via POST.";
}
?>
