<?php
$name = "Shovan Mondal"; // string
$semester = 9;           // int
$cgpa = 4.00;            // float
$pi = 3.1416;            // float
$avgGrade = 'A';         // string (PHP has no char type)
$isStudent = true;       // boolean
$isMarried = null;       // null

// number_format() keeps the two decimal places (4.00)
echo "My name is $name, this is my {$semester}th semester. My CGPA is " . number_format($cgpa, 2) . ". ";
echo "I know the value of PI is $pi. My average grade is: $avgGrade. ";

// You don't need "== true" for booleans; if($isStudent) works directly
if ($isStudent) {
    echo "I am a Student. ";
} else {
    echo "I am not a Student. ";
}

// Checking for null
if (is_null($isMarried)) {
    echo "Marital status is not specified.";
}
?>
