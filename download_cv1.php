<?php
include 'connections.php';

if(isset($_POST['download'])) {
    $s_name = $_POST['id']; // Change from $_POST['s_name'] to $_POST['id']

    $fetch_query = "SELECT * FROM report_upload WHERE s_name = ?";
    $stmt_fetch = $conn->prepare($fetch_query);
    $stmt_fetch->bind_param("s", $s_name);
    $stmt_fetch->execute();
    $result = $stmt_fetch->get_result();

    if($result->num_rows > 0) {
        $file_data = $result->fetch_assoc();

        // Set appropriate headers for download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_data['file_name'] . '"');
        header('Content-Length: ' . $file_data['file_size']);

        // Output the file content
        echo $file_data['file_content'];
     

        // Exit script after outputting the file
        exit();
    } else {
        // File not found
        // echo "File not found.";
        header('Location:testing.php');
        exit();
    }
} else {
    // Invalid request
    echo "Invalid request.";
    exit();
}
?>
