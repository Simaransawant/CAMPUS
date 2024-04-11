<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["title"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $content = $_POST["content"];

    // Perform any necessary validation

    // Example: Insert data into a database (replace with your database connection code)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campus";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO addnotifications (title, date, time, content) VALUES ('$title', '$date', '$time', '$content')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // echo "Notification sent successfully";
        header("Location:testing.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
