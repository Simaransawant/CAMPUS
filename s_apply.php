<?php
session_start(); // Start the session
include 'connections.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id'];
    $job_comp = $_POST['job_companyName'];
    $job_jobCategory = $_POST['job_jobCategory'];
    $s_username = $_POST['s_username'];
    $s_FullName = $_POST['s_FullName'];
    $s_Studentemail = $_POST['s_Studentemail'];
    $s_PhoneNumber = $_POST['s_PhoneNumber'];
    $s_EnrolmentNo = $_POST['s_EnrolmentNo'];
    $s_degreeProgram = $_POST['s_degreeProgram'];
    




    $check_sql = "SELECT * FROM applied_jobs WHERE job_id = ? AND s_username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss",$job_id,$s_username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Set session variable for message if user has already applied
        $_SESSION['message'] = "You have already applied for this job.";
    
    } else {
        // Insert new record into the applied_jobs table
        $insert_sql = "INSERT INTO `applied_jobs`(`job_id`,`comp`,`job_cat`,`s_username`,`f_name`,`s_email`,`s_PhoneNumber`,`s_enroll`,`s_deg`)  VALUES (?,?,?,?,?,?,?,?,?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssssssss", $job_id,$job_comp,$job_jobCategory,$s_username,$s_FullName,$s_Studentemail,$s_PhoneNumber,$s_EnrolmentNo,$s_degreeProgram);

        if ($insert_stmt->execute() === TRUE) {
            // Set session variable for message for successful application
            $_SESSION['message'] = "Job Application Submitted Succesfully.";
            header('location:studentpanelpage.php#Job-Applied-content');
            exit;
        } else {
            $_SESSION['message'] = "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }

    
    header('location:studentpanelpage.php#Job-Applied-content');
    exit;
    $check_stmt->close();
    $insert_stmt->close();
} else {
    $_SESSION['message'] = "Please fill in all the fields";
}


// Close database connection
$conn->close();
?>
