<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/login.css">
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
            <a href="#">Courses</a>
            <a href="about.php">About us</a>
            <a href="certificateVal.php">Certificate Validator</a>
        </div>
        <div class="right-links">
            <a href="login.php">Signin</a>
            <a href="signup.php">Signup</a>
        </div>
    </nav>



    <div class="login-section">

        <div class="toggle-container">
            <input type="radio" id="admin-toggle" name="user-type" class="toggle-input" checked>
            <label for="admin-toggle" class="toggle-label">Admin</label>
            <input type="radio" id="intern-toggle" name="user-type" class="toggle-input">
            <label for="intern-toggle" class="toggle-label">Intern</label>
        </div>
        <div class="logn-container">
            <div class="logn-box">
                <h1>Welcome Back!</h1>

                <form class="logn-form" action="../Actions/login.php" method="POST">
                    <input type="text" name="username" placeholder="E-mail Id" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>

                <div class="login-options">
                    <a href="./forgot-password.php">Forgot Password?</a>
                    <span class="logn-divider"></span>
                    <a href="./signup.php">Create New Account</a>
                </div>
            </div>
        </div>
        
    </div>




    
    
</body>

</html>