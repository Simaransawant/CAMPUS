<?php
session_start();
include 'connections.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the status value is set and not empty
    if (isset($_POST['status']) && !empty($_POST['status'])) {
        // Get the job_id and s_username from the form submission
        $job_id = $_POST['job_id'];
        $s_username = $_POST['s_username'];
        
        // Get the status value from the form submission
        $status = $_POST['status'];
        
        // Update the status of the job application in the database
        $update_sql = "UPDATE applied_jobs SET status = ? WHERE job_id = ? AND s_username = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sss", $status, $job_id, $s_username);
        
        if ($update_stmt->execute()) {
            $_SESSION['message'] = "Status updated successfully.";
        } else {
            $_SESSION['message'] = "Error updating status: " . $conn->error;
        }
        
        // Redirect back to the page where the form was submitted from
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    } else {
        $_SESSION['message'] = "Status value not set.";
    }
} else {
    $_SESSION['message'] = "Invalid request method.";
}

// Close database connection
$conn->close();
?>



<?php
// Database connection parameters
include 'connections.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the status value is set and not empty
    if (isset($_POST['delete']) && !empty($_POST['delete'])) {
        // Get the job_id and s_username from the form submission
        $job_id = $_POST['job_id'];
        $s_username = $_POST['s_username'];
        
        // Get the status value from the form submission
        $delete = $_POST['delete'];
        
        // Update the status of the job application in the database
        $delete_sql = "DELETE FROM applied_jobs WHERE job_id = ? AND s_username = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("ss",$job_id, $s_username);
        
        if ($delete_stmt->execute()) {
            $_SESSION['message'] = "Status updated successfully.";
        } else {
            $_SESSION['message'] = "Error updating status: " . $conn->error;
        }
        
        // Redirect back to the page where the form was submitted from
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    } else {
        $_SESSION['message'] = "Status value not set.";
    }
} else {
    $_SESSION['message'] = "Invalid request method.";
}

// Close database connection
$conn->close();
?>