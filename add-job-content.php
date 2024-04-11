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
                    <a href="Jobs-content.php">Jobs</a>
                    <a href="Applications-content.php" >Applications</a>
                    <a href="Placement-Statistics-content.php" >Placement Statistics</a>
                    <a href="Companies-content.php" >Companies</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Jobs-dropdown')">Jobs</a>
                <div id="Jobs-dropdown" class="dropdown-content text-bg-danger">
                    <a href="Jobs-list-content.php">Job List</a>
                    <a href="add-job-content.php">New Jobs</a>
                </div>
            </div>
            
            <!-- <a href="#" onclick="showSection('students-content')">Students</a> -->
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Students-dropdown')">Students</a>
                <div id="Students-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="Add-Students-content.php">Add Students</a>
                    <a href="manage-Students-content.php">Manage Students</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('communication-dropdown')">Communication</a>
                <div id="communication-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="send-notifications-content.php">Send Notifications</a>
                    <a href="manage-announcement-content.php">Manage Announcement</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Settings-dropdown')">Settings</a>
                <div id="Settings-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="General-Settings-content.php">General Settings</a>
                    <a href="Account-Settings-content.php">Account Settings</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Security-dropdown')">Security</a>
                <div id="Security-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="Change-Passwords-content.php">Change Passwords</a>
                    
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown('Support-dropdown')">Support</a>
                <div id="Support-dropdown" class="dropdown-content text-bg-danger  ">
                    <a  href="Feedback-content.php">Feedback</a>
                    <a  href="Help-Center-content.php">Help Center</a>

                    
                </div>
            </div>
            <a href="logout.php">Logout</a>
            
            <!-- <a href="#" onclick="showSection('add-job-content')">Add Job</a> -->
            <!-- Add more sidebar links as needed -->
        </div>
        <!-- navbar end -->   
            
        <div class="jobs">
            <div id="add-job-content" class="content-section">
                
                
                <form action="#" method="post">
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
                        <option value="Male">On-site</option>
                        <option value="Female">Remote</option>
                    </select>
                 <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
            
                    <button type="submit" name="submit">Submit</button>
                </form>
            
            </div>
            </div>
            </div>


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


  
