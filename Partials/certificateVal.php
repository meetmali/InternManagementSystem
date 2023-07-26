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
            <a href="index.php">Alpha Labs</a>
            <a href="internships.php">Internships</a>
            <a href="#">Courses</a>
            <a href="about.php">About us</a>
            <a href="certificateVal.php">Certificate Validator</a>
        </div>
        <div class="right-links">
            <a href="login.php">Signin</a>
            <a href="signup.php">Signup</a>
        </div>
    </nav>


    <div class="certificate-container">
        <div class="certificate-header">Certificate Validator</div>
        <div class="certificate-search-bar">
            <span class="certificate-search-icon">&#128269;</span>
            <input type="text" class="certificate-search-input" placeholder="Enter Your Intern ID">
        </div>
        <table class="certificate-table">
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
            <!-- Add more rows with real data if needed -->
        </table>
    </div>
</body>


</html>