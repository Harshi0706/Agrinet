<?php
session_start();
require 'db_connection.php';  // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $check_query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Email already exists, redirect to error page
        header('Location:error.php?error=EmailExists');
        exit();
    } else {
        // Email does not exist, proceed with the insertion
        $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'temp_user')";
        if (mysqli_query($conn, $query)) {
            // Store user ID in session
            $_SESSION['user_id'] = mysqli_insert_id($conn);

            // Redirect to role selection page
            header('Location:select_role.php');
            exit();
        } else {
            // Error handling: output the error message
            header('Location:error.php?error=DatabaseError');
            exit();
        }
    }
}
?>