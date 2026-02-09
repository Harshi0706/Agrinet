<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Fetch user details from the 'users' table
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Store user info in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Fetch full name from the role-based table
            switch ($user['role']) {
                case 'farmer':
                    $role_query = "SELECT full_name FROM farmers WHERE user_id = " . $user['id'];
                    break;
                case 'agriculture_expert':
                    $role_query = "SELECT full_name FROM agriculture_experts WHERE user_id = " . $user['id'];
                    break;
                case 'seller':
                    $role_query = "SELECT full_name FROM sellers WHERE user_id = " . $user['id'];
                    break;
                case 'researcher':
                    $role_query = "SELECT full_name FROM researchers WHERE user_id = " . $user['id'];
                    break;
                case 'normal_user':
                    $role_query = "SELECT full_name FROM normal_users WHERE user_id = " . $user['id'];
                    break;
                default:
                    $role_query = null;
                    break;
            }

            // Execute the query to get the full name
            if ($role_query) {
                $role_result = mysqli_query($conn, $role_query);
                if (mysqli_num_rows($role_result) > 0) {
                    $role_data = mysqli_fetch_assoc($role_result);
                    $_SESSION['full_name'] = $role_data['full_name'];
                }
            }

            // Redirect to dashboard
            header('Location:account.php');
            exit();
        } else {
            // Invalid password
            header('Location:error.php?error=InvalidPassword');
            exit();
        }
    } else {
        // No user found with the provided email
        header('Location:error.php?error=EmailNotFound');
        exit();
    }
}
?>