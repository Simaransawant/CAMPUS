<?php

include "connections.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Prepare and bind SQL statement
        $sql = "INSERT INTO admin (username, `password`, `confirm-password`) VALUES ('$username', '$password', '$confirmPassword')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            // echo "Registration successful.";
            header("Location: admin.php"); 
            exit; 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>