<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <style>
            /* Styling */
            .error {
                color: red;
            }
            form {
                max-width: 300px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <form action="process_login.php" method="post">
            <h2>Login</h2>
            <p>You must enter a passcode to access this site.</p>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <label>Passcode:</label>
            <input type="password" name="password" placeholder="Password"><br> 

            <button type="submit">Login</button>
        
        </form>
    </body>
</html>

<!-- http://localhost/assignment1/login.php -->