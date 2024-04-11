<?php
// add_job.php

include 'connections.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST["companyName"];
    // $position = $_POST["position"];
    $jobCategory = $_POST["jobCategory"];
    // $jobType = $_POST["jobType"];
    $noOfVacancy = $_POST["noOfVacancy"];
    $experience = $_POST["SelectExperience"];
    $postedDate = $_POST["postedDate"];
    $lastDateToApply = $_POST["lastDateToApply"];
    // $closeDate = $_POST["CloseDate"];
    // $gender = $_POST["SelectGender"];
    $salaryFrom = $_POST["SalaryFrom"];
    // $salaryTo = $_POST["SalaryTo"];
    $location = $_POST["Location"];
    // $description = $_POST["description"];

    // Perform SQL insert
    // $sql = "INSERT INTO jobs (companyName, position, jobCategory, jobType, noOfVacancy, SelectExperience, postedDate, lastDateToApply, closeDate, SelectGender, salaryFrom, salaryTo, location, description)
    //         VALUES ('$companyName', '$position', '$jobCategory', '$jobType', '$noOfVacancy', '$experience', '$postedDate', '$lastDateToApply', '$closeDate', '$gender', '$salaryFrom', '$salaryTo', '$location', '$description')";

    $sql = "INSERT INTO jobs (companyName,  jobCategory,  noOfVacancy, SelectExperience, postedDate, lastDateToApply, salaryFrom,  location)
    VALUES ('$companyName', '$jobCategory',  '$noOfVacancy', '$experience', '$postedDate', '$lastDateToApply', '$salaryFrom',  '$location')";

    if ($conn->query($sql) === TRUE) {
        // echo "Job submitted successfully";
        // echo "<script>windows.location.herf='testing.php#Jobs-List-content'</script>";
        header("Location:testing.php#Jobs-List-content");
        // header("Location: testing.php#manage-Students-content");


    ;

exit();

        //  . http_build_query($_POST));
        // exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

$conn->close();
?>
