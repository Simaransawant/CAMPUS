<?php 
include "header.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="manage">
    <h2>Manage Students</h2>
                    <table id='table1'>
                    <thead>
                            <tr>
                                <th>StudentName</th>
                                <th>RollNumber</th>
                                <th>Department</th>
                                <th>Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "managestudent";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // $conn1 = new mysqli ('localhost','root' , '' , 'addjob');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $display_data = mysqli_query($conn, "SELECT * FROM `students`");

            if (mysqli_num_rows($display_data) > 0) {
                while ($row = mysqli_fetch_assoc($display_data)) {
                    ?>
                    <tr>
                        <td><?php echo $row['StudentName'] ?></td>
                        <td><?php echo $row['RollNumber'] ?></td>
                        <td><?php echo $row['Department'] ?></td> 
                        <td><?php echo $row['Year'] ?></td>
                        <td>
                            <div>
                                <a href="deletestudents.php?delete=<?php echo $row['id'] ?>" class="btn2-edit">Delete</a>
                                <!-- <a href="edit.php?edit=<?php echo $row['id'] ?>" class="btn1">Edit</a> -->
                                <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn2-edit">Edit</a>
                                
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='14'>No Students found</td></tr>";
            }
            ?>
        </tbody>
    </table>
                </div>
            
            
            
    
</body>
</html>
