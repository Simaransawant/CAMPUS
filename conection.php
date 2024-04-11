<?php 
$connection=mysqli_connect('localhost','root','','campus');
if($connection)
{
    echo "";
}
else{
    echo "failed";
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
