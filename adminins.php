

<?php
include "connection.php";
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1);

echo "hello 1"; // Debugging statement

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    echo "hello 3"; // Debugging statement

    if (empty($username) || empty($password) || empty($confirm_password)) {
        die("All fields are required.");
    }

    if (strlen($password) < 6) {
        die("Password should be at least 6 characters long.");
    }

    if ($password !== $confirm_password) {
        die("Password and Confirm Password do not match.");
    }

    $sql = "INSERT INTO admin (username, Password, confirm_password) 
            VALUES ('$username', '$password', '$confirm_password')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('location: index.html');
        exit();
    } else {
        echo 'heeeeeee'; // Debugging statement
        die("Data not inserted:" . mysqli_error($connection));
    }
}
?>
