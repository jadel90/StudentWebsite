<?php
// Start of the PHP script
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

include('student_arrays.php');


// Get the student number from the URL query parameter
$studentNumber = $_GET['number'] ?? null;

// Convert the student number to an integer
$studentNumber = (int)$studentNumber;



// Check if the student number is valid
if ($studentNumber > 0 && $studentNumber <= count($students)) {
    // Adjust the index to match array indices
    $studentIndex = $studentNumber - 1;
    $studentDetails = $students[$studentIndex];
    $imagePath = "avatars/" . $studentDetails["img"];

    echo "<p><h1><strong>Student  $studentNumber</p></strong></h1>";

    // Display a link to make the current student the default image.
    echo "<a href='make_default.php?number={$studentNumber}'>Make Default </a><br /><br />";

    echo "<img src='$imagePath' alt='Student Image'>";
    echo "<p><strong><p>ID</strong>: {$studentDetails["id"]}</p>";
    echo "<p><strong>Address</strong>: {$studentDetails["address"]}</p>";
    echo "<p><h3> {$studentDetails["mark"]}%</p> </h3>";

    // Display link for the previous student based on student ID
    if ($studentNumber > 1) {
        $prevStudentNumber = $studentNumber - 1;
        $prevStudentID = $students[$prevStudentNumber]['id'];
        echo "<p><a href='students.php?number={$prevStudentNumber}'> <<< {$prevStudentID}</a></p>";
    }

    // Display link for the next student based on student ID
    if ($studentNumber < count($students) ) {
        $nextStudentNumber = $studentNumber + 1;
        $nextStudentID = $students[$nextStudentNumber]['id'];
        echo "<p><a href='students.php?number={$nextStudentNumber}'> >>> {$nextStudentID}</a></p>";
    } else {
        echo "No more students.";
    }
} else {
    echo "<p>Invalid student number: $studentNumber</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title for the web page -->
    <title>Student Details</title>
</head>
<body>
    <!-- Footer links for navigation -->
    <?php include 'footer-links.php'; ?>
</body>
</html>
