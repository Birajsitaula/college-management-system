<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['student_id'])) {
    $user_id = $_GET["student_id"];

    // Use a prepared statement
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = mysqli_prepare($data, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if ($result) {
        // $_SESSION['message'] = 'Delete Student is Successful';
        header("location:view_student.php");
    } else {
        echo "Delete failed";
    }
    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($data);
