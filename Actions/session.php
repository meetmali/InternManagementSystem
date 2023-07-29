<?php
// Start a session (if not already started)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to check if the user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to get the current user's ID
function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

// Function to get the current user's name
function getCurrentUserName() {
    return $_SESSION['user_name'] ?? null;
}

// Function to log out the user
function logoutUser() {
    // Clear all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Check if the user is logged in
if (!isUserLoggedIn()) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>
