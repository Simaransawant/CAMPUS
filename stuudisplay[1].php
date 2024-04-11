



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Panel</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    /* Add your custom styles here */
    /* Student panel styles */
    .student-panel {
      margin-top: 20px;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 10px;
    }
    .student-photo {
      border-radius: 50%;
      width: 160px;
      height: 160px;
      object-fit: cover;
    }
    .student-info {
      text-align: center;
      margin-top: 20px;
    }
    .field-box {
      border: 1px solid #ccc;
      padding: 20px;
      margin-bottom: 10px;
      background-color: #fff;
    }
    label {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    session_start();
    include 'connections.php';


    // Fetch student data from the database
    $query = "SELECT * FROM studentprofile";
    $result = mysqli_query($conn, $query);

    // Loop through the fetched data and display each student's profile
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="row student-panel">
      <div class="col-md-10 offset-md-1 student-info">
                    <img src="upload/<?php echo $row['studentimage']; ?>" alt="Student Photo" class="student-photo">
          <h4 class="mt-2"><?php echo $row['username']; ?></h4>
          <div class="row">
            <div class="col-4">
              <label>First name</label>
              <div class="field-box">
                <?php echo $row['username']; ?>
              </div>
            </div>
            <div class="col-4">
              <label>Father name</label>
              <div class="field-box">
                <?php echo $row['fathername']; ?>
              </div>
            </div>
            <div class="col-4">
              <label>Last name</label>
              <div class="field-box">
                <?php echo $row['lastname']; ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <label>Gmail</label>
              <div class="field-box">
                <?php echo $row['email']; ?>
              </div>
            </div>
            <div class="col-6">
              <label>Contact number</label>
              <div class="field-box">
                <?php echo $row['contactnumber']; ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label>Age</label>
              <div class="field-box">
                <?php echo $row['age']; ?>
              </div>
            </div>
            <div class="col-4">
              <label>10th percentage</label>
              <div class="field-box">
                <?php echo $row['tenthperc']; ?>
              </div>
            </div>
            <div class="col-4">
              <label>12th percentage</label>
              <div class="field-box">
                <?php echo $row['twelthperc']; ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <label>Course name</label>
              <div class="field-box">
                <?php echo $row['coursename']; ?>
              </div>
            </div>
            <div class="col-4">
              <label>Year Level</label>
              <div class="field-box">
                <?php echo $row['yearlevel']; ?>
              </div>
            </div>
            <div class="col-4">
              <label>Last sem percentage</label>
              <div class="field-box">
                <?php echo $row['lastsemperc']; ?>
              </div>
            </div>
            <div class="row mt-3">
            <div class="col">
           
<a href="stuupdate.php?edit=<?php echo $row['id']?>">Edit</a>
            </div>
          </div>
          </div>
        </div>
      </div>
    <?php
    }
    
    ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
