<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <div class="left-links">
            <a href="home2.php">Alpha Labs</a>
            <a href="internships.php">Internships</a>
            <a href="#">Courses</a>
            <a href="about.php">About us</a>
            <a href="certificateVal.php">Certificate Validator</a>
        </div>
        <div class="right-links">
            <a href="login.html">Signin</a>
            <a href="signup.html">Signup</a>
        </div>
    </nav>

    <div class="signup-section">
        <div class="signup-container">
          <div class="signup-box">
            <h1>Create an Account</h1>
            <form class="signup-form" action="/signup" method="post">
              <div class="name-container">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
              </div>
              <input type="text" name="institution" placeholder="Institution" required>
              <input type="email" name="email" placeholder="Email Address" required>
              <input type="password" name="password" placeholder="Password" required>
              <input type="password" name="confirm_password" placeholder="Confirm Password" required>
              <button type="submit">Sign Up</button>
            </form>
            <div class="signup-options">
              <span>Already have an account?</span>
              <a href="/login">Login</a>
            </div>
          </div>
        </div>
      </div>
      
</body>
</html>