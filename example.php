<?php
// Database connection parameters
$servername = "your_database_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch placement statistics from the database
$sql = "SELECT * FROM placement_statistics";
$result = $conn->query($sql);

$statistics = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statistics[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Statistics</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Placement Statistics</h2>

    <?php
    // Display placement statistics
    if (!empty($statistics)) {
        echo '<table>';
        echo '<tr><th>Year</th><th>Placement Percentage</th></tr>';

        foreach ($statistics as $stat) {
            echo '<tr>';
            echo '<td>' . $stat['year'] . '</td>';
            echo '<td>' . $stat['placement_percentage'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No placement statistics available.</p>';
    }
    ?>

</body>
</html>
