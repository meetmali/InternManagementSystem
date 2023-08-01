<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];

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

    // Prepare and execute the SELECT query to check if the email and phone are correct
    $query = "SELECT * FROM interns WHERE intern_email = ? AND intern_phone = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error);
    }
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists with the given email and phone
    if ($result->num_rows === 1) {
        // User found, show the password reset form
        echo "<h2>Reset Password</h2>";
        echo "<form action=\"reset_password.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"email\" value=\"$email\">";
        echo "<label for=\"new_password\">New Password:</label>";
        echo "<input type=\"password\" id=\"new_password\" name=\"new_password\" required><br>";
        echo "<input type=\"submit\" value=\"Save Password\">";
        echo "</form>";
    } else {
        echo "Invalid email or phone number. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
