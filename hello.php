<?php 
session_start();
echo "hello";

if(isset($_POST['submit'])) {
    $usr = $_POST['username']; 
    $pass = $_POST['password'];
    $cpass = $_POST['c_password'];  
    echo "hello";
    
    include "connections.php"; 
    
    // Prepare and execute the query using prepared statement
    $query = "SELECT * FROM admin WHERE username = ?"; 
    $stmt = $conn->prepare($query); 
    $stmt->bind_param("s", $usr); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 

    if($result->num_rows == 0) {
        
        $insertQuery = "INSERT INTO admin (username, password, confirm_password) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        
        // Bind parameters and execute the statement
        $insertStmt->bind_param("sss", $usr, $pass, $cpass);
        $insertStmt->execute();
        
        $_SESSION['username'] = $usr; 
        header("Location: admin.php"); 
        exit; 
    } else {
        $error = "Username already exists"; 
        header("Location: admin.php"); 
        exit;
    }

    $stmt->close(); 
    $conn->close(); 
}
echo "hello 2";
?>