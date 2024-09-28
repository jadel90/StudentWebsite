<!DOCTYPE html>
<html>
<head>
    <!-- Title for the web page -->
    <title>Directory</title>

    
    <style>
        /* Styling for the overall body of the webpage */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        /* Styling for the main header of the page */
        h1 {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            font-size: 32px;
            color: #333;
        }

        /* Styling for a default student image */
        .default-student {
            width: 100%;  
            max-width: 400px;
            height: auto;
            margin: 40px auto 20px auto;
            display: block;
            /* border-radius: 50%; */
        }

        /* Styling for the sub-header */
        h2 {
            text-align: center;
            margin: 30px 0;
            font-size: 24px;
        }


        /* Styling for the container that holds student images */
        .student-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            justify-content: center;
            background-color: #fff;
            border: 2px solid black; /* Add border to the container */
    
        }

        /* Styling for the images within the student container */
        .student-container a img {
            display: block;
            width: 100%;
            height: auto;
            margin-bottom: 10px; 
            
        }

        /* Styling for the footer links at the bottom of the page */
        .footer {
            text-align: center;
            margin: 30px 0;
            margin-top: 20px;
            font-size: 24px;
        }
    
    </style>
</head>
<body>

<?php
// Set the directory where student avatars are stored
$directory = "avatars";
// Fetch all .jpg images from the directory
$images = glob($directory . "/*.jpg");

// Include the student arrays for additional data
include('student_arrays.php'); 
?>


<!-- Displaying the main title and default student image -->
<h1>Directory</h1>
<?php

$defaultImage = 'avatars/001.jpg'; // Set a default image path
if (isset($_COOKIE['default_student_image'])) {
    $defaultImageName = $_COOKIE['default_student_image'];
    $defaultImagePath = $directory . "/" . $defaultImageName;
    if (file_exists($defaultImagePath)) {
        // Use the default image from the cookie
        $defaultImage = $defaultImagePath;
    }
}
echo "<img class='default-student' src='$defaultImage' alt='Default Student Image' title='Click to view default student details'>";
?>



<h2>Choose a student below:</h2>




<!-- Container to display student images and links to their details -->
<div class="student-container">
    <?php
    
    
    foreach ($students as $index => $student) {
        $imagePath = $directory . "/" . $student["img"];
        $studentId = $student["id"];
        $studentAddress = $student["address"];
        $studentMark = $student["mark"];
        
        // Extract student number from image name (e.g., "001.jpg" becomes 1)
        $studentNumber = intval(basename($student["img"], ".jpg"));
        
        echo "<a href='students.php?number={$studentNumber}'>";

        echo "<img src='$imagePath' alt='Student Image'>";
        
        echo "</a>";
        
    }
    ?>
</div>

<!-- Footer links for navigation -->

<div class= "footer">
<?php include 'footer-links.php'; ?>

<script>
    
</script>

</body>
</html>



<!-- http://localhost/assignment1/index.php -->