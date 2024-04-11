<?php 
include 'connections.php';
if (isset($_POST['resupload'])) {
    $p_id = $_POST['s_id'];

    if (empty($_FILES["res"]["tmp_name"])) {
        $_SESSION['msg'] = 'Please select a file to upload.';
        header('Location:studentpanelpage.php');
        exit();
    }

    if ($_FILES["res"]["size"] > 2000000) { 
        $_SESSION['msg'] = 'File size exceeds 2MB limit.';
        header('Location:studentpanelpage.php');
        exit();
    }

    // Prepare the data for insertion into the database
    $file_name = $_FILES["res"]["name"];
    $file_type = $_FILES["res"]["type"];
    $file_size = $_FILES["res"]["size"];
    $file_content = file_get_contents($_FILES["res"]["tmp_name"]);

    // Prepare and execute the SQL statement to insert data into the database
    // $insert_query = "INSERT INTO report_upload (file_name, file_type, file_size, file_content, s_name) VALUES (?, ?, ?, ?, ?)";
    // $update_query = "UPDATE report_upload SET file_name = ?, file_type = ?, file_size = ?, file_content = ?, s_name=?  WHERE s_name = '$p_id'";
    // $stmt_update = $conn->prepare($update_query);
    // $stmt_update->bind_param("ssiss", $file_name, $file_type, $file_size, $file_content, $p_id);

    $update_query = "UPDATE report_upload SET file_name = ?, file_type = ?, file_size = ?, file_content = ? WHERE s_name = ?";
    $stmt_update = $conn->prepare($update_query);
    $stmt_update->bind_param("sssbs", $file_name, $file_type, $file_size, $file_content, $p_id);

    if ($stmt_update->execute()) {
        $_SESSION['msg'] = 'File uploaded successfully.';
        header('Location:studentpanelpage.php');
    exit();
    } else {
        $_SESSION['msg'] = 'Error uploading file: ' . $stmt_update->error;
    }

    header('Location: studentpanelpage.php');
    exit();
} else {
    $_SESSION['msg'] = 'Invalid request.';
    header('Location: studentpanelpage.php');
    exit();
}
?>