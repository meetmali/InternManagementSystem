<?php
session_start(); // Start the session to access user data

if (!isset($_SESSION['user_id'])) {
  // Redirect the user to the login page if not logged in
  header("Location: login.php");
  exit();
}

// Database connection parameters
$host = "localhost";
$username = "root";
$password_db = "";
$database = "internship_management_system"; // Assuming this is the name of your database

// Connect to the database
$conn = new mysqli($host, $username, $password_db, $database);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the logged-in user's data from the database
$userID = $_SESSION['user_id'];
$query = "SELECT intern_name, intern_username, intern_email, intern_phone, intern_college, 
          intern_current_year, intern_passing_year, intern_course, intern_marks 
          FROM interns WHERE intern_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

// Check if any user record is found
if ($result->num_rows === 0) {
  echo "User not found.";
  exit;
}

// Fetch user data
$userData = $result->fetch_assoc();
$name = $userData["intern_name"];
$email = $userData["intern_email"];
$username = $userData["intern_username"];
// Handle form submission for updating profile
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Sanitize the form data
  
  $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
  $college = filter_input(INPUT_POST, 'college', FILTER_SANITIZE_STRING);
  $currentYear = filter_input(INPUT_POST, 'current_year', FILTER_SANITIZE_NUMBER_INT);
  $passingYear = filter_input(INPUT_POST, 'passing_year', FILTER_SANITIZE_NUMBER_INT);
  $course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING);
  $marks = filter_input(INPUT_POST, 'marks', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

  // Update the user's data in the database
  $updateQuery = "UPDATE interns SET intern_phone=?, intern_college=?, intern_current_year=?, 
                  intern_passing_year=?, intern_course=?, intern_marks=? WHERE intern_id=?";
  $updateStmt = $conn->prepare($updateQuery);
  $updateStmt->bind_param("ssiisdi", $phone, $college, $currentYear, $passingYear, $course, $marks, $userID);
  
  if ($updateStmt->execute()) {
    // Success: Redirect to the profile page with a success message
    header("Location: myprofile.php?update=success");
    exit();
  } else {
    // Error: Redirect to the profile page with an error message
    header("Location: myprofile.php?update=error");
    exit();
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <!-- Add your CSS styling here -->
</head>
<body>
  <h1>Welcome, <?php echo $userData['intern_name']; ?>!</h1>
  <?php
  echo "<tr>";
        echo "<td>" . $userID . "</td>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $username . "</td>";
        echo "<td>" . $userData["intern_phone"]. "</td>";
        // echo "<td>" . $row["intern_password"] . "</td>";
        echo "<td>" . $email . "</td>";
        echo "<td>" . $userData["intern_college"]. "</td>";
        echo "<td>" . $userData["intern_current_year"]. "</td>";
        echo "<td>" . $userData["intern_passing_year"]. "</td>";
        echo "<td>" . $userData["intern_course"]. "</td>";
        echo "<td>" . $userData["intern_marks"]. "</td>";
        echo "</tr>";
    ?>
</body>
</html>
