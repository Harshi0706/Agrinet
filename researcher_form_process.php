<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $affiliation = mysqli_real_escape_string($conn, $_POST['affiliation']);
    $research_field = mysqli_real_escape_string($conn, $_POST['research_field']);
    $publications = mysqli_real_escape_string($conn, $_POST['published_papers']);
    
    $user_id = $_SESSION['user_id'];

    // Ensure the session variable 'user_id' is set
    if (isset($user_id)) {
        // Insert farmer details into 'farmers' table
        $query = "INSERT INTO researchers (user_id, full_name, affiliation, research_field, publications) 
                  VALUES ($user_id, '$full_name', '$affiliation', '$research_field','$publications')";
        
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