<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formBoxContainer">
        <div class="formBox">
            <!-- Login Form -->
            <h1>Register</h1>
            <!-- Form for user login -->
            <form action="register.php" method="POST">
                <!-- Full Name input -->
                <div class="input_box">
                    <label class="form-label" for="fname">Full Name:</label>
                    <i class="fa fa-user"></i><!-- Icon for full name -->
                    <input type="text" id="fname" name="fname" placeholder="Enter your full name" required />
                </div>
                <!-- Username input -->
                <div class="input_box">
                    <label class="form-label" for="username">Username:</label>
                    <i class="fa fa-user"></i><!-- Icon for username -->
                    <input type="text" id="username" name="Username" placeholder="Enter your username" required />
                </div>
                <!-- Phone input -->
                <div class="input_box">
                    <label class="form-label" for="phone">Phone:</label>
                    <i class="fa fa-phone"></i><!-- Icon for phone -->
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required />
                </div>
                <!-- Email input -->
                <div class="input_box">
                    <label class="form-label" for="email">Email address:</label>
                    <i class="fa fa-envelope"></i><!-- Icon for email -->
                    <input type="email" id="email" name="email" placeholder="Enter your email" required />
                </div>
                <!-- User type input -->
                <div class="input_box">
                    <label class="form-label" for="usertype">User Type:</label>
                    <i class="fa fa-users"></i><!-- Icon for user type -->
                    <input type="text" id="usertype" name="usertype" placeholder="Enter user type (e.g., Admin, Student, Teacher)" required />
                </div>
                <!-- Password input -->
                <div class="input_box">
                    <label class="form-label" for="pwd">Password:</label>
                    <i class="fa fa-lock password"></i> <!-- Icon for password -->
                    <input type="password" id="pwd" name="password" placeholder="Enter your password" required />
                    <i class="fa fa-eye-slash pw_hide"></i>
                </div>
                <!-- Confirm Password input -->
                <div class="input_box">
                    <label class="form-label" for="conf_pwd">Confirm Password:</label>
                    <i class="fa fa-lock password"></i> <!-- Icon for password -->
                    <input type="password" id="conf_pwd" name="conf_password" placeholder="Enter your password again" required />
                    <i class="fa fa-eye-slash pw_hide"></i>
                </div>
                <!-- Checkbox for "Remember me" -->
                <div class="option_field">
                    <span class="checkbox">
                        <input type="checkbox" id="check" />
                        <label for="check">Remember me</label>
                    </span>
                    <a href="#" class="forgot_pw">Forgot password?</a>
                </div>
                <!-- Submit button -->
                <button class="button" type="submit" value="signup" name="signup">Signup Now</button>
                <div class="login_signup">Already have account? <a href="login.php" id="login">Login</a></div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>

<?php
if (isset($_POST['signup'])) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "collegeproject";

    $conn = mysqli_connect($host, $user, $password, $db);

    if ($conn === false) {
        die("Connection error: " . mysqli_connect_error());
    }

    $fname = $_POST['fname'];
    $username = $_POST['Username']; // Corrected to 'username'
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    if ($password !== $conf_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Check if username or email already exists
        $check_query = "SELECT * FROM user WHERE Username = ? OR email = ?";
        $check_stmt = mysqli_prepare($conn, $check_query);
        mysqli_stmt_bind_param($check_stmt, "ss", $username, $email);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);
        $num_rows = mysqli_stmt_num_rows($check_stmt);

        if ($num_rows > 0) {
            echo "<script>alert('Username or email already exists!');</script>";
        } else {
            $sql = "INSERT INTO user (fname, Username, phone, email, usertype, password) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssss", $fname, $username, $phone, $email, $usertype, $password); // Corrected $Username to $username
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "<script>alert('Registration successful!');</script>";
                    header("Location: login.php");
                    exit();
                } else {
                    echo "<script>alert('Registration failed: " . mysqli_error($conn) . "');</script>";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('SQL error: " . mysqli_error($conn) . "');</script>";
            }
        }
    }

    mysqli_close($conn);
}
?>