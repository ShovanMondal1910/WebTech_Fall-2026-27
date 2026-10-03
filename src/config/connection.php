<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'pharmacy_management';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');