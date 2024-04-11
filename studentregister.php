<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(images/writing-utensils.jpg);
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
        }
        h4{
            color: #0b0e17;
        }

        .container {
            background-color: #D3D9E9;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 600PX;
        }
         .navbar{
        background: linear-gradient(135deg, #005050, #74bdbd);
    }
        .navbar-brand {
            color: white;
        }
        

       

        .form-group label {
            font-weight: bold;
            color: #0b0e17;
        }

        /* .btn-primary {
            background-color: #161A30;
            border-color: #161A30;
        }

        .btn-primary:hover {
            background-color: #0b0e17;
            border-color: #0b0e17;
        } */
        .btn-student {
            background-color: #008080;
            transition: all 0.3s ease;
            color: white;
            width: 100%;
        }
        .btn-student:hover {
            background-color: #005050;
      color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html">Campus Placement</a>
        <a class="navbar-brand ml-auto" href="index.html">Go Back</a>
    </nav>

    <div class="container mt-5">
        <h4 class="text-center mb-4 text-black"   >STUDENT REGISTRATION FORM</h4>
        <form action="student_reg.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FullName">Full Name</label>
                        <input type="text" class="form-control" id="FullName" name="FullName" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group">
                        <label for="UserName">User Name</label>
                        <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="StudentEmail">Student Email</label>
                        <input type="email" class="form-control" id="StudentEmail" name="Studentemail" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="ConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label for="EnrolmentNo">Enrolment No</label>
                        <input type="text" class="form-control" id="EnrolmentNo" name="EnrolmentNo" placeholder="Enter Enrolment No">
                    </div>
                    <div class="form-group">
                        <label for="YearLevel">Year Level</label>
                        <select class="form-control" id="YearLevel" name="yearLevel">
                            <option value="" disabled selected>Please Select</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="DegreeProgram">Degree Program</label>
                        <select class="form-control" id="DegreeProgram" name="degreeProgram">
                            <option value="" disabled selected>Please Select</option>
                            <option value="Bscit">Bscit</option>
                            <option value="MscIT">MscIT</option>
                            <option value="BCA">BCA</option>
                            <option value="MCA">MCA</option>
                            <option value="BTech">BTech</option>
                            <option value="MTech">MTech</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group d-flex  ">
                <label >Gender:  </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Gender" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Gender" id="other" value="Other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
       
            <div class="text-center justify-content-center d-flex align-content-center">
                <button type="submit" name="submit" class="btn btn-student w-75  mr-2" >Submit</button>
            </div>
            </div>
           
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
