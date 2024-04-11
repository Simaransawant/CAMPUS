<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
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
</body>
</html>