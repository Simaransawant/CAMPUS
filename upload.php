
<?php
include 'connections.php';

if (isset($_POST['upload'])) {
    $d_uname = $_POST['d_id'];
    if(empty($_FILES["image"]["tmp_name"])) {
        echo "<script>
    window.alert('Please select an image to upload'); 
    window.location.href = 'studentpanelpage.php ';
    </script>
    </script>";
        // header('location:d_profile.php');
        exit();
    }

    // Check if a record exists for the user
    $check_query = "SELECT id FROM d_image WHERE s_name = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("s", $d_uname);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows == 0) {
        // If no record exists, insert a new one
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $insert_query = "INSERT INTO d_image (image_data, s_name) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("ss", $imageData, $d_uname);
        if ($stmt_insert->execute()) {
            header('location:studentpanelpage.php');
            exit(); // Exit after successful operation
        } else {
            echo "Error inserting image: " . $stmt_insert->error;
            exit(); // Exit on error
        }
    } else {
        // If a record exists, update the existing one
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $update_query = "UPDATE d_image SET image_data = ? WHERE s_name = ?";
        $stmt_update = $conn->prepare($update_query);
        $stmt_update->bind_param("ss", $imageData, $d_uname);
        if ($stmt_update->execute()) {
            header('location:studentpanelpage.php');
            exit(); // Exit after successful operation
        } else {
            echo "Error updating image: " . $stmt_update->error;
            exit(); // Exit on error
        }
    }
}

if (isset($_POST['Delete'])) {
    $d_uname = $_POST['d_id'];

    // Delete the user's image (as in your original code)
    $delete_query1 = "DELETE FROM d_image WHERE  s_name = ?";
    $stmt_delete = $conn->prepare($delete_query1);
    $stmt_delete->bind_param("s", $d_uname);
    if ($stmt_delete->execute()) {

        header('location:studentpanelpage.php');
        exit(); 
    } else {
        echo "Error deleting image: " . $stmt_delete->error;
        exit();
    }
}

$connection->close();
?>