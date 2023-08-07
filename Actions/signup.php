<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $college = $_POST['college'];
    $current_year = $_POST['current_year'];
    $passing_year = $_POST['passing_year'];
    $course = $_POST['course'];
    $marks = $_POST['marks'];

    if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] === 0) {
        $targetDirectory = "resume/";
        $resumeFileName = basename($_FILES["resume"]["name"]);
        $targetFilePath = $targetDirectory . $resumeFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        // echo "<br><br>inif";
        // Rest of the file upload code remains unchanged
        // ...
        $allowedFileTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowedFileTypes)) {
            // Move the uploaded resume to the resume folder
            if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath)) {
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
    
                // Prepare and execute the INSERT query
                $query = "INSERT INTO interns (intern_name, intern_email, intern_password, intern_phone, intern_college, intern_current_year, intern_passing_year, intern_course, intern_marks, intern_resume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssiidss", $name, $email, $password, $phone, $college, $current_year, $passing_year, $course, $marks, $resumeFileName);
                $stmt->execute();
    
                // Check if the data was successfully inserted
                if ($stmt->affected_rows > 0) {
                    echo "Signup successful! Welcome, $name!";
                } else {
                    echo "Signup failed. Please try again.";
                }
    
                // Close the database connection
                $stmt->close();
                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your resume.";
            }
        } else {
            echo "Invalid file format. Only PDF, DOC, and DOCX files are allowed.";
        }

    } 
    else {
        echo "Error uploading the resume. Please choose a valid file.";
    }


    // Check if the file is a valid PDF, DOC, or DOCX
}
?>
