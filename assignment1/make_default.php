<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the student arrays script to get access to the $students array
include('student_arrays.php');

// Initialize a variable to determine if a valid student was found
$validStudent = false;

// Check if the student ID is set in the query parameter
if (isset($_GET['number'])) {
    $studentNumber = intval($_GET['number']);
    
    // Check if the student exists in the array
    if (array_key_exists($studentNumber - 1, $students)) {
        // Find the image name based on the student ID
        $studentDetails = $students[$studentNumber - 1]; // Adjust index as necessary
        $imageName = $studentDetails['img'] ?? 'default.png'; // Provide a default image if not found
        $validStudent = true;

        // Set a cookie that expires in 30 days
        setcookie('default_student_image', $imageName, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}

// Redirect only if a valid student number was not provided
if (!$validStudent) {
    // If no student ID is provided or an invalid ID is provided, redirect to a default page or display an error message
    header('Location: error_page.php'); // You might want to create this error_page.php
    exit();
}
?>

<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include the student arrays script to get access to the $students array
include('student_arrays.php');

// Initialize a variable to determine if a valid student was found
$validStudent = false;

// Check if the student ID is set in the query parameter
if (isset($_GET['number'])) {
    $studentNumber = intval($_GET['number']);
    
    // Check if the student exists in the array
    if (array_key_exists($studentNumber - 1, $students)) {
        // Find the image name based on the student ID
        $studentDetails = $students[$studentNumber - 1]; // Adjust index as necessary
        $imageName = $studentDetails['img'] ?? 'default.png'; // Provide a default image if not found
        $validStudent = true;

        // Set a cookie that expires in 30 days
        setcookie('default_student_image', $imageName, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
}

// Redirect only if a valid student number was not provided
if (!$validStudent) {
    // If no student ID is provided or an invalid ID is provided, redirect to a default page or display an error message
    header('Location: error_page.php'); // You might want to create this error_page.php
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Default Avatar</title>
</head>
<body>
    <?php if ($validStudent): ?>
        <h1>Default</h1>
        <p>Default saved<p>
        <img src="avatars/<?= $imageName ?>" alt="Default Student Avatar">

        <!-- Footer links for navigation -->
        <div class= "footer">
        <?php include 'footer-links.php'; ?>

    <?php else: ?>
        <p>Student number not found.</p>
    <?php endif; ?>
    
</body>
</html>
