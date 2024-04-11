<?php
// display_jobs.php

include 'db_connection.php';

$sql_display = "SELECT * FROM `jobs`";
$result_display = mysqli_query($conn, $sql_display);

// Check if there are any job listings
// if (mysqli_num_rows($result_display) > 0) {
//     echo "<h1 class='text-center p-1 mt-2' id='job-label'>Job List</h1>";
//     echo "<table class='table-responsive'>";
//     echo "<thead>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Company Name</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Position</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Job Category</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Job Type</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Posted Date</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Last Date To Apply</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Close Date</th>";
//     echo "<th style='background-color: #A6A9C8;' class='border-2'>Action</th>";
//     echo "</thead>";
//     echo "<tbody>";
    
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result_display)) {
        echo "<tr>";
        echo "<td class='border-2'>" . $row['companyName'] . "</td>";
        echo "<td class='border-2'>" . $row['position'] . "</td>";
        echo "<td class='border-2'>" . $row['jobCategory'] . "</td>";
        echo "<td class='border-2'>" . $row['jobType'] . "</td>";
        echo "<td class='border-2'>" . $row['postedDate'] . "</td>";
        echo "<td class='border-2'>" . $row['lastDateToApply'] . "</td>";
        echo "<td class='border-2'>" . $row['CloseDate'] . "</td>";
        echo "<td class='bg-light border-2'>";
        echo "<div class=''>";
        echo "<a href='deletejob.php?delete=" . $row['id'] . "' class='btn1-edit btn m-1 col-10 text-white' style='background-color: #80669d'>Delete</a>";
        echo "<a href='edit.php?edit=" . $row['id'] . "' class='btn1-edit btn m-1 col-10' style='background-color: #5dbea3;'>Edit</a>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
//  else {
//     echo "<p>No job listings found</p>";
// }

// Close the database connection
mysqli_close($conn);
?>
