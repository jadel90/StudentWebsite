<?php
// Include the student data arrays file
include('student_arrays.php');

// Get the minimum and maximum marks from the AJAX request
$min_mark = isset($_GET['min']) ? intval($_GET['min']) : 0;
$max_mark = isset($_GET['max']) ? intval($_GET['max']) : 100;

// Filter the students based on the provided marks
$filtered_students = array_filter($students, function($student) use ($min_mark, $max_mark) {
    return $student['mark'] >= $min_mark && $student['mark'] <= $max_mark;
});

// Sort the filtered students by their marks
usort($filtered_students, function($a, $b) {
    return $a['mark'] <=> $b['mark'];
});

// Generate and output the HTML for the filtered students
foreach ($filtered_students as $student) {
    $studentMark = $student['mark']; 
    $studentImage = $student['img']; 
    
    
    echo "<div class='student-container'>";
    echo "<img src='avatars/{$studentImage}'  title='Student Mark: {$studentMark}%'>";

    
    echo "</div>";
}
?>


