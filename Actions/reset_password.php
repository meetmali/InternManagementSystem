<?php
session_start()
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    // Database connection parameters
    $host = "localhost";
    $username = "root";
    $password_db = "";
    $database = "internship_management_system";

    // Connect to the database
    $conn = new mysqli($host, $username, $password_db, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the new password for security (You should always hash passwords before storing them)
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Prepare and execute the UPDATE query to update the user's password
    $query = "UPDATE interns SET intern_password = ? WHERE intern_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $newPassword, $email);
    $stmt->execute();

    // Check if the password was successfully updated
    if ($stmt->affected_rows > 0) {
        echo "Password reset successful!";
    } else {
        echo "Password reset failed. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
