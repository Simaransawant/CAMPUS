<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Panel</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
   
    .student-panel {
      margin-top: 0px;
      background-color: cadetblue;
    }
  
    .student-info {
      text-align: center;
      margin-top: 20px;
      
    }
    
    .sidebar {
      background-color: #384756;
      height: calc(100vh - 40px); 
      border-right: 1px solid #dee2e6;
    }
    .container {
      margin-top: 10px;
      

    }    
    
    .job-card p {
      margin-bottom: 10px;
    }
    
    
    .apply-button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
      padding: 10px;
    }
    
    .apply-button:hover {
      background-color: #0056b3;
    }
    .header{
        text-align: center;
        margin-bottom: 20px; /* Adjust the margin as needed */
        margin-top: 30px;
    }
    .job-card h6 {
      margin-bottom: 5px;
      padding: 10px;
      
    }
    
   
  </style>
</head>
<body>
  
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <!-- Centered text -->
      <span class="navbar-text text-center">Student dashboard</span>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar position-relative p-1">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action">
            Notification
          </a>
          <a href="application.html" class="list-group-item list-group-item-action" onclick="openPage('application.html')">Jobs</a>
          <a href="resume.html" class="list-group-item list-group-item-action"onclick="openpage('resume.html')">Resume and Portfolio</a>
          <a href="interviewshed.html" class="list-group-item list-group-item-action" onclick="openPage('interviewshed.html')">Interview Schedule</a>
          <a href="#" class="list-group-item list-group-item-action">Support and Help</a>
          <a href="appliedjobs.html" class="list-group-item list-group-item-action" onclick="openPage('appliedjobs.html')">Job Applied</a>
        </div>
      </div>

       <!-- Student Profile -->
       <div class="col-md-10 container-fluid row  row-cols-md-3 ">

                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "addjob";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                         
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $display_data = mysqli_query($conn, "SELECT * FROM `jobs`");
                            if (mysqli_num_rows($display_data) > 0) {
                                while ($row = mysqli_fetch_assoc($display_data)) {
                                    ?>
                                   
  <div class="card col-4 m-1 p-0 " >
  <div class="card-body">
    <h5 class="card-title">Company name : <?php echo $row['companyName'] ?></h5>
    <h6 class="card-subtitle p-1  ">Position : <?php echo $row['position'] ?></h6>
    <h6 class="card-subtitle p-1  ">Job Category : <?php echo $row['jobCategory'] ?></h6>
    <h6 class="card-subtitle p-1  ">Job Type : <?php echo $row['jobType'] ?></h6>
    <h6 class="card-subtitle p-1  ">Posted Date : <?php echo $row['postedDate'] ?></h6>
    <h6 class="card-subtitle p-1  ">LastDate To Apply: <?php echo $row['lastDateToApply'] ?></h6>
    <h6 class="card-subtitle p-1  ">Salary From - Salary To : <?php echo $row['SalaryFrom'] ?> to <?php echo $row['SalaryTo'] ?></h6>

    <div class="">
   <a href="deletejob.php?delete=<?php echo $row['id'] ?>" class="btn1-edit btn btn-primary m-1 col-10">Apply Now</a>
   

                                                
    

</div>
</div>
</div>

<?php 
    }
    }
?>
          
          </div>
          
                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>