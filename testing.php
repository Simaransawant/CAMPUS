<?php 
session_start();
$for_admin_session = $_SESSION['admin'];
if($for_admin_session == true)
{}
else
{
    header('Location:admin.php');
}
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        restorePageState();
    });

    function loadContent(contentPath) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
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

        // Close all dropdowns
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].style.display = 'none';
        }

        // Toggle the selected dropdown
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
        var url = window.location.href;

        if (storedContent && storedContent === url) {
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

<script>
        function toogeldivs(showId, hideId, hideId1) {
          var showDiv = document.getElementById(showId);
          var hideDiv = document.getElementById(hideId);
          var hideDiv1 = document.getElementById(hideId1);
          showDiv.classList.remove('d-none');
          hideDiv.classList.add('d-none');
          hideDiv1.classList.add('d-none')
        }
</script>

<script>
    function showInterviewForm(jobId) {
        // Show the interview form based on the jobId
        document.getElementById('interview_form_' + jobId).style.display = 'block';
    }
</script>
<!-- <script>
function showInterviewForm(jobId) {
    // Your code to show the modal here
    // You can use JavaScript to toggle the display property of the modal element
}
</script> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="456.css"> -->
    <style>
           .navbar {
      background: linear-gradient(135deg, #005050, #74bdbd);
    }
    .nav-link {
  color: #fff;
  text-decoration: none;
  position: relative;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-image: url(images/students-college-campus-Shutterstock-21.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    /* height: 100%;
    width: 100%;
    position: fixed; */
}
        body{
            overflow-y: hidden;
        }
        .dropdown-content {
            background-color: #796EA8;
        }
        .job-form-container {
            max-height: 600px;
            overflow-y: auto;
            padding: 20px;
        }
        .FormTitle {
            color: #161A30;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #161A30;
        }

        .form-control {
            border-color: #161A30;
        }

        .btn-primary {
            background-color: #161A30;
            border-color: #161A30;
        }

        .btn-primary:hover {
            background-color: #0b0e17;
            border-color: #0b0e17;
        }

        #admin-panel {
        display: flex;
        height: 100vh;
        }
        #sidebar {
        width: 200px; /* Fixed width for the sidebar */
        background-color:#21213c;
        color: white;
        padding: 20px;
        overflow-y:auto; /* Make the sidebar scrollable if needed */
        }
        #content {
        flex-grow: 1;
        padding: 20px;
        overflow-y: auto; 
        height: calc(100vh - 56px);
        }
        .dropdown-content {
        display: none;
        border-radius: 2px;
        }
        .dropdown-content a {
        display: block;
        padding-left: 20px;
        margin-left: 10px;
        color: white;
        }
        .dropdown-content {
        display: none;
        /* background-color: #A6A9C8; */
        }
        
        #sidebar a{
        color: white;
        display: block;
        text-decoration: none;
        margin-bottom: 5px;
        padding: 5px; 
        }
        .dropdown{
        margin-bottom: 10px;
        }
        .c_border{
            border-radius: 20px;
        }
        /* #sidebar{
             background: black;
             color: white;
             opacity: 80%;
        } */
        .btn-block {
            background-color: #008080;
            transition: all 0.3s ease;
            color: white;
            width: 100%;
        }
        .btn-block:hover {
            background-color: #005050;
      color: #fff;
        }

    </style>
    </head>
        
<body>
    <nav class="navbar navbar-expand-lg navbar-dark   ">
        <div class="container-fluid">
            <a style="color: #fff;" class="navbar-brand" href="">Admin Panel</a>
            <a style="color: #fff;" class="navbar-brand text-end   " href="logout_admin.php">Logout</a>
        </div>
    </nav>
     <!-- navbar end -->

    <div id="admin-panel" style="height: 100%;" >
        <div id="sidebar" style="width: 200px; " class=""> 

            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('dashboard-dropdown')" data-dropdown-id="dashboard-dropdown">Dashboard</a>
                <div id="dashboard-dropdown" class="dropdown-content ">
                    <a href="#" onclick="showSection('Applications-content')">Applications</a>
                    <a href="#" onclick="showSection('Placement-Statistics-content')">Placement Statistics</a>
                </div>
            </div>
            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('Jobs-dropdown')" data-dropdown-id="Jobs-dropdown">Jobs</a>

                <div id="Jobs-dropdown" class="dropdown-content text-bg-danger">
                    <a href="#" onclick="showSection('Jobs-List-content')">Job List</a>
                    <a href="#" onclick="showSection('add-job-content')">New Jobs</a>
                </div>
            </div>
            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('Students-dropdown')" data-dropdown-id="Students-dropdown">Students</a>
                <div id="Students-dropdown" class="dropdown-content text-bg-danger  ">
                    <a href="#" onclick="showSection('manage-Students-content')">Manage Students</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" onclick="showSection('send-notifications-content')">Notification</a>
            </div>
            <div class="dropdown">
                <a class=" p-1 " href="#" onclick="toggleDropdown('Support-dropdown')" data-dropdown-id="Support-dropdown">Support</a>
                <div id="Support-dropdown" class="dropdown-content text-bg-danger  ">
                    <a href="#" onclick="showSection('Feedback-content')">Feedback</a>
                </div>
            </div>
            <a class=" p-1 " href="logout_admin.php" >Logout</a>
        </div>

        <!-- sidebar end -->

        <div id="content" class="p-0" >
             <!-- main div -->

            <div class="Dashboard  mt-5"  >
            <div id="Applications-content" class="content-section m-0 p-0 bg-light w-100  " >                            

<div class="container" >

<div class="container">
    <div class="d-flex align-items-center flex-grow-1  ">
        <div class="">
            <h2 class="mb-3 pt-3">Job Applications</h2>
        </div>
        <div class="ms-auto ">
            <ul class="nav">
                <li class="nav-item m-1  " onclick="toogeldivs('pending' ,'accepted','rejected')"><a class="nav-link text-dark btn btn-warning" href="#">Pending</a></li>
                <li class="nav-item m-1  "onclick="toogeldivs('accepted','pending' ,'rejected')"><a class="nav-link text-dark btn btn-success" href="#">Accepted</a></li>
                <li class="nav-item m-1  "onclick="toogeldivs('rejected','pending' ,'accepted')"><a class="nav-link text-dark btn btn-danger" href="#">Rejected</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="p-0 m-0 bg-light w-auto  " id="pending">

        <table class="   table table-bordered table-striped   m-auto mt-1  " >
            <thead style="background-color: #008080;">
                <tr class="text-center   ">  
                    <th>Company Name</th>
                    <th>Job Category</th>
                    <th>Full Name</th>
                    <!-- <th>Email</th> -->
                    <th>Phone Number</th>
                    <th>Enrollment No</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Resume</th>
                </tr>
            </thead>
            <tbody >
                <?php
                            include 'connections.php';
                            $sql = "SELECT * FROM `applied_jobs` WHERE `status`='pending'";
                            $result = $conn->query($sql);
                            ?>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    
                        <td class="text-center "><?php echo $row['comp']; ?></td>
                        <td class="text-center "><?php echo $row['job_cat']; ?></td>
                        <td class="text-center "><?php echo $row['f_name']; ?></td>
                        <!-- <td class="text-center "><?php echo $row['s_email']; ?></td> -->
                        <td class="text-center "><?php echo $row['s_PhoneNumber']; ?></td>
                        <td class="text-center "><?php echo $row['s_enroll']; ?></td>
                        <td class="text-center "><?php echo $row['s_deg']; ?></td>
                        <td class="text-center "><?php echo $row['status']; ?></td>
                        <td class="text-center bg-light">
                       
    

                        <div >
                            <form  method="post" action="update_status.php" class="bg-transparent ">
                                <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
                                <input type="hidden" name="s_username" value="<?php echo $row['s_username']; ?>">
                                <div class="d-flex ">
                                <button type="submit" name="status" value="Accepted" class="btn btn-success m-1  "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
</svg></button>
                                <button type="submit" name="status" value="Rejected" class="btn btn-danger m-1 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg></button>
<button type="submit" name="delete" value="delete" class="btn btn-primary  m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></button>
</form>

</div>

                        </td>

                        <td class="text-center bg-light">
                        <form method="post" action="download_cv1.php">
                       <input type="hidden" name="id" value="<?php echo $row['s_username']; ?>">
                       
                       <!-- <a href="download_cv1.php?id=<?php echo $row['s_username']; ?>">download</a> -->
                        <button type="submit" name="download" class="btn btn-primary m-1 download-btn"download>Download</button> 
                        </form>
                        </td>
                        
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <p>No applied jobs found.</p>
    <?php endif; ?>
    <?php
$conn->close();
?>
            </tbody>
        </table>



</div>
                            
        

        <div class="p-0 m-0 d-none " id="accepted">

        <table class=" table table-bordered table-striped   m-auto mt-1  "  >
            <thead style="background-color: #008080;">
                <tr class="text-center   ">  
                    <th>Company Name</th>
                    <th>Job Category</th>
                    <th>Full Name</th>
                    <!-- <th>Email</th> -->
                    <th>Phone Number</th>
                    <th>Enrollment No</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
                <?php
                            include 'connections.php';
                            $sql = "SELECT * FROM applied_jobs WHERE status='Accepted'";
                            $result = $conn->query($sql);
                            ?>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    
                        <td class="text-center "><?php echo $row['comp']; ?></td>
                        <td class="text-center "><?php echo $row['job_cat']; ?></td>
                        <td class="text-center "><?php echo $row['f_name']; ?></td>
                        <!-- <td class="text-center "><?php echo $row['s_email']; ?></td> -->
                        <td class="text-center "><?php echo $row['s_PhoneNumber']; ?></td>
                        <td class="text-center "><?php echo $row['s_enroll']; ?></td>
                        <td class="text-center "><?php echo $row['s_deg']; ?></td>
                        <td class="text-center "><?php echo $row['status']; ?></td>
                        <td class="text-center ">
                            <form method="post" action="update_status.php" class="bg-transparent ">
                                <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
                                <input type="hidden" name="s_username" value="<?php echo $row['s_username']; ?>">
                                <div class="d-flex ">
                                <button type="submit" name="status" value="Accepted" class="btn btn-success m-1  "><i class="bi bi-check2-square"></i></button>
                                <button type="submit" name="status" value="Rejected" class="btn btn-danger m-1 "><i class="bi bi-x-square"></i></button>
                                <button type="submit" name="delete" value="delete" class="btn btn-primary  m-1"><i class="bi bi-trash3-fill"></i></button>

                                <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary m-1 " data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="bi bi-calendar-day"></i>
</button> -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['job_id']; ?>">
                <i class="bi bi-calendar-day"></i>
            </button>
            </div>
                            </form>

<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $row['job_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel_<?php echo $row['job_id']; ?>" aria-hidden="true">  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel_<?php echo $row['job_id']; ?>">Schedule Interview for <?php echo $row['f_name']; ?> with <?php echo $row['comp']; ?></h5>        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form action="process_interview.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="sname" value="<?php echo $row['s_username']; ?>">
            <div class="form-group">
                   <label for="interview_date">Interview Date</label>
                   <input type="date" class="form-control" id="interview_date" name="interview_date" required>
               </div>
               <div class="form-group">
                   <label for="interview_time">Interview Time</label>
                   <input type="time" class="form-control" id="interview_time" name="interview_time" required>
               </div>
               <div class="form-group">
                   <label for="interviewer_name">Interviewer Name</label>
                   <input type="text" class="form-control" id="interviewer_name" name="interviewer_name" required>
               </div>
               <button type="submit" class="btn btn-primary">Schedule Interview</button>
        </form> 

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

<!-- modal close -->





                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <p>No applied jobs found.</p>
    <?php endif; ?>
    <?php
$conn->close();
?>
            </tbody>
        </table>


        </div>


<!-- Interview Schedule Form Popup -->






        <div class="p-0 m-0 d-none  " id="rejected">
        <table class="  table table-bordered table-striped   m-auto mt-1 " >
            <thead style="background-color: #008080;">
                <tr class="text-center   ">  
                    <th>Company Name</th>
                    <th>Job Category</th>
                    <th>Full Name</th>
                    <!-- <th>Email</th> -->
                    <th>Phone Number</th>
                    <th>Enrollment No</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
                <?php
                            include 'connections.php';
                            $sql = "SELECT * FROM `applied_jobs` WHERE `status`='Rejected'";
                            $result = $conn->query($sql);
                            ?>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    
                        <td class="text-center "><?php echo $row['comp']; ?></td>
                        <td class="text-center "><?php echo $row['job_cat']; ?></td>
                        <td class="text-center "><?php echo $row['f_name']; ?></td>
                        <!-- <td class="text-center "><?php echo $row['s_email']; ?></td> -->
                        <td class="text-center "><?php echo $row['s_PhoneNumber']; ?></td>
                        <td class="text-center "><?php echo $row['s_enroll']; ?></td>
                        <td class="text-center "><?php echo $row['s_deg']; ?></td>
                        <td class="text-center "><?php echo $row['status']; ?></td>
                        <td class="text-center  ">
                            <form method="post" action="update_status.php" class="bg-transparent ">
                                <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
                                <input type="hidden" name="s_username" value="<?php echo $row['s_username']; ?>">
                                <div class="d-flex ">
                                <button type="submit" name="status" value="Accepted" class="btn btn-success m-1  "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
</svg></button>
                                <button type="submit" name="status" value="Rejected" class="btn btn-danger m-1 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg></button>
<button type="submit" name="delete" value="delete" class="btn btn-primary  m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></button>
</div>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                    <p>No applied jobs found.</p>
    <?php endif; ?>
    <?php
$conn->close();
?>
            </tbody>
        </table>
        </div>

                </div>
                </div>

                <div id="Placement-Statistics-content" class="content-section  mx-5" style="margin-top: 30px; ">
                
                    <?php
                    include 'statistics.php';
                    ?>
                    <!-- Content for Placement Statistics goes here -->
                    <div class="row mt-0  mb-0 p-0 "  >
                        <div class="card m-2  " style="width: 18rem ; margin-bottom: 10px;  ">
                            <div class="d-flex justify-content-center  ">
                                <img src="images/studentp.png" class="card-img-top " alt="..." style="width: 200px; height: 200px; ">
                            </div>
                            <div class="card-body m-2" style="background-color: #161A30; border-radius: 10px; ">
                                <h5 class="card-title" style="color: white;">Total Students</h5>
                                <p class="card-text text-white  " id="totalStudents"><?php echo  $total_students; ?></p>

                            </div>
                        </div>

                        <div class="card m-2   " style="width: 18rem;">
                            <div class="d-flex justify-content-center  ">
                                <img src="images/csssss.jpg" class="card-img-top " alt="..." style="width: 200px; height: 200px; ">
                            </div>
                            <div class="card-body m-2  " style="background-color: #161A30; border-radius: 10px; ">
                                <h5 class="card-title" style="color: white;">Total Companies</h5>
                                <p class="card-text text-white  " id="totalCompanies"><?php echo  $total_jobs; ?></p>

                            </div>
                        </div>
                        <div class="card m-2  " style="width: 18rem;">
                            <div class="d-flex justify-content-center  ">
                                <img src="images/application-form-icon.jpg" class="card-img-top " alt="..." style="width: 200px; height: 200px; ">
                            </div>
                            <div class="card-body m-2" style="background-color: #161A30; border-radius: 10px; ">
                                <h5 class="card-title" style="color: white;">Total Applications</h5>
                                <p class="card-text text-white " id="totalApplications"><?php echo  $total_applications; ?></p>

                            </div>
                        </div>
                        <div class="card m-2  " style="width: 18rem;">
                            <div class="d-flex justify-content-center  ">
                                <img src="images/inter2.jpeg" class="card-img-top " alt="..." style="width: 200px; height: 200px; ">
                            </div>
                            <div class="card-body m-2" style="background-color: #161A30; border-radius: 10px; ">
                                <h5 class="card-title" style="color: white;">Total Interviews</h5>
                                <p class="card-text text-white " id="totalApplications"><?php echo  $total_interviews; ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="jobs">

                    <div id="add-job-content" class="content-section">
                    <div class="container mt-5 ">
                        <div class="form-control shadow-lg w-50 mx-auto c_border" style="background-color:#D3D9E9 ;">
        <form class="form" action="add_job.php" method="post">
        <h2 class="FormTitle text-center">Add Job</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="companyName">Company Name:</label>
                        <input type="text" id="companyName" name="companyName" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jobCategory">Job Category:</label>
                        <select id="jobCategory" name="jobCategory" class="form-control" required>
                            <option value="Security-Analyst">Security Analyst</option>
                            <option value="Java-Developer">Java Developer</option>
                            <option value="Web-Developer">Web Developer</option>
                            <option value="Graphic-Designer">Graphic Designer</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="noOfVacancy">No. of Vacancy:</label>
                        <input type="number" id="noOfVacancy" name="noOfVacancy" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SelectExperience">Select Experience:</label>
                        <select id="SelectExperience" name="SelectExperience" class="form-control" required>
                            <option value="1-yr">1 yr</option>
                            <option value="2-yr">2 yr</option>
                            <option value="3-yr">3 yr</option>
                            <option value="4-yr">4 yr</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postedDate">Posted Date:</label>
                        <input type="date" id="postedDate" name="postedDate" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastDateToApply">Last Date To Apply:</label>
                        <input type="date" id="lastDateToApply" name="lastDateToApply" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SalaryFrom">Salary From:</label>
                        <input type="text" id="SalaryFrom" placeholder="Enter salary range from-to" name="SalaryFrom" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Location">Location:</label>
                        <select id="Location" name="Location" class="form-control" required>
                            <option value="On-site">On-site</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary btn-block w-75 mt-4 " type="submit" name="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>
                        </div>

<div class="joblist1 p-0 m-0 " style="border-radius: 5px; " >
    <div id="Jobs-List-content" class="content-section m-2 mt-5 " style="background-color: #D3D9E9; border-radius: 6px;" >
    <div class="container ">
    <div class="d-flex align-items-center flex-grow-1 ">
        <div class="">
            <h2 class="mb-3 pt-3">Job Applications</h2>
        </div>
        <div class="ms-auto ">
            <!-- <ul class="nav"> -->
            <!-- <a class="nav-item m-1"><a class="nav-link text-white  btn btn-danger" href="#add-job-content"><i class="bi bi-plus-lg"></i >  Add New Jobs</a></a>  -->
            <button type="button" class="text-white  btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-lg"></i > 
            Add New Jobs
</button> 
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  ">
    <div class="modal-content ">
      <div class="modal-header ">
        <div class="container" >
        <h1 class="modal-title fs-3" id="staticBackdropLabel"style="text-align:center;" >Add Job</h1>
        
        </div>
      </div>
      <div class="modal-body">
      <div class="form-control border-0  container-fluid " >
        <form class="form" action="add_job.php" method="post">
   
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="companyName">Company Name:</label>
                        <input type="text" id="companyName" name="companyName" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jobCategory">Job Category:</label>
                        <select id="jobCategory" name="jobCategory" class="form-control" required>
                            <option value="Security-Analyst">Security Analyst</option>
                            <option value="Java-Developer">Java Developer</option>
                            <option value="Web-Developer">Web Developer</option>
                            <option value="Graphic-Designer">Graphic Designer</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="noOfVacancy">No. of Vacancy:</label>
                        <input type="number" id="noOfVacancy" name="noOfVacancy" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SelectExperience">Select Experience:</label>
                        <select id="SelectExperience" name="SelectExperience" class="form-control" required>
                            <option value="1-yr">1 yr</option>
                            <option value="2-yr">2 yr</option>
                            <option value="3-yr">3 yr</option>
                            <option value="4-yr">4 yr</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postedDate">Posted Date:</label>
                        <input type="date" id="postedDate" name="postedDate" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastDateToApply">Last Date To Apply:</label>
                        <input type="date" id="lastDateToApply" name="lastDateToApply" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SalaryFrom">Salary From:</label>
                        <input type="text" id="SalaryFrom" placeholder="Enter salary range from-to" name="SalaryFrom" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Location">Location:</label>
                        <select id="Location" name="Location" class="form-control" required>
                            <option value="On-site">On-site</option>
                            <option value="Remote">Remote</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary btn-block w-75 mt-4 " type="submit" name="submit">Submit</button>
            </div>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
        <div class="table-responsive"style="border-radius: 7px; "  >
            <table class="table table-bordered table-striped" style="border-radius: 7px; " >
                <thead>
                    <tr class="text-black " style="background-color: #008080;">
                        <th>Company Name</th>
                        <!-- <th style="background-color: #161A30;" class="text-white" >Position</th> -->
                        <th>Job Category</th>
                        <!-- <th style="background-color: #161A30;" class="text-white" >Job Type</th> -->
                        <th>Posted Date</th>
                        <th>Last Date To Apply</th>
                        <!-- <th style="background-color: #161A30;" class="text-white" >Close Date</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
include 'connections.php';

$sql_display = "SELECT * FROM `jobs`";
$result_display = mysqli_query($conn, $sql_display);

// $sql = "SELECT * FROM notifications where id = (SELECT MAX(id) from notifications)";
// $result = $conn->query($sql);
?>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_display)) {
                        echo "<tr>";
                        echo "<td>" . $row['companyName'] . "</td>";
                        // echo "<td>" . $row['position'] . "</td>";
                        echo "<td>" . $row['jobCategory'] . "</td>";
                        // echo "<td>" . $row['jobType'] . "</td>";
                        echo "<td>" . $row['postedDate'] . "</td>";
                        echo "<td>" . $row['lastDateToApply'] . "</td>";
                        // echo "<td>" . $row['CloseDate'] . "</td>";
                        echo "<td class='' >";
                        echo "<div class='d-flex justify-content-center '>";
                        echo "<a href='deletejob.php?delete=" . $row['id'] ." ' class='btn btn-primary   btn-sm' ><i class='fas fa-trash'></i></a>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
                    </div>
                

<div class="students m-5">
    <div id="manage-Students-content" class="content-section p-0  "style="background-color: #D3D9E9 ">
        <div class="container mt-2">
            <h2 class="text-center mb-2">Student Details</h2>
            <div class="table-responsive" >
                <table class="table table-bordered border-dark table-striped" >
                    <thead class="thead-dark">
                        <tr class="text-black " style="background-color: #008080;">
                            <th class=" text-center">Full Name</th>
                            <th class=" text-center">User Name</th>
                            <th class=" text-center  ">Email</th>
                            <th class=" text-center">Phone Number</th>
                            <!-- <th clwhite text-center">Date of Birth</th> -->
                            <th class=" text-center">Enrolment No</th>
                            <th class=" text-center">Year Level</th>
                            <th class=" text-center">Degree Program</th>
                            <th class=" text-center">Gender</th>
                            <th class=" text-center">Action</th> <!-- New column for delete button -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connections.php';

                        $sql = "SELECT * FROM student";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['FullName']}</td> " ;
                                echo "<td>{$row['UserName']}</td>";
                                echo "<td>{$row['Studentemail']}</td>";
                                echo "<td>{$row['PhoneNumber']}</td>";
                                // echo "<td>{$row['DateOfBirth']}</td>";
                                echo "<td>{$row['EnrolmentNo']}</td>";
                                echo "<td>{$row['yearLevel']}</td>";
                                echo "<td>{$row['degreeProgram']}</td>";
                                echo "<td>{$row['Gender']}</td>";
                                echo "<td><a href='delete.php?id={$row['id']}' class='btn btn-dark  btn-sm'>Delete</a></td> "; // Delete button with link to delete.php
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found.</td></tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                <div class="communication">
                    <div id="send-notifications-content" class="content-section p-0 ">
                        
                <?php
                include "connections.php";
                ?>
                        <!-- Content for Send Notifications goes here -->
                        <div class="container form-control shadow-lg w-50 mx-auto c_border mt-5"style="background-color:#D3D9E9 ;">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-container mt-1 ">
                                        <form action="send_notifications.php" method="post" style="margin-bottom: 10px;">
                                            <h2 class="FormTitle text-center mt-2 ">Notification</h2>
                                            <div class="form-group ">
                                                <label for="title">Notification Title:</label>
                                                <input type="text" id="title" name="title" class="form-control form-control-sm" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">Notification Date:</label>
                                                <input type="date" id="date" name="date" class="form-control form-control-sm" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="time">Notification Time:</label>
                                                <input type="time" id="time" name="time" class="form-control form-control-sm" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="content1">Notification Content:</label>
                                                <textarea id="content1" name="content" rows="2" class="form-control form-control-sm" required></textarea>
                                            </div>
                                            <div class="d-flex justify-content-center ">
                                                <button type="submit" name="submit" class="btn  btn-block w-75  mt-3 " >Send Notification</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                

                <div class="settings">
                    <div id="Account-Settings-content" class="content-section">
                        <!-- Content for Manage Announcement goes here -->
                        <!-- <form class="form h-auto" action="#" method="post">
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
                        </form> -->

                    </div>
                </div>

                <div class="support">
                    <div id="Feedback-content" class="content-section">
                        <div class="container">
                            <div class="row justify-content-center mt-5 ">
                                <div class="col-md-8 mt-2 ">
                                    <div class="card " style="width: 100%;">
                                        <div class="card-header  text-center " style="background-color:#161A30; color: white;">
                                            Feedback
                                        </div>
                                        <div class="card-body " style="max-height: 400px; overflow-y: auto; ">
                                            <?php
                                            // feedback_display.php

                                            // Database connection parameters
                                            include 'connections.php';

                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            // Retrieve feedback from the database
                                            $sql = "SELECT * FROM feedback";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <div class="card mb-3">
                                                        <div class="card-body border border-2 " style="background-color:#D3D9E9 ;">
                                                            <p class="card-text"><strong><i class="fas fa-user"></i>&nbsp;Name:</strong> <?php echo $row["name"]; ?></p>
                                                            <p class="card-text"><strong><i class="fas fa-envelope"></i>&nbsp; Email:</strong> <?php echo $row["email"]; ?></p>
                                                            <p class="card-text"><strong><i class="fas fa-comment"></i>&nbsp;Message:</strong> <?php echo $row["message"]; ?></p>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="alert alert-info" role="alert">
                                                    No feedback found.
                                                </div>
                                            <?php
                                            }

                                            // Close connection
                                            $conn->close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>



<!-- <div id="manage-announcement-content" class="content-section">
                    Content for Manage Announcement goes here
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

                </div> -->



                <!-- interview schedule  -->




                
                                <!-- <button class="btn btn-primary" onclick="showInterviewForm('<?php echo $row['job_id']; ?>')"><i class="bi bi-calendar-day"></i></button> -->

                                <!-- <div id="interview_form_<?php echo $row['job_id']; ?>" style="display: none;">
                                    <h3>Schedule Interview for <?php echo $row['f_name']; ?></h3>
                                    <form action="process_interview.php" method="POST">
                                        <input type="hidden" name="student_id" value="<?php echo $row['job_id']; ?>">
                                        <div class="form-group">
                                            <label for="interview_date">Interview Date</label>
                                            <input type="date" class="form-control" id="interview_date" name="interview_date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="interview_time">Interview Time</label>
                                            <input type="time" class="form-control" id="interview_time" name="interview_time" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="interviewer_name">Interviewer Name</label>
                                            <input type="text" class="form-control" id="interviewer_name" name="interviewer_name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Schedule Interview</button>
                                    </form>
                                </div> -->

                                <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const scheduleBtns = document.querySelectorAll(".interview-schedule-btn");
        const popup = document.querySelector(".interview-schedule-popup");
        const studentIdInput = document.getElementById("interview-student-id");

        scheduleBtns.forEach(btn => {
            btn.addEventListener("click", function() {
                const jobId = this.getAttribute("data-job-id");
                studentIdInput.value = jobId;
                popup.style.display = "block";
            });
        });
    });
</script> -->
