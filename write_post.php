<?php
session_start();
require 'db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Retrieve user role
$role = $_SESSION['role'];

// Redirect to the correct post writing page based on role
switch ($role) {
    case 'farmer':
        header('Location: farmer_post_form.php');
        break;
    case 'agriculture_expert':
        header('Location: expert_post_form.php');
        break;
    case 'seller':
        header('Location: seller_post_form.php');
        break;
    case 'researcher':
        header('Location: researcher_post_form.php');
        break;
    default:
        echo "Invalid role.";
        break;
}
?>