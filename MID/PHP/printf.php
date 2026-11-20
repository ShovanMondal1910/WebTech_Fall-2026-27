<?php

echo "=== 1. ucwords() Basic Example ===";
echo "<br>";
$text = "hello world from dhaka";
$formattedText = ucwords($text);
echo $formattedText . "\n\n";
echo "<br>";

echo "=== 2. ucwords() with Custom Delimiter ===";
echo "<br>";
$slug = "hello-world-example";
echo ucwords($slug, "-") . "\n\n";
echo "<br>";

echo "=== 3. printf() Example ===";
echo "<br>";
$name = "Rahim";
$age = 25;
printf("My name is %s and I am %d years old.\n\n", $name, $age);
echo "<br>";

echo "=== 4. Combining printf() and ucwords() ===";
echo "<br>";
$rawName = "sara ahmed";
$points = 150;
printf("Welcome back, %s! You have %d points.\n", ucwords($rawName), $points);
echo "<br>";
?>
