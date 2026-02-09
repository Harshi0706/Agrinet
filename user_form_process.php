<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $user_location = mysqli_real_escape_string($conn, $_POST['user_location']);
    $topics = mysqli_real_escape_string($conn, $_POST['fav_topics']);
    
    $user_id = $_SESSION['user_id'];

    // Ensure the session variable 'user_id' is set
    if (isset($user_id)) {
        // Insert farmer details into 'farmers' table
        $query = "INSERT INTO normal_users (user_id, full_name, user_location, favorite_topics) 
                  VALUES ($user_id, '$full_name', '$user_location', '$topics')";
        
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