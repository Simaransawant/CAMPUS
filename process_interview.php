<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
//     if (!empty($_POST['interview_date']) && !empty($_POST['interview_time']) && !empty($_POST['interviewer_name'])) {

//         $id= $_POST['id'];
//         $sname= $_POST['sname'];
//         $interview_date = $_POST['interview_date'];
//         $interview_time = $_POST['interview_time'];
//         $interviewer_name = $_POST['interviewer_name'];

//         include 'connections.php';

        
//      $sql = "   UPDATE `applied_jobs` SET `interview_date`='$interview_date',`interview_time`='$interview_time',
//         `interviewer_name`='[value-14]' WHERE `id`='$id' AND `s_username`='$sname' ";
//         $result=mysqli_query($conn , $sql);
      
       
// if ($stmt->execute()) {
         
//             echo "Interview scheduled successfully.";
        
//             header("Location:testing.php");
//             exit();
//         } else {
        
//             echo "Error: " . $stmt->error;
//         }

     
//         $stmt->close();
//         $conn->close();
//     } else {
     
//         echo "All fields are required.";
//     }
// }
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (!empty($_POST['interview_date']) && !empty($_POST['interview_time']) && !empty($_POST['interviewer_name'])) {

        $id = $_POST['id'];
        $sname = $_POST['sname'];
        $interview_date = $_POST['interview_date'];
        $interview_time = $_POST['interview_time'];
        $interviewer_name = $_POST['interviewer_name'];
        $int='YES';

        include 'connections.php';

      
        $sql = "UPDATE applied_jobs 
                SET interview_date='$interview_date', interview_time='$interview_time', interviewer_name='$interviewer_name',yes='$int' 
                WHERE id='$id' AND s_username='$sname'";
        $result = mysqli_query($conn, $sql);
      
        if ($result) {
            echo "Interview scheduled successfully.";
            header("Location: testing.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "All fields are required.";
    }
}
?>

