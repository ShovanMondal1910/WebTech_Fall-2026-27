<?php
include_once __DIR__ . '/../config/connection.php';

function patientIDExists($patientId)
{
    global $conn;

    $stmt = mysqli_prepare($conn, "SELECT 1 FROM patients WHERE patient_id = ? LIMIT 1");
    if (!$stmt) {
        throw new Exception("Failed to prepare patient ID check: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 's', $patientId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) > 0;
    mysqli_stmt_close($stmt);

    return $exists;
}

function generatePatientID()
{
    $year        = date('y');
    $maxAttempts = 50;

    for ($i = 0; $i < $maxAttempts; $i++) {
        $patientId = $year . '-' . random_int(10000, 99999);

        if (!patientIDExists($patientId)) {
            return $patientId;
        }
    }

    throw new Exception("Could not generate a unique patient ID for year 20{$year}. Please try again.");
}

?>