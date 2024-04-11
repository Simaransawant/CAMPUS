<?php
// feedback_insert.php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campus"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are filled
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        // Sanitize user input to prevent SQL injection and other security vulnerabilities
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        // Validate email format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Insert data into the database
            $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

            if ($conn->query($sql) === TRUE) {
                // echo "Feedback submitted successfully!";
                header("Location:studentpanelpage.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Invalid email format
            echo "Invalid email format.";
        }
    } else {
        // One or more form fields are empty
        echo "Please fill in all the fields.";
    }
}

// Close connection
$conn->close();
?>
