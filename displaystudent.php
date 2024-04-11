<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Details</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>Enrolment No</th>
                        <th>Year Level</th>
                        <th>Degree Program</th>
                        <th>Gender</th>
                        <th>Action</th> <!-- New column for delete button -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';

                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['FullName']}</td>";
                            echo "<td>{$row['UserName']}</td>";
                            echo "<td>{$row['Studentemail']}</td>";
                            echo "<td>{$row['PhoneNumber']}</td>";
                            echo "<td>{$row['DateofBirth']}</td>";
                            echo "<td>{$row['EnrolmentNo']}</td>";
                            echo "<td>{$row['yearLevel']}</td>";
                            echo "<td>{$row['DegreeProgram']}</td>";
                            echo "<td>{$row['Gender']}</td>";
                            echo "<td><a href='delete.php?id={$row['ID']}' class='btn btn-danger btn-sm'>Delete</a></td>"; // Delete button with link to delete.php
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found.</td></tr>";
                    }
                    mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
