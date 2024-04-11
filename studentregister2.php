<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sr1.css">
    <style>
        /* Your custom styles */
        
body {
    margin: 0;
    padding: 0;
    /* background-image: url('images/img.jpg'); */
    background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
    url(images/writing-utensils.jpg)!important;
    background-size: cover;
    background-attachment: fixed;
}
.contaniner{
    justify-content: start;
}
    </style>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark"style="background-color:#161A30;">
        
            <a class="navbar-brand" href="index.html">Campus Placement</a>
            <a class="navbar-brand ml-auto" href="index.html">Go Back</a>
    
    </nav>
<div  >
    <div style="background-color: #D3D9E9;" class="container mt-3" >
        <h4 class="text-center">STUDENT REGISTRATION FORM</h4>
        <form action="student_reg.php" method="POST">
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
                        <input type="email" class="form-control" id="StudentEmail" name="Studentemail" placeholder="example: myname@example.com">
                    </div>
                    <div class="form-group">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" placeholder="Enter Date of Birth" autocomplete="off">
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
                        <input type="text" class="form-control" id="EnrolmentNo" name="EnrolmentNo" placeholder="Enrolment No">
                    </div>
                    <div class="form-group">
                        <label for="YearLevel">Year Level</label>
                        <select class="form-control" id="YearLevel" name="yearLevel">
                            <option disabled selected>Please Select</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="DegreeProgram">Degree Program</label>
                        <select class="form-control" id="DegreeProgram" name="degreeProgram">
                            <option disabled selected>Please Select</option>
                            <option value="Bscit">Bscit</option>
                            <option value="MscIT">MscIT</option>
                            <option value="MscIT">BCA</option>
                            <option value="MscIT">MCA</option>
                            <option value="BTech">MscIT</option>
                            <option value="MTech">MscIT</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Gender</label>
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
                <button type="submit" name="submit" class="btn w-75  mr-2" style="background-color: #161A30;color: #D3D9E9; " >Submit</button>
                
            </div>
        </form>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
