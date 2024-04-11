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
        header("Location: joblist.php?" . http_build_query($_POST));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

$conn->close();
?>















    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="456.css">
    <style>
        /* Your styles remain unchanged */
    
        

    </style>
</head>
<body>
    <nav style="background-color: #bb1c1c;" class="navbar navbar-expand-lg custom-bg m-0 bg-black  ">
        <div  class="container-fluid">
        <a style="color: #fff;" class="navbar-brand"  href="index.html">Admin Panel</a>
        <a style="color: #fff;" class="navbar-brand text-end   "  href="index.html">Go Back</a>
      
            
        </div>
    </nav>
    <div id="admin-panel">
        <div id="sidebar">
            <!-- <h2 class="mt-2 mb-4 text-danger  ">Admin Panel</h2> -->
            
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('dashboard-dropdown')">Dashboard</a>
                <div id="dashboard-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="" onclick="showSection('Jobs-content')">Jobs</a>
                    <a href="#" onclick="showSection('Applications-content')">Applications</a>
                    <a href="#" onclick="showSection('Placement-Statistics-content')">Placement Statistics</a>
                    <a href="#" onclick="showSection('Companies-content')">Companies</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="" onclick="toggleDropdown('Jobs-dropdown')">Jobs</a>
                <div id="Jobs-dropdown" class="dropdown-content text-bg-danger">
                    <a href="#" onclick="showSection('Jobs-List-content')">Job List</a>
                    <a href="#" onclick="showSection('add-job-content')">New Jobs</a>
                </div>
            </div>
            
            <!-- <a href="#" onclick="showSection('students-content')">Students</a> -->
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Students-dropdown')">Students</a>
                <div id="Students-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Add-Students-content')">Add Students</a>
                    <a href="#" onclick="showSection('manage-Students-content')">Manage Students</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('communication-dropdown')">Communication</a>
                <div id="communication-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('send-notifications-content')">Send Notifications</a>
                    <a href="#" onclick="showSection('manage-announcement-content')">Manage Announcement</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Settings-dropdown')">Settings</a>
                <div id="Settings-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('General-Settings-content')">General Settings</a>
                    <a href="#" onclick="showSection('Account-Settings-content')">Account Settings</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Security-dropdown')">Security</a>
                <div id="Security-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="jobs.php" >Change Passwords</a>
                    
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Support-dropdown')">Support</a>
                <div id="Support-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Feedback-content')">Feedback</a>
                    <a  href="#" onclick="showSection('Help-Center-content')">Help Center</a>

                    
                </div>
            </div>
            <a href="#" onclick="showSection('Logout-content')">Logout</a>
            
            <!-- <a href="#" onclick="showSection('add-job-content')">Add Job</a> -->
            <!-- Add more sidebar links as needed -->
        </div>

        <!-- navbar end -->

            <div class="students">
                <div id="manage-Students-content" class="content-section">
                    <!-- Content for Students goes here -->
                    <div class="manage">
                     <h2>Manage Students</h2>
                    <table id='table'>
                    <thead>
                            <tr>
                                <th>StudentName</th>
                                <th>RollNumber</th>
                                <th>Department</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
           <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "managestudent";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // $conn1 = new mysqli ('localhost','root' , '' , 'addjob');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $display_data = mysqli_query($conn, "SELECT * FROM `students`");

            if (mysqli_num_rows($display_data) > 0) {
                while ($row = mysqli_fetch_assoc($display_data)) {
                    ?>
                    <tr>
                        <td><?php echo $row['StudentName'] ?></td>
                        <td><?php echo $row['RollNumber'] ?></td>
                        <td><?php echo $row['Department'] ?></td> 
                        <td><?php echo $row['Year'] ?></td>
                        <td>
                            <div>
                                <a href="deletestudents.php?delete=<?php echo $row['id'] ?>" class="btn2-edit">Delete</a>
                                <!-- <a href="edit.php?edit=<?php echo $row['id'] ?>" class="btn1">Edit</a> -->
                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn2-edit">Edit</a>
                                
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='14'>No Students found</td></tr>";
            }
            ?>
        </tbody>
    </table>
                </div>
        
    </div>
    </div>
    </div>

    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(sectionId).style.display = 'block';
        }

        function toggleDropdown(dropdownId) {
            var dropdown = document.getElementById(dropdownId);
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
        
    </script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>


  
