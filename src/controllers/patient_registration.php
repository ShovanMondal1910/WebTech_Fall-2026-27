<?php

require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../utilities/patientIDgenarator.php';

$signupPage  = '../../signup.php';
$successPage = '../../index.html';

function redirectWith($url, $params = [])
{
    // Keep the user's name/email in the form when sending back an error
    if (isset($params['error'])) {
        $params['name']  = $_POST['name']  ?? '';
        $params['email'] = $_POST['email'] ?? '';
    }
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }
    header("Location: $url");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['register'])) {
    redirectWith($signupPage);
}

$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$terms    = isset($_POST['terms']);

// ---------- Validation ----------
if ($name === '' || $email === '' || $password === '') {
    redirectWith($signupPage, ['error' => 'All fields are required.']);
}
if (strlen($name) > 100) {
    redirectWith($signupPage, ['error' => 'Name is too long.']);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
    redirectWith($signupPage, ['error' => 'Please enter a valid email address.']);
}
if (strlen($password) < 8) {
    redirectWith($signupPage, ['error' => 'Password must be at least 8 characters.']);
}
if (!$terms) {
    redirectWith($signupPage, ['error' => 'You must agree to the terms and conditions.']);
}

// ---------- Check duplicate email ----------
$stmt = mysqli_prepare($conn, "SELECT 1 FROM patients WHERE email = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$emailExists = mysqli_stmt_num_rows($stmt) > 0;
mysqli_stmt_close($stmt);

if ($emailExists) {
    redirectWith($signupPage, ['error' => 'An account with this email already exists.']);
}

// ---------- Insert patient ----------
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$insert = mysqli_prepare($conn, "INSERT INTO patients (patient_id, full_name, email, password) VALUES (?, ?, ?, ?)");

// Retry in case two users get the same generated ID at the same moment
$saved = false;
for ($attempt = 0; $attempt < 3 && !$saved; $attempt++) {
    try {
        $patientId = generatePatientID();
        mysqli_stmt_bind_param($insert, 'ssss', $patientId, $name, $email, $hashedPassword);
        $saved = mysqli_stmt_execute($insert);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() !== 1062) { // 1062 = duplicate key
            break;
        }
        // Duplicate email inserted concurrently -> stop; duplicate ID -> retry
        if (stripos($e->getMessage(), 'email') !== false) {
            mysqli_stmt_close($insert);
            redirectWith($signupPage, ['error' => 'An account with this email already exists.']);
        }
    } catch (Exception $e) {
        break; // ID generator failed
    }
}
mysqli_stmt_close($insert);

if (!$saved) {
    redirectWith($signupPage, ['error' => 'Registration failed. Please try again.']);
}

redirectWith($successPage, ['registered' => 1, 'pid' => $patientId]);