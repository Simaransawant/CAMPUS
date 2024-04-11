<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "addjob";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];

            // Retrieve data for the selected ID
            $result1 = $conn->query("SELECT * FROM jobs WHERE id = $id");

            if ($result1->num_rows == 1) {
                $row = $result1->fetch_assoc();
                // Output or use the data retrieved here
                echo "Data retrieved successfully.";
            } else {
                echo "Job not found.";
                exit();
            }
        } else {
            echo "Invalid request.";
            exit();
        }
        
        //     while($row3 = mysqli_fetch_assoc($result2)){
        //         echo "Done";
        //     }

        //     if ($result1->num_rows == 1) {
        //         $row1 = $result1->fetch_assoc();
        //     } else {
        //         echo "Job not found.";
        //         exit();
        //     }
        // } else {
        //     echo "Invalid request.";
        //     exit();
        
        ?>



<?php
$conn->close();
?>
