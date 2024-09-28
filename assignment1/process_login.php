<?php
// Start session to keep track of user login
session_start();

$message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // The hardcoded password
    $correct_password = "12345";

    // Get password from form
    $input_password = $_POST["password"];

    // Check if the password is correct
    if ($input_password == $correct_password) {
        // Set a session variable to indicate the user is logged in
        $_SESSION["loggedin"] = true;

        // Redirect to index.php
        header("Location: index.php");
        exit;
    } else {
        // Set the error message
        $message = array(
            "title" => "Login Failure",
            "description" => "Try again."
        );
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login Failure</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                height: 100vh;
                margin: 0;
            }

            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100%;
            }

            .error {
                text-align: center;
                color: black;
            }

            form {
                max-width: 300px;
                margin: 0 auto;
            }
        </style>

    </head>
    <body>

        <div class="container">

            <?php if (!empty($message)): ?>
                <div class="error">
                    <h2><?php echo $message["title"]; ?></h2>
                    <p><?php echo $message["description"]; ?></p>
                    <a href="login.php">Login</a>
                </div>

            <?php endif; ?>
        </div>

    </body>
</html>


<!-- <?php
// Start session to keep track of user login
session_start();

$message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // The hardcoded password
    $correct_password = "12345";

    // Get password from form
    $input_password = $_POST["password"];

    // Check if the password is correct
    if ($input_password == $correct_password) {
        // Set a session variable to indicate the user is logged in
        $_SESSION["loggedin"] = true;

        // Redirect to homepage or dashboard
        header("Location: index.php");
        exit;
    } else {
        // Set the error message
        $message = array(
            "title" => "Login Failure",
            "description" => "Try again."
        );
    }
}
?>


<!-- http://localhost/assignment1/process_login.php -->