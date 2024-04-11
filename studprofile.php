<?php 
include 'connections.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserName=$_POST["Username"];
    $first_name=$_POST["FullName"];
      $address=$_POST["address"];
    $state=$_POST["state"];
    $country=$_POST["country"];
    $tentperc=$_POST["10perc"];
    $twelperc=$_POST["12perc"];
    $batch=$_POST["batch"];
    $master=$_POST["master"];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// $sql = "INSERT INTO student WHERE UserName='$UserName' (first_name,middle_name,last_name,address,state,country,10perc,12perc,batch,master) 
// VALUES ('$first_name', '$middle_name', '$last_name', ' $address',' $state',' $country',' $tentperc','  $twelperc',' $batch,' $master')";
$sql="UPDATE `student` SET
`FullName`='$first_name',
`address`='$address',
`state`='$state',
`country`='$country',
`10perc`='$tentperc',
`12perc`='$twelperc',
`batch`='$batch',
`master`='$master'
 WHERE `UserName`='$UserName'";
if ($conn->query($sql) === TRUE) {
    // echo "Notification sent successfully";
    header("Location: studentpanelpage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
}
?>
