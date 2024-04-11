<?php
include 'connections.php';
if (isset($_POST['withdrow_btn'])){
    $id = $_POST['id'];
    $with = $_POST['withdrow'];

    
    $insert_sql = "UPDATE `applied_jobs` SET `status`=? WHERE `id`=?";
    

    $insert_stmt = $conn->prepare($insert_sql);

  
    $insert_stmt->bind_param("ss", $with, $id);

    if ($insert_stmt->execute() === TRUE) {
        $_SESSION['message'] = "Job Withdrawn Successfully.";
        header('location: studentpanelpage.php#Job-Applied-content');
        exit();
    } else {
        $_SESSION['message'] = "Error: " . $insert_stmt->error;
    } 
}
?>
