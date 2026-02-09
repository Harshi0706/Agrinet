<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $user_id = $_SESSION['user_id'];

    // Update user role in the 'users' table
    $query = "UPDATE users SET role = '$role' WHERE id = $user_id";
    mysqli_query($conn, $query);

    // Redirect to role-specific form
    switch ($role) {
        case 'farmer':
            header('Location:user_form_f.php');
            break;
        case 'agriculture_expert':
            header('Location:user_form_e.php');
            break;
        case 'seller':
            header('Location:user_form_s.php');
            break;
        case 'researcher':
            header('Location:user_form_r.php');
            break;
        case 'normal_user':
            header('Location:user_form.php');
            break;
    }
}
?>