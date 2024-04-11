<?php 
session_start();
// echo "var studentProfileState = document.getElementById('StudentProfile-content').innerHTML;
// sessionStorage.setItem('studentProfileState', studentProfileState);";
// echo "<script>restorePageState();</script>";
unset($_SESSION['username']);
header('Location:slogin.php');
exit(); 
?>
