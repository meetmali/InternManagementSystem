<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/certificateVal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;&display=swap" rel="stylesheet">
    <title>Alpha Labs</title>
</head>

<body>
    <nav class="navbar">
        <div class="left-links">
            <a href="../index.php">Alpha Labs</a>
            <a href="internships.php">Internships</a>
            <a href="courses.php">Courses</a>
            <a href="about.php">About us</a>
            <a href="certificateVal.php">Certificate Validator</a>
        </div>
        <div class="right-links">
            <a href="login.php">Signin</a>
            <a href="signup.php">Signup</a>
        </div>
    </nav>


<form action="" method="POST">
    <div class="certificate-container">
        <div class="certificate-header">Certificate Validator</div>
        <div class="certificate-search-bar">
            <span class="certificate-search-icon">&#128269;</span>
            <input type="text" class="certificate-search-input" placeholder="Enter Your Intern ID" name= "internID">
            <button type="submit">&#128269; Validate</button>
        </div>
    </div>
</form>

<?php
// $internID = $_POST['internID'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve and sanitize the internID from the form
  $internID = filter_input(INPUT_POST, 'internID', FILTER_SANITIZE_STRING);
  
  // Check if the internID is valid (e.g., numeric and greater than 0)
  if (!is_numeric($internID) || $internID <= 0) {
    echo "Invalid Intern ID. Please enter a valid intern ID.";
    exit;
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
  
  // Fetch intern and internship details based on the provided internID
  $query = "SELECT interns.intern_id, interns.intern_name, interns.internship_name, 
            interns.internship_rating, interns.stipend, interns.duration
            FROM interns
            WHERE intern_id = ?";
  
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $internID);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Check if any matching intern record is found
  if ($result->num_rows === 0) {
    echo "No intern found with the provided ID.";
    exit;
  }
  
  // Fetch intern data and display the information
  $internData = $result->fetch_assoc();
  
 // Display the intern and internship information in a table
 echo "<h1>Intern Information</h1>";
 echo "<table class=\"certificate-table\">";
 echo "<tr>";
 echo "<th class=\"certificate-th\">Name</th>";
 echo "<th class=\"certificate-th\">Intern ID</th>";
 echo "<th class=\"certificate-th\">Internship Name</th>";
 echo "<th class=\"certificate-th\">Internship Rating</th>";
 echo "<th class=\"certificate-th\">Stipend</th>";
 echo "<th class=\"certificate-th\">Duration (months)</th>";
 echo "</tr>";
 
 echo "<tr class=\"certificate-tr\">";
 echo "<td class=\"certificate-td\">" . $internData["intern_name"] . "</td>";
 echo "<td class=\"certificate-td\">" . $internData["intern_id"] . "</td>";
 echo "<td class=\"certificate-td\">" . $internData["internship_name"] . "</td>";
 echo "<td class=\"certificate-td\">" . $internData["internship_rating"] . "</td>";
 echo "<td class=\"certificate-td\">$" . $internData["stipend"] . "</td>";
 echo "<td class=\"certificate-td\">" . $internData["duration"] . "</td>";
 echo "</tr>";
 
 echo "</table>";
  
  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>
       
       


       
       
        <!-- <table class="certificate-table">
            <tr>
                <th class="certificate-th">Name</th>
                <th class="certificate-th">Intern ID</th>
                <th class="certificate-th">Position</th>
                <th class="certificate-th">Stipend</th>
                <th class="certificate-th">Duration</th>
            </tr>
            <tr class="certificate-tr">
                <td class="certificate-td">John Doe</td>
                <td class="certificate-td">ABC123</td>
                <td class="certificate-td">Software Engineer Intern</td>
                <td class="certificate-td">$1000</td>
                <td class="certificate-td">3 months</td>
            </tr>
            Add more rows with real data if needed 
        </table> -->




    </div>
</body>


</html>