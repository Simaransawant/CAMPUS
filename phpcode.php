<!-- add job code -->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "addjob";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle job submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $companyName = $_POST["companyName"];
    $position = $_POST["position"];
    $jobCategory = $_POST["jobCategory"];
    $jobType = $_POST["jobType"];
    $noOfVacancy = $_POST["noOfVacancy"];
    $experience = $_POST["SelectExperience"];
    $postedDate = $_POST["postedDate"];
    $lastDateToApply = $_POST["lastDateToApply"];
    $closeDate = $_POST["CloseDate"];
    $gender = $_POST["SelectGender"];
    $salaryFrom = $_POST["SalaryFrom"];
    $salaryTo = $_POST["SalaryTo"];
    $location = $_POST["Location"];
    $description = $_POST["description"];

    // Perform SQL insert
    $sql = "INSERT INTO jobs (companyName, position, jobCategory, jobType, noOfVacancy, SelectExperience, postedDate, lastDateToApply, closeDate, SelectGender, salaryFrom, salaryTo, location, description)
            VALUES ('$companyName', '$position', '$jobCategory', '$jobType', '$noOfVacancy', '$experience', '$postedDate', '$lastDateToApply', '$closeDate', '$gender', '$salaryFrom', '$salaryTo', '$location', '$description')";

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
<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "addjob";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // $conn1 = new mysqli ('localhost','root' , '' , 'addjob');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $display_data = mysqli_query($conn, "SELECT * FROM `jobs`");

            if (mysqli_num_rows($display_data) > 0) {
                while ($row = mysqli_fetch_assoc($display_data)) {
                    ?>
                    <tr  >
                        <td class=" border-2"><?php echo $row['jobCategory'] ?></td>
                        <td class=" border-2"><?php echo $row['position'] ?></td>
                        <td class=" border-2"><?php echo $row['jobType'] ?></td> 
                        <td class=" border-2"><?php echo $row['postedDate'] ?></td>
                        <td class=" border-2"><?php echo $row['lastDateToApply'] ?></td>
                        <td class=" border-2"><?php echo $row['CloseDate'] ?></td>
                        <td class=" border-2 "><?php echo $row['companyName'] ?></td>
                   

                        <td class="bg-light border-2">
                            <div class="">
                                <a href="deletejob.php?delete=<?php echo $row['id'] ?>" class="btn1-edit btn m-1 col-10 text-white  " style="background-color: #80669d" >Delete</a>
                                <!-- <a href="edit.php?edit=<?php echo $row['id'] ?>" class="btn1">Edit</a> -->
                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn1-edit btn m-1 col-10" style="background-color: #5dbea3;" >Edit</a>
                                
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='14'>No job listings found</td></tr>";
            }
            $conn->close();
            ?>

<?php 
    $conn = mysqli_connect("localhost", "root", "", "campus");
    $sql_display1 = "SELECT * FROM addstudents";
    $result_display1 = mysqli_query($conn, $sql_display1);
    ?>