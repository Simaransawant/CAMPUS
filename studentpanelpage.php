<?php 
session_start();
$for_session = $_SESSION['username'];
if($for_session == true)
{}
else
{
    header('Location:slogin.php');
}
?>
<?php
include 'connections.php';
$s_data = "SELECT * FROM `student` WHERE `UserName`='$for_session' ";
$s_query = mysqli_query($conn, $s_data);
$s_row = mysqli_fetch_assoc($s_query);
?>


<script>
  
    document.addEventListener("DOMContentLoaded", function() {
        restorePageState();
    });

    // Load content using AJAX
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

   // Show/hide content sections
function showSection(sectionId) {
    var sections = document.getElementsByClassName('content-section');
    for (var i = 0; i < sections.length; i++) {
        if (sections[i].id === sectionId) {
            sections[i].style.display = 'block'; // Show the selected section
        } else {
            sections[i].style.display = 'none'; // Hide other sections
        }
    }
    sessionStorage.setItem('currentSection', sectionId);
}


   

    // Restore page state from session storage
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

        // if (storedDropdown) {
        //     var dropdownId = sessionStorage.getItem('openDropdownId');
        //     var dropdown = document.getElementById(dropdownId);

        //     if (dropdown) {
        //         dropdown.style.display = storedDropdown;
        //     }
        // }
    }

    function logout() {
    
    sessionStorage.clear();
    
   
    window.location.href = "logout_stud.php";
    
    // restorePageState();
  
    return false;
} 
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="student.css">
    <!-- <link rel="stylesheet" href="studentpanel.css"> -->
    <link rel="stylesheet" href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

    <style>

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: #D3D9E9;
        }

        .carousel-control-next,
        .carousel-control-prev {
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 8%;
            height: 12%;
            padding-top: 1.5rem;
            /* margin-left: 5rem; */
            color: black;
            text-align: center;
            /* background: black; */
            border: 0;
            opacity: .5;
            transition: opacity .15s ease;
        }
        .Notification {
            height: 500vh; 
        }
    </style>
    <!-- STUDENT PROFILE CSS -->
    <style>
        .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.labels {
            font-size: 18px; /* Adjust font size as needed */
            font-weight: bold; /* Make labels bold */
            margin-bottom: 5px; /* Add some space between labels */
            display: inline-block; /* Display labels in a block */
            width: 200px; /* Set a fixed width for labels */
        }
        .info {
            font-size: 18px; /* Adjust font size as needed */
            margin-bottom: 5px; /* Add some space between info */
            display: inline-block; /* Display info in a block */
            width: 300px; /* Set a fixed width for info */
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top p-0 ">
    <div class="container">
        <a class="navbar-brand" href="studentpanelpage.php">Dashboard <?php echo $for_session?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#" onclick="toggleDropdown('dashboard-dropdown')">Dashboard</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('StudentProfile-content')">Student Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('Resume-and-Portfolio-content')">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('Jobs-content')">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('Interview-Schedule-content')">Interview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('Job-Applied-content')">Job Applied</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('Notification-content')">Notification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('Feedback-content')">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout_stud.php" onclick="return logout()">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

     <!-- navbar end -->

    <div id="admin-panel" class=""  style="margin-top: calc(2.9%);">
       


                <div id="Jobs-content" class="content-section container  " >
                <?php
                
                if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                
                echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong class=""> '. $_SESSION['message'] . '</strong>   
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                
                unset($_SESSION['message']);
                }
                ?>
                    <!-- Content for jobs goes here -->
                    <!-- <div class="container " > -->
                    <div class="row ">
                        <?php
                        include 'connections.php';
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $display_data = mysqli_query($conn, "SELECT * FROM `jobs`");
                        if (mysqli_num_rows($display_data) > 0) {
                        ?>
                            <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $totalRows = mysqli_num_rows($display_data);
                                    $first = true;
                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($display_data)) {
                                        if ($count % 2 == 0) {
                                            $activeClass = $first ? 'active' : '';
                                    ?>
                                            <div class="carousel-item <?php echo $activeClass; ?>">
                                                <div class="d-flex justify-content-center align-items-center p-4 m-5 ">
                                                <?php
                                            }
                                                ?>
                                                <div class="col-md-6 mb-4" style="margin-right: 10px; margin-left: 10px;">
                                                    <div class="card h-100 w-100" style="background-color: #D3D9E9;">
                                                        <div class="card-body">
                                                            <h4 class="card-title text-center mb-4"><?php echo $row['companyName'] ?></h4>
                                                            <ul class="list-group list-group-flush">
                                                                <!-- <li class="list-group-item"><i class="bi bi-person-fill"></i>&nbsp; <b>Position:</b> <?php echo $row['position'] ?></li> -->
                                                                <li class="list-group-item"><i class="bi bi-person-fill"></i>&nbsp; <b>Category:</b> <?php echo $row['jobCategory'] ?></li>
                                                                <li class="list-group-item"><i class="bi bi-calendar-check-fill"></i>&nbsp; <b> Posted:</b> <?php echo $row['postedDate'] ?></li>
                                                                <li class="list-group-item"><i class="bi bi-calendar-check-fill"></i>&nbsp; <b>Last Date:</b> <?php echo $row['lastDateToApply'] ?></li>
                                                                <li class="list-group-item"><i class="bi bi-currency-rupee"></i>&nbsp; <b>Salary:</b> <?php echo $row['SalaryFrom'] ?> </li>
                                                                <li class="list-group-item">  
                                                                <form class="p-0 m-0 "  action="s_apply.php" method="POST">
                                                                    <input type="hidden" name="job_id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" name="job_companyName" value="<?php echo $row['companyName'] ?>">
                                                                    <input type="hidden" name="job_jobCategory" value="<?php echo $row['jobCategory'] ?>">
                                                                    <input type="hidden" name="s_username"  value="<?php echo $s_row['UserName'] ?>">
                                                                    <input type="hidden" name="s_FullName"  value="<?php echo $s_row['FullName'] ?>">
                                                                    <input type="hidden" name="s_Studentemail"  value="<?php echo $s_row['Studentemail'] ?>">
                                                                    <input type="hidden" name="s_PhoneNumber"  value="<?php echo $s_row['PhoneNumber'] ?>">
                                                                    <input type="hidden" name="s_EnrolmentNo"  value="<?php echo $s_row['EnrolmentNo'] ?>">
                                                                    <input type="hidden" name="s_degreeProgram"  value="<?php echo $s_row['degreeProgram'] ?>">
                                                            
                                                             <button  class="btn btn-primary  d-block mx-auto" style="background-color: #161A30;">
                                                             <i class="fas fa-arrow-circle-right mr-2"></i> Apply Now
                                                             </button>
                                                            </form>
                                                        </li>
                                                            </ul>
                                                          

   
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $count++;
                                                if ($count % 2 == 0 || $count == $totalRows) {
                                                ?>
                                                </div>
                                            </div>
                                    <?php
                                                    $first = false;
                                                }
                                            }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="margin-left: 4rem;">
                                    <span class="carousel-control-prev-icon text-dark" aria-hidden="true" style="background-color: #161A30; border-radius:5px;"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="margin-right: 4rem;">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #161A30; border-radius:5px;"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        <?php
                        } else {
                            echo "No jobs found.";
                        }

                        mysqli_close($conn); // Close database connection
                        ?>
                    </div>
                    </div>
           
            <div class="Student Profile">
                <div id="StudentProfile-content" class="content-section bg-dark    h-100 overflow-hidden  ">
                <div class="row ">
        <div class="col-md-3  border-end border-danger border-5">
       
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
        <div class="p-0 m-0">
    <span>
        <?php
        include 'connections.php';

        // Assuming $p_uname is set somewhere in your code
        $s_uname = "$for_session"; // Replace "example_user" with the actual username

        // Check if an image exists for the user
        $check_query = "SELECT image_data FROM d_image WHERE s_name = ?";
        $stmt_check = $conn->prepare($check_query);
        $stmt_check->bind_param("s", $s_uname);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // If an image exists, display it
            $row = $result_check->fetch_assoc();
            $imageData = $row['image_data'];
            $imageBase64 = base64_encode($imageData);
            echo '<img src="data:image/jpeg;base64,' . $imageBase64 . '" alt="" class="border rounded-circle" style="width: 150px; height: 150px;">';
        } else {
            // If no image exists, display a default image
            echo '<img src="images/stud1.png" alt="" class="border rounded-circle" style="width: 150px; height: 150px;">';
        }

       
        ?>
        <div class="w-100 p-0 m-0">
            <button class="btn btn-sm btn-primary w-50 mb-3" data-bs-toggle="modal" data-bs-target="#d_editimg">EDIT</button>
        </div>
    </span>
</div>
<?php
include "connections.php";

$sql1 = "SELECT * FROM student WHERE UserName='$for_session' ";
$d_data = mysqli_query($conn, $sql1);
if($d_data && mysqli_num_rows($d_data) > 0) {
    $d_row=mysqli_fetch_assoc($d_data);
    // echo "hello " . $d_row['UserName'];   
 } else {
  echo "No results found or query failed.";
}
?>
                <span class="font-weight-bold text-white  m-1 "> <?php echo $d_row['FullName'];?></span>
                <span class=" text-white m-1 mb-3 "><?php echo $d_row['Studentemail'];?></span>
                <span>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Edit Profile
                    </button>
                </span>
            
        </div>
        </div>
        <div class="col-md-5 border-end border-danger border-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right text-white">Profile Settings</h4>
                </div>
                <div class="row mt-2  d-flex  ">
                    <div class="col-md-12"><span class="labels w-auto text-white-50 ">Full Name :</span><span class="info text-white"><?php echo $d_row['FullName'];?></span></div>
                    <!-- <div class="col-md-4"><span class="labels">middle Name :</span><span class="info"><?php echo $d_row['middle_name'];?></span></div>
                    <div class="col-md-4"><span class="labels">Last name :</span><span class="info"><?php echo $d_row['last_name'];?></span></div> -->
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><span class="labels w-auto  text-white-50">DOB :</span><span class="info text-white"><?php echo $d_row['DateOfBirth'];?></span></div>
                    <div class="col-md-6"><span class="labels w-auto text-white-50">Gender :</span><span class="info text-white"><?php echo $d_row['Gender'];?></span></div>
                    <div class="col-md-6"><span class="labels text-white-50">Mobile Number :</span><span class="info text-white"><?php echo $d_row['PhoneNumber'];?></span></div>
                    <div class="col-md-12"><span class="labels text-white-50">Email ID :</span><span class="info text-white"><?php echo $d_row['Studentemail'];?></span></div>
                    <div class="col-md-12"><span class="labels text-white-50">Address :</span><span class="info text-white"><?php echo $d_row['address'];?></span></div>
                    <div class="col-md-6"><span class="labels text-white-50">State :</span><span class="info text-white"><?php echo $d_row['state'];?></span></div>
                    <div class="col-md-6"><span class="labels text-white-50">Country:</span><span class="info text-white"><?php echo $d_row['country'];?></span></div>
                    </div>
              
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience mb-3 "><span><h4> Education Detail </h4> </span></div>
                <div class="col-md-12"><label class="labels text-white-50">10th :</label>    <span class=" text-white-50"> <?php echo $d_row['10perc'] ;echo "%";?> </span></div>
                <div class="col-md-12"><label class="labels text-white-50">12th :</label>    <span class=" text-white-50"> <?php echo $d_row['12perc']; echo "%";?> </span></div>
                <div class="col-md-12"><label class="labels text-white-50">Bachelor :</label><span class=" text-white-50"> <?php echo $d_row['batch'];  echo "%";?> </span></div>
                <div class="col-md-12"><label class="labels text-white-50">Masters :</label> <span class=" text-white-50"> <?php echo $d_row['master']; echo "%";?> </span></div>

        </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-white " id="staticBackdropLabel">Edit Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">

        <div class="row ">
        
        <div class="col-md-6 border-end  border-2">

            <div class="p-2">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                
                <form id="logoutForm" action="studprofile.php" method="post">
                    <input type="hidden" name="Username" value="<?php echo $d_row['UserName'];?>">
    <div class="row mt-2">
        <div class="col-md-12">
            <label for="FullName" class="labels">Full Name :</label>
            <input type="text" id="firstName" name="FullName" class="form-control" value="<?php echo $d_row['FullName'];?>" >
        </div>
        <!-- <div class="col-md-4">
            <label for="middleName" class="labels">Middle Name :</label>
            <input type="text" id="middleName" name="middle_name" class="form-control" value="<?php echo $d_row['middle_name'];?>" >
        </div>
        <div class="col-md-4">
            <label for="lastName" class="labels">Last Name :</label>
            <input type="text" id="lastName" name="last_name" class="form-control" value="<?php echo $d_row['last_name'];?>" >
        </div> -->
    </div>
    
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="dob" class="labels">DOB :</label>
            <input type="text" id="dob" class="form-control" value="<?php echo $d_row['DateOfBirth'];?>" >
        </div>
        <div class="col-md-6">
            <label for="gender" class="labels">Gender :</label>
            <input type="text" id="gender" class="form-control" value="<?php echo $d_row['Gender'];?>" >
        </div>
        <div class="col-md-6">
            <label for="mobileNumber" class="labels">Mobile Number :</label>
            <input type="text" id="mobileNumber" class="form-control" value="<?php echo $d_row['PhoneNumber'];?>" >
        </div>
        <div class="col-md-12">
            <label for="email" class="labels">Email ID :</label>
            <input type="email" id="email" class="form-control" value="<?php echo $d_row['Studentemail'];?>" >
        </div>
        <div class="col-md-12">
            <label for="address" class="labels">Address :</label>
            <input type="text" id="address" name="address" class="form-control" value="<?php echo $d_row['address'];?>" >
        </div>
        <div class="col-md-6">
            <label for="state" class="labels">State :</label>
            <input type="text" id="state" name="state" class="form-control" value="<?php echo $d_row['state'];?>" >
        </div>
        <div class="col-md-6">
            <label for="country" class="labels">Country :</label>
            <input type="text" id="country" name="country" class="form-control" value="<?php echo $d_row['country'];?>" >
        </div>
    </div>
    <!-- <button type="submit" class="btn btn-primary mt-3">Save</button>
</form> -->

               
            </div>
        </div>

        <div class="col-md-6    ">
            <div class="p-2">
                <div class="d-flex justify-content-between align-items-center mb-3  experience"><h4> Education Detail </h4> 
            </div>

                <!-- <form id="logoutForm" action="" method="post"> -->
    
    <div class="row ">
        <div class="col-md-12">
            <label for="10th" class="labels">10th</label>
            <input type="text" id="10th" name="10perc" class="form-control" value="<?php echo $d_row['10perc'];?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label for="12th" class="labels">12th</label>
            <input type="text" id="12th" name="12perc" class="form-control" value="<?php echo $d_row['12perc'];?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label for="bachelor" class="labels">Bachelor</label>
            <input type="text" id="bachelor" name="batch" class="form-control" value="<?php echo $d_row['batch'];?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label for="masters" class="labels">Masters</label>
            <input type="text" id="masters" name="master" class="form-control" value="<?php echo $d_row['master'];?>">
        </div>
    </div>
    
    <!-- Logout button -->
    <div class="justify-content-center w-100 row ">
    <button type="submit" class="btn btn-primary mt-3 w-50 p-3 fs-4 ">Update profile</button></div>
</form>


        </div>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


    <div class="modal fade  " id="d_editimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="upload.php" method="post" class=" form-control " enctype="multipart/form-data">
        <div class="mb-3 mt-2  ">
        <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <input type="hidden" name="d_id" value="<?php echo $for_session?>">
         <div class="d-flex ">
          <input type="submit" name="upload" value="Upload" class="btn btn-outline-success  form-control m-2 ">

          
          </div>
        </form>
        <form action="upload.php" method="post">
              <input type="hidden" name="d_id" value="<?php echo $for_session?>">
              <input type="submit" name="Delete" value="Delete" class="btn btn-outline-danger   form-control m-2 ">
          </form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
           





            <div class="Resume and Portfolio">
                <div id="Resume-and-Portfolio-content" class="content-section">
                   
               

<div class="container">
    
    <div class="row">
    
    <div class=" bg-light   shadow-lg d-flex mt-2 justify-content-between ">
      <div class="align-content-center "> 
        <h4 class="m-2 ">View Report</h4> 
      </div>
      <div class=" align-content-center">
      <a type="icon"  class="border-0" data-bs-toggle="modal" data-bs-target="#r_edit"> 
        <i class="bi bi-plus-square-fill"></i>
    </a>
    </div>
  </div>
  <div class="container mt-2   ">
  <table class="table table-responsive border-1 table-striped   ">
    <thead class=" ">
        <tr class="bg-danger text-center  ">
            <th class="border-2  ">File Name</th>
            <th class="border-2  ">Upload Date</th>
            <th class="border-2  ">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $rep = "SELECT * FROM report_upload WHERE s_name='$for_session'";
        $query_rep = mysqli_query($conn, $rep);
        while ($row_r = mysqli_fetch_assoc($query_rep)) 
        {
          ?>
            <tr class="bg-light ">
            <td class="border-2   "><?php echo $row_r['file_name']?></td>
            <td class="border-2   "><?php echo $row_r['upload_date'] ?></td>
            <td class="border-2  text-center  "><a href="download_cv.php?id=<?php echo $row_r['id'] ?>" class="btn btn-primary align-self-center ">Download</a></td>
            </tr>
        <?php
         }
        ?>
    </tbody>
</table>
  </div>
</div>




<div class="modal fade  " id="r_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit CV</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="Res_upload.php" method="post" class=" form-control " enctype="multipart/form-data">
        <div class="mb-3 mt-2  ">
        <input class="form-control" type="file" id="formFile" name="res">
        </div>
        <input type="hidden" name="s_id" value="<?php echo $for_session?>">
         <div class="d-flex ">
          <input type="submit" name="resupload" value="Upload" class="btn btn-outline-success  form-control m-2 ">

          
          </div>
        </form>
        <form action="upload.php" method="post">
              <input type="hidden" name="d_id" value="<?php echo $for_session?>">
              <input type="submit" name="Delete" value="Delete" class="btn btn-outline-danger   form-control m-2 ">
          </form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


                </div>
            </div>

            <div class="Interview Schedule">
                <div id="Interview-Schedule-content" class="content-section ">
                    <!-- Content for Interview Schedule goes here -->
                    <div class="container">
                    <?php

include 'connections.php';

// Check if the student is logged in
if(isset($_SESSION['username'])) {
    $sname = $_SESSION['username'];
    
    // Prepare the SQL query to retrieve the interview schedules of the logged-in student
    $sql = "SELECT f_name, interview_date, interview_time, interviewer_name 
            FROM applied_jobs 
            WHERE s_username = '$sname' AND yes = 'YES'";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="d-flex flex-wrap justify-content-center m-5 pt-5">
        <?php
        while($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Student Name: <?php echo $row["f_name"]; ?></h5>
                        <p class="card-text">Interview Date: <?php echo $row["interview_date"]; ?></p>
                        <p class="card-text">Interview Time: <?php echo $row["interview_time"]; ?></p>
                        <p class="card-text">Interviewer Name: <?php echo $row["interviewer_name"]; ?></p>
                    </div>
                </div>
        <?php
        }
        ?>
        </div>
        <?php
    } else {
        echo "<h3 class=' text-center bg-danger p-3 m-2 rounded-2 '>No interview schedules found for the  student.<h1>";
    }

    mysqli_close($conn);
} else {
    // Redirect the user to the login page if not logged in
    // header("Location: login.php");
    exit;
}
?>
</div>




                </div>
            </div>

            <div class="Job Applied">
                <div id="Job-Applied-content" class="content-section">
                  <div class="container" style="margin-top: 70px;" >
                    
                        <table class="table table-responsive table-striped table-bordered text-center  " style="background-color: #D3D9E9;" >
                            <tr class="text-white " style="background-color: #212529;">
                                <th>Company Name</th>
                                <th>Job Category</th>
                                <th>Applied On</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            <?php
include 'connections.php'; 
$s_jobs = "SELECT * FROM `applied_jobs` WHERE `s_username`='$for_session'";
$job_query = mysqli_query($conn, $s_jobs);


if (!$job_query) {
    echo "Error: " . mysqli_error($conn);
} else {
    if ($job_query->num_rows > 0) {
        while ($s_job = $job_query->fetch_assoc()) {
?>
            <tr>
                <td><?php echo $s_job['comp']; ?></td>
                <td><?php echo $s_job['job_cat']; ?></td>
                <td><?php echo $s_job['created']; ?></td>
                <td><?php echo $s_job['status']; ?></td>
                <td>
                    <form action="withdrow.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $s_job['id']; ?>">
                        <input type="hidden" name="withdrow" value="withdrow">
                        <button type="submit" name="withdrow_btn" ><i class="bi bi-eraser-fill"></i></button>

                    </form>
                </td>
            </tr>
<?php
        }
    } else {
        echo "No jobs found.";
    }
}
?>

                        </table>

                  

                  </div>  


                </div>
            </div>
            <!-- <div class="Notification d-flex justify-content-center align-items-center"> -->
    <div id="Notification-content" class="content-section ">
        <!-- Content for Notification goes here -->
        <div class="container">
            <div class="row justify-content-center m-5  ">
                <div class="col-md-8 m-5 " >
                    <div class="card" style="margin-top: 20px;">
                        <div class="card-header text-center" style="background-color:#161A30; color: white;">
                             Notification
                        </div>
                        <?php
                            // Include the database connection file
                            include 'connections.php';

                            // Connect to the database
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Retrieve the latest notification from the database
                            $sql = "SELECT * FROM addnotifications ORDER BY date DESC, time DESC LIMIT 10";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                        <div class="card-body m-1 " style="background-color: #D3D9E9;">
                            
                                    <div class="notification-item ">
                                        <div class="row ">
                                        <h3 class="card-title col-11   "><?php echo $row['title']; ?></h3> 
                                        <div class="d-flex col-1   " >
                                        <form action="" class="">
                                        <a class=" " type="submit" name="notification_btn" ><i class="bi bi-trash-fill"></i></a>
                                        </form>
                                        </div>
                                        </div>
                                        <p class="card-text"><?php echo $row['content']; ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['date'] . ' ' . $row['time']; ?></small></p>
                                        
                                    </div>
                                 
                        </div>
                        <?php
                                }
                            } else {
                                echo "No notifications found.";
                            }

                            // Close connection
                            $conn->close();
                            ?>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>


<div class="Feedback">
    <div id="Feedback-content" class="content-section">
        <!-- Content for Job Applied goes here -->
        <!-- <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-6" >
                    <form class="form h-auto" action="feedback_insert.php" method="post" style="background-color: #D3D9E9;">
                        <h2 class="FormTitle">Feedback Form</h2>
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Your Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Feedback Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <div class="justify-content-center d-flex align-content-center ">
                            <button class="w-75 btn " style="background-color: #161A30; color: #D3D9E9; "  type="submit">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <div class="container position-absolute top-50 start-50 translate-middle ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="form" action="feedback_insert.php" method="post" style="background-color: #D3D9E9; padding: 20px; border-radius: 10px;">
                <h2 class="FormTitle">Feedback Form</h2>
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Feedback Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                
                <div class="text-center mt-2 ">
                    <button class="btn btn-dark w-50 " type="submit">Submit Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
</div>

            <div class="Logout">
                <div id="" class="content-section">
                    <!-- Content for Logout goes here -->
                    




                </div>
            </div>

    </div>
    
</div>


    <script src="js/bootstrap.min.js"></script>

</body>

</html>





<!-- 
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
</script> -->
<!-- <script>
        // Restore page state on DOM content load
        document.addEventListener("DOMContentLoaded", function() {
            restorePageState();
        });

        // Load content using AJAX
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

        // Show/hide content sections
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(sectionId).style.display = 'block';
            sessionStorage.setItem('currentSection', sectionId);
        }

        // Toggle dropdown menus
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

        // Restore page state from session storage
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
    </script> -->
    <!-- <script>
    // Restore page state on DOM content load
    document.addEventListener("DOMContentLoaded", function() {
        restorePageState();
    });

    // Load content using AJAX
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

    // Show/hide content sections
    function showSection(sectionId) {
        var sections = document.getElementsByClassName('content-section');
        for (var i = 0; i < sections.length; i++) {
            if (sections[i].id !== 'dashboard-dropdown') { // Exclude hiding the dashboard section
                sections[i].style.display = 'none';
            }
        }
        document.getElementById(sectionId).style.display = 'block';
        sessionStorage.setItem('currentSection', sectionId);
    }

    // Toggle dropdown menus
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

    // Restore page state from session storage
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
</script> -->