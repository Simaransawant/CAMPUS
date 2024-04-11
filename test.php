<?php
include "conection.php" ;

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
<script>

    document.addEventListener("DOMContentLoaded", function () {
        restorePageState();
    });

    function loadContent(contentPath) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
                sessionStorage.setItem('currentContent', contentPath);
            }
        };
        xhttp.open("GET", contentPath, true);
        xhttp.send();
    }

    function showSection(sectionId) {
        var sections = document.getElementsByClassName('content-section');
        for (var i = 0; i < sections.length; i++) {
            sections[i].style.display = 'none';
        }
        document.getElementById(sectionId).style.display = 'block';
        sessionStorage.setItem('currentSection', sectionId);
    }

    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        var dropdowns = document.getElementsByClassName('dropdown-content');
        
        for (var i = 0; i < dropdowns.length; i++) {
            if (dropdowns[i] !== dropdown) {
                dropdowns[i].style.display = 'none';
            }
        }

        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        sessionStorage.setItem('openDropdown', dropdown.style.display);

        if (dropdown.style.display === 'block') {
            sessionStorage.setItem('openDropdownId', dropdownId);
        } else {
            sessionStorage.removeItem('openDropdownId');
        }
    }

    function restorePageState() {
        var storedContent = sessionStorage.getItem('currentContent');
        var storedSection = sessionStorage.getItem('currentSection');
        var storedDropdown = sessionStorage.getItem('openDropdown');

        if (storedContent) {
            loadContent(storedContent);
        }

        if (storedSection) {
            showSection(storedSection);
        }

        if (storedDropdown) {
            var dropdownId = sessionStorage.getItem('openDropdownId');
            var dropdown = document.getElementById(dropdownId);

            if (dropdown) {
                dropdown.style.display = storedDropdown;
            }
        }
    }
</script>










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
    .dropdown-content{
        background-color: #796EA8;
    }
        

    </style>
</head>
<body>
    <nav style="background-color:#161A30;" class="navbar navbar-expand-lg custom-bg m-0 bg-black  ">
        <div  class="container-fluid">
        <a style="color: #fff;" class="navbar-brand"  href="index.html">Admin Panel</a>
        <a style="color: #fff;" class="navbar-brand text-end   "  href="index.html">Logout</a>
      
            
        </div>
    </nav>
    <div id="admin-panel">
        <div id="sidebar" style="width: 200px; background-color:#31304D;" >
            <!-- <h2 class="mt-2 mb-4 text-danger  ">Admin Panel</h2> -->
            
            <div class="dropdown">
                <!-- <a href="#" onclick="toggleDropdown('dashboard-dropdown')">Dashboard</a> -->
                <a class=" p-1 " href="#" onclick="toggleDropdown('dashboard-dropdown')" data-dropdown-id="dashboard-dropdown">Dashboard</a>
                <div id="dashboard-dropdown" class="dropdown-content " >
                    <a  href="#" onclick="showSection('Jobs-content')" >Jobs</a>
                    <a href="#" onclick="showSection('Applications-content')">Applications</a>
                    <a href="#" onclick="showSection('Placement-Statistics-content')">Placement Statistics</a>
                    <a href="#" onclick="showSection('Companies-content')">Companies</a>
                </div>
            </div>
            <div class="dropdown">
                <!-- <a href="#" onclick="toggleDropdown('Jobs-dropdown')">Jobs</a> -->
                <a class=" p-1 " href="#" onclick="toggleDropdown('Jobs-dropdown')" data-dropdown-id="Jobs-dropdown">Jobs</a>

                <div id="Jobs-dropdown" class="dropdown-content text-bg-danger">
                    <a href="#" onclick="showSection('Jobs-List-content')">Job List</a>
                    <a href="#" onclick="showSection('add-job-content')">New Jobs</a>
                </div>
            </div>
            
            <!-- <a href="#" onclick="showSection('students-content')">Students</a> -->
            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('Students-dropdown')"data-dropdown-id="Students-dropdown">Students</a>
                <div id="Students-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Add-Students-content')">Add Students</a>
                    <a href="#" onclick="showSection('manage-Students-content')">Manage Students</a>
                </div>
            </div>
            <div class="dropdown">
                    <a  href="#" onclick="showSection('send-notifications-content')">Send Notifications</a>   
            </div>
            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('Settings-dropdown')"data-dropdown-id="Settings-dropdown">Settings</a>
                <div id="Settings-dropdown" class="dropdown-content text-bg-danger  ">
                <a  href="#" onclick="showSection('Change-Passwords-content')">Change Passwords</a>
                   
                </div>
            </div>
  
            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('Support-dropdown')"data-dropdown-id="Support-dropdown">Support</a>
                <div id="Support-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="#" onclick="showSection('Feedback-content')">Feedback</a>
                    <a  href="#" onclick="showSection('Help-Center-content')">Help Center</a>

                    
                </div>
            </div>
            <a class=" p-1 " href="#" onclick="showSection('Logout-content')">Logout</a>
            
            <!-- <a href="#" onclick="showSection('add-job-content')">Add Job</a> -->
            <!-- Add more sidebar links as needed -->
        </div>

        <!-- navbar end -->

        <div id="content">
           
            <div class="dashboard">
            <div id="dropdown-content" class="content-section">
                <!-- Content for Dashboard goes here -->
             
            </div>
        </div>
            
        <div class="jobs">
            <div id="add-job-content" class="content-section  ">
                
                
                <form class="form  h-auto " action="#" method="post">
                    <h1 class="FormTitle">New Job</h1>
                    <label for="companyName">Company Name:</label>
                    <input type="text" id="companyName" name="companyName" required>
            
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" required>
            
            
                    <label for="jobCategory">Job Category:</label>
                    <select id="jobCategory" name="jobCategory" required>
                        <option value="Security-Analyst">Security Analyst</option>
                        <option value="Java-Developer">Java Developer</option>
                        <option value="Web-Developer">Web Developer</option>
                        <option value="Graphic-Designer">Graphic Designer</option>
                    </select>
            
                    <label for="jobType">Job Type:</label>
                    <select id="jobType" name="jobType" required>
                        <option value="full-time">Full-Time</option>
                        <option value="part-time">Part-Time</option>
                        <option value="contract">Contract</option>
                        <option value="temporary">Temporary</option>
                    </select>

                    <label for="No.ofVacancy">No. of Vacancy:</label>
                    <input type="number" id="No.ofVacancy" name="noOfVacancy" required>

                    <label for="SelectExperience">Select Experience:</label>
                    <select id="SelectExperience" name="SelectExperience" required>
                        <option value="1-yr">1 yr</option>
                        <option value="2-yr">2 yr</option>
                        <option value="3-yr">3 yr</option>
                        <option value="4-yr">4 yr</option>
                    </select>
                     
                    <label for="postedDate">Posted Date:</label>
                    <input type="date" id="postedDate" name="postedDate" required>
            
                    <label for="lastDateToApply">Last Date To Apply:</label>
                    <input type="date" id="lastDateToApply" name="lastDateToApply" required>

                    <label for="CloseDate">Close Date:</label>
                    <input type="date" id="CloseDate" name="CloseDate" required>

                    <label for="SelectGender">Select Gender::</label>
                    <select id="SelectGender" name="SelectGender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
            
                    <label for="SalaryFrom">Salary From:</label>
                    <input type="number" id="SalaryFrom" name="SalaryFrom" required>

                    <label for="SalaryTo">Salary To:</label>
                    <input type="number" id="SalaryTo" name="SalaryTo" required>

                    <label for="Location">Location:</label>
                    <select id="Location" name="Location" required>
                        <option value="On-site">On-site</option>
                        <option value="Remote">Remote</option>
                    </select>
                 <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
            <div class="justify-content-center d-flex align-content-center ">
                    <button class="w-75" style="background-color: #31304D;" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            
            </div>

            <div class="joblist1">
            <div id="Jobs-List-content" class="content-section m-2" style="background-color: white" >
            <h1 class="text-center p-1 mt-2  " id=job-label>Job List</h1>
    <table class="table-responsive ">
        <thead>
        
            <th style="background-color: #A6A9C8;" class="border-2 ">Company Name</th>
            <th style="background-color: #A6A9C8;" class="border-2 ">Position</th>
            <th style="background-color: #A6A9C8;"class="border-2 ">Job Category</th>
            <th style="background-color: #A6A9C8;"class="border-2 ">Job Type</th>
            <th style="background-color:#A6A9C8;"class="border-2 ">Posted Date</th>
            <th style="background-color: #A6A9C8;"class="border-2 ">Last Date To Apply</th>
            <th style="background-color: #A6A9C8;"class="border-2 ">Close Date</th>
            <th style="background-color: #A6A9C8;"class="border-2 ">Action</th>
           
        </thead>
        <tbody>
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
            ?>
        </tbody>
    </table>
    </div>
    </div>
            </div>

            <div class="students">
                <div id="Add-Students-content" class="content-section">
                    <!-- Content for Students goes here -->
                    <form action="#" method="post">
                        <h4 class="FormTitle">Add Students</h4>
                        <div>
                            <label for="studentName">Student Name:</label>
                            <input type="text" name="studentName" id="studentName" required>
                        </div>
            
                        <div>
                            <label for="studentRoll">Roll Number:</label>
                            <input type="text" name="studentRoll" id="studentRoll" required>
                        </div>
            
                        <div>
                            <label for="studentDepartment">Department:</label>
                            <input type="text" name="studentDepartment" id="studentDepartment" required>
                        </div>
            
                        <div>
                            <label for="studentYear">Year:</label>
                            <input type="text" name="studentYear" id="studentYear" required>
                        </div>
                        <div class="justify-content-center d-flex align-content-center ">
                        <button class="w-75 " style="background-color: #31304D;" type="submit" name="submitxxx" >Add Student</button>
                      </div>
                    </form>
                </div>
               
                
    <!--  Display operation -->
    <?php 
    $conn = mysqli_connect("localhost", "root", "", "campus");
    $sql_display1 = "SELECT * FROM addstudents";
    $result_display1 = mysqli_query($conn, $sql_display1);
    ?>
               

                <div id="manage-Students-content" class="content-section  container-fluid w-100 h-auto bg-white p-3  " style="width: 1000px ; height: auto; ">
                    <!-- Content for Students goes here -->
                    <div class="manage  container-fluid  ">
                    
                    <table id='table' class="w-100  table-responsive " >
                    <h2 class="text-center mb-3   " >Manage Students</h2>
                    <thead>
                            <tr>
                                <th class="border-2 " >Student Name</th>
                                <th class="border-2 " >Student Roll</th>
                                <th class="border-2 " >Student Department</th>
                                <th class="border-2 " >Student Year</th>
                                <th class="border-2 " >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (mysqli_num_rows($result_display1) > 0) {
                            while ($row = mysqli_fetch_assoc($result_display1)) {
                                ?>
                            <tr>
                                <td class="border-2 "><?php echo $row['studentName']?></td>
                                <td class="border-2 "><?php echo $row['studentRoll'] ?></td>
                                <td class="border-2 "><?php echo $row['studentDepartment'] ?></td>
                                <td class="border-2 "><?php echo $row['studentYear']?></td>
                                <td class="border-2 "><?php echo $row['id']?></td>
                                
                                <!-- <td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td> -->
                                <td class=" border-2   " ><a href="editjob.php?edit=<?php echo $row['id'] ?> " class="btn btn-success m-1   ">Edit</a>
                                 <a href="deletestudent.php?delete1=<?php echo $row['id'] ?>" class="btn btn-danger m-1">Delete</a></td>
                              
                        </tr>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                    </table> 
                </div>
            </div>
            <?php
    mysqli_close($conn);
    ?>
    </div>

            <div class="communication">
                <div id="send-notifications-content" class="content-section">
                    <!-- Content for Send Notifications goes here -->
                    <form class="form h-auto" action="#" method="post">
                        <h2 class="FormTitle">Send Notification</h2>
                        <label for="notificationContent">Notification Content:</label>
                        <textarea id="notificationContent" name="notificationContent" placeholder="Enter notification content" rows="4" required></textarea>
            
                        <label for="targetAudience">Target Audience:</label>
                        <select id="targetAudience" name="targetAudience">
                            <option value="students">Students</option>
                        </select>
                        <div class="justify-content-center d-flex align-content-center ">
                        <button class="w-75 " style="background-color: #31304D;" name="SendNotifications" type="submit">Send Notifications</button>
                        </div>
                    </form>
                </div>
                <?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "campus"; 

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if notification content is provided
    if (isset($_POST['notificationContent']) && !empty($_POST['notificationContent'])) {
        // Escape user inputs to prevent SQL injection
        $notificationContent = mysqli_real_escape_string($conn1, $_POST['notificationContent']);
        $targetAudience = isset($_POST['targetAudience']) ? mysqli_real_escape_string($conn1, $_POST['targetAudience']) : '';

        // Insert data into the database
        $sql2 = "INSERT INTO notifications (notificationContent, targetAudience) VALUES ('$notificationContent', '$targetAudience')";

        if ($conn1->query($sql2) === TRUE) {
            
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn1->error;
        }
    } else {
        echo "Notification content is required.";
    }
}


?>


                </div>
    
                <div id="manage-announcement-content" class="content-section">
                    <!-- Content for Manage Announcement goes here -->
                    <form class="form h-auto" action="#" method="post">
                        <h3 class="FormTitle">Add New Announcement</h3>
                        <div>
                            <label for="announcementTitle">Title:</label>
                            <input type="text" id="announcementTitle" required>
                        </div>
            
                        <div>
                            <label for="announcementContent">Content:</label>
                            <textarea id="announcementContent" rows="4" required></textarea>
                        </div>
                        <div class="justify-content-center d-flex align-content-center ">
                        <button class="w-75 " style="background-color: #31304D;" type="submit">Add Announcement</button>
                        </div>
                    </form>
                    
                </div>
                <div class="settings">
                    <div id="Account-Settings-content" class="content-section">
                        <!-- Content for Manage Announcement goes here -->
                        <form class="form h-auto" action="#" method="post">
                            <h1 class="FormTitle">Account Settings</h1>
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" placeholder="Enter new username" required>
                
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="Enter new email" required>
                
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" placeholder="Enter new password" required>
                            <div class="justify-content-center d-flex align-content-center ">
                            <button class="w-75 " style="background-color: #31304D;" type="submit">Save Account Settings</button>
                            </div>
                        </form>
                    
                    </div>
                </div>
                <div class="Security">
                    <div id="Change-Passwords-content" class="content-section">
                        <!-- Content for Manage Announcement goes here -->
                            <form class="form h-auto" id="change-password-form" onsubmit="changePassword(event)">
                                <h1 class="FormTitle">Change Password</h1>
                                <label for="currentPassword">Current Password:</label>
                                <input type="password" id="currentPassword" name="currentPassword" required>
                    
                                <label for="newPassword">New Password:</label>
                                <input type="password" id="newPassword" name="newPassword" required>
                    
                                <label for="confirmNewPassword">Confirm New Password:</label>
                                <input type="password" id="confirmNewPassword" name="confirmNewPassword" required>
                                <div class="justify-content-center d-flex align-content-center ">
                                <button class="w-75 " style="background-color: #31304D;" type="submit">Change Password</button>
                                </div>
                            </form>
                    
                            <div id="error-message" class="error-message"></div>
                        
                        
                    </div>
                </div>
                <div class="support">
                    <div id="Feedback-content" class="content-section">
                       
                        <form class="form h-auto" action="#" method="post">
                            <h2 class="FormTitle">Feedback Form</h2>
                            <label for="name">Your Name:</label>
                            <input type="text" id="name" name="name" required>
                
                            <label for="email">Your Email:</label>
                            <input type="email" id="email" name="email" required>
                
                            <label for="message">Feedback Message:</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                            <div class="justify-content-center d-flex align-content-center ">
                            <button class="w-75 " style="background-color: #31304D;" type="submit">Submit Feedback</button>
                            </div>
                        </form>
                       
                        
                    </div>
                </div>
            </div>

            
            
            </div>
        </div>

         
        </div>
        </div>
    </div>

    
    <!-- <script src="js/bootstrap.min.js"></script> -->

</body>
</html>


<!-- adding student php logic  -->

<?php  
               error_reporting(E_ALL);
               ini_set('display_errors', 1);
               
               $conn = mysqli_connect("localhost", "root", "", "campus");
               
               if (!$conn) {
                   die("Connection failed: " . mysqli_connect_error());
               }
 
               if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitxxx"])) {
                //    echo "Form submitted<br>"; // Debug statement
               
                   // Retrieve form data
                   $studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
                   $studentRoll = mysqli_real_escape_string($conn, $_POST['studentRoll']);
                   $studentDepartment = mysqli_real_escape_string($conn, $_POST['studentDepartment']);
                   $studentYear = mysqli_real_escape_string($conn, $_POST['studentYear']);
               
                   // Insert query
                   $sql11 = "INSERT INTO addstudents (studentName, studentRoll, studentDepartment, studentYear)
                        VALUES ('$studentName', '$studentRoll', '$studentDepartment', '$studentYear')";
               
                   if (mysqli_query($conn, $sql11)) {
                       echo " <script>
                       window.alert(New record created successfully.);
                       </script>";    
                   } else {
                       echo "Error: " . $sql11 . "<br>" . mysqli_error($conn);
                   }
               }
               mysqli_close($conn);
               ?>

  
