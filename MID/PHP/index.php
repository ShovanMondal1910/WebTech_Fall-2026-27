<?php
$name = "Shovan Mondal";//string
$semester = 9;//int
$cgpa = 4.00;
$pi = 3.1416;
$avgGrade = 'A';
$isStudent = true;


echo "My name is ". $name .", this is my ". $semester ."th semester. My CGPA is ". $cgpa .
". I know the value of PI is ". $pi . ". My average grade is : ". $avgGrade.".";


if($isStudent == true)
{
    echo "I am a Student";
}
else
{
    echo "I am not a Student";
}

?>
