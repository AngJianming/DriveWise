<?php
// Start session
session_start();

// Destroy session
session_destroy();

// Display message and redirect after 1 second
echo "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='refresh' content='1;url=login.php'>
    <title>Logout</title>
</head>
<body style='font-family:\"Times New Roman\", Times, serif; text-align:center; font-size:2em; margin-top:50px;'>
    <h2>Proceeding to log out...</h2>
    <p>You will be redirected to the login page in 1 second.</p>
</body>
</html>";
?>


