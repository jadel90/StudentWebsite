<?php
// Start the session
session_start();

// Unset the session variable for user login
unset($_SESSION['loggedin']);

// Destroy the session
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        /* Styling */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }
        
    </style>
</head>
<body>

<div class="body">
    <h2>Logout</h2>
    <p>You are logged out.</p>
    <p><a href="login.php">Click here to login</a></p>
</div>

</body>
</html>

<!-- http://localhost/assignment1/logout.php -->