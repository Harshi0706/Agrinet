<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $farm_name = mysqli_real_escape_string($conn, $_POST['farm_name']);
    $farm_location = mysqli_real_escape_string($conn, $_POST['farm_location']);
    $crops_grown = mysqli_real_escape_string($conn, $_POST['crops_grown']);
    $user_id = $_SESSION['user_id'];

    // Ensure the session variable 'user_id' is set
    if (isset($user_id)) {
        // Insert farmer details into 'farmers' table
        $query = "INSERT INTO farmers (user_id, full_name, farm_name, farm_location, crops_grown) 
                  VALUES ($user_id, '$full_name', '$farm_name', '$farm_location', '$crops_grown')";
        
        if (mysqli_query($conn, $query)) {
            // Complete the sign-up process and redirect to login page
            header('Location:login.php');
            exit();  // Ensure script stops executing after redirection
        } else {
            // Error handling
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: User ID is not set. Please start the process from the beginning.";
    }
}
?>