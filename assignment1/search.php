<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <style>

        .slider-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .slidecontainer {
            margin: 0 auto;
            text-align: start;
            margin-left: 10px;
        }
        .footer {
            text-align: center;
            margin: 30px 0;
            margin-top: 20px;
            font-size: 24px;
        }

        /* Styling for the container that holds student images */
        .student-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            justify-content: center;
            background-color: #fff;
        }

        /* Styling for the images within the student container */
        .student-container a img {
            display: block;
            width: 100%;
            height: 200px;
            object-fit: cover; /* Maintain aspect ratio */
            margin-bottom: 10px; /* Adjust margin as needed */
        }

    </style>
</head>
<body>


<h1>Search</h1>



    <!-- Select Minimum Mark -->
    <div class="slider-container">
        <h2>Select Minimum Mark</h2>
        <div class="slidecontainer">
            <input type="range" min="0" max="100" class="slider" id="minRange">
            <span id="minDemo"></span>%
        </div>
    </div>

    <!-- Select Maximum Mark -->
    <div class="slider-container">
        <h2>Select Maximum Mark</h2>
        <div class="slidecontainer">
            <input type="range" min="0" max="100" class="slider" id="maxRange">
            <span id="maxDemo"></span>%
        </div>
    </div>

<?php
// Set the directory where student avatars are stored
$directory = "avatars";
// Fetch all .jpg images from the directory
$images = glob($directory . "/*.jpg");


// If the $students variable is set, include student arrays for additional data
if(isset($students)) {
    include('student_arrays.php');
}
?>


<!-- display images of students -->
<!-- Container to display student images and links to their details -->
<div class="student-container">
    <?php
    // Iterate over each image and display it with a link to its details
    foreach($images as $image) {
        $imageName = basename($image);
        $studentId = intval(pathinfo($image, PATHINFO_FILENAME));
        echo "<a href='students.php?image=$imageName&id=$studentId'><img src='$image' alt='$imageName' ></a>";
    }
    ?>
</div>


<script>
// JavaScript to update the minimum and maximum slider values and perform AJAX search
var minSlider = document.getElementById("minRange");
var minOutput = document.getElementById("minDemo");
minOutput.innerHTML = minSlider.value; // Display the default slider value


var maxSlider = document.getElementById("maxRange");
var maxOutput = document.getElementById("maxDemo");
maxOutput.innerHTML = maxSlider.value; // Display the default slider value


// Function to update student list via AJAX
function updateStudentList(min, max) {
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                document.querySelector('.student-container').innerHTML = xhr.responseText;
            } 
            
            else {
                console.error('An error occurred fetching the student list.');
            }
        }
    };
    xhr.open('GET', 'search_students.php?min=' + min + '&max=' + max, true);
    xhr.send();
}


// Add event listeners to the sliders
minSlider.oninput = function() {
    minOutput.innerHTML = this.value;
    
    // Perform search only if min is less than or equal to max
    if (parseInt(minSlider.value) <= parseInt(maxSlider.value)) {
        updateStudentList(minSlider.value, maxSlider.value);
    } 
    
    else {
        document.querySelector('.student-container').innerHTML = '<div>Error: Illegal Range.</div>';
    }
};


maxSlider.oninput = function() {
    maxOutput.innerHTML = this.value;
    
    // Perform search only if max is greater than or equal to min
    if (parseInt(minSlider.value) <= parseInt(maxSlider.value)) {
        updateStudentList(minSlider.value, maxSlider.value);
    } 
    
    else {
        document.querySelector('.student-container').innerHTML = '<div>Error: Illegal Range.</div>';
    }
};

</script>

<!-- Footer links for navigation -->
<div class= "footer">
<?php include 'footer-links.php'; ?>

</body>
</html>

<!-- http://localhost/assignment1/search.php -->