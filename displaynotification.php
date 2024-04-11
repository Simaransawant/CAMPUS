<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notifications</title>
</head>
<body>
    <h2>Notifications</h2>
    <div class="notification-container"> -->
    <?php
    // Include database connection code here
    // $servername = "localhost";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "your_database_name";

    // Create connection
    // $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Fetch the latest notification from the database
    // $sql = "SELECT * FROM notifications ORDER BY date_added DESC LIMIT 1";
    // $sql = "SELECT * FROM notifications ORDER BY id DESC LIMIT 1";
    // $sql = "SELECT * FROM addnotifications";
    // $sql = "SELECT * FROM notifications where id = (SELECT MAX(id) from notifications)";
    // $result = $conn->query($sql);


    // if ($result->num_rows > 0) {
    //     // Output data of the latest notification
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<div class='notification-item'>";
    //         echo "<h3>" . $row["title"] . "</h3>";
    //         echo "<p>" . $row["content"] . "</p>";
    //         echo "<p>Date Added: " . $row["date_added"] . "</p>";
    //         echo "</div>";
    //     }
    // } else {
    //     echo "No notifications found.";
    // }

    // $conn->close();
    ?>
</div>

</body>
</html>
