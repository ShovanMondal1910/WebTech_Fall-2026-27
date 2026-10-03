<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'pharmacy_management';

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error)
{
    die("Failed to connect: " . $conn->connect_error);
    echo "Failed to connect";
}
else{
    echo "Connected Successfully";
    echo "<br> Welcome to the Pharmacy Management System";
}

?>