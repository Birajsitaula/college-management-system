<?php
error_reporting(0);
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="formBoxContainer">
        <?php echo $_SESSION['loginMessage']; ?>
        <div class="formBox">
            <?php
            if (isset($_POST["login"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                require_once "database.php";
                $sql = "SELECT * FROM user WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc($result);

                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Username does not exist</div>";
                }
            }
            ?>
            <!-- Login Form -->
            <h1>Login</h1>
            <!-- Form for user login -->
            <form action="login_check.php" method="POST">
                <!-- Email input -->
                <div class="input_box">
                    <label class="form-label" for="text">username</label>
                    <i class="fa fa-envelope"></i><!-- Icon for email -->
                    <input type="text" id="email" name="username" placeholder="Enter your username" required /> <!-- Add name attribute -->
                </div>
                <!-- Password input -->
                <div class="input_box">
                    <label class="form-label" for="pwd">Password:</label>
                    <i class="fa fa-lock password"></i> <!-- Icon for password -->
                    <input type="password" id="pwd" name="password" placeholder="Enter your password" required /> <!-- Add name attribute -->
                    <i class="fa fa-eye-slash pw_hide"></i> <!-- Icon for password visibility toggle -->
                </div>
                <!-- Category selection -->
                <div class="category_select">
                    <label for="category">Category :</label>
                    <select name="category" id="category" required>
                        <!-- Options for different user categories -->
                        <option value="student" selected="selected">Student</option>
                        <option value="staff">Teacher</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <!-- Checkbox for "Remember me" -->
                <div class="option_field">
                    <span class="checkbox">
                        <input type="checkbox" id="remember" name="remember" />
                        <label for="remember">Remember me</label>
                    </span>
                    <a href="#" class="forgot_pw">Forgot password?</a> <!-- Forgot password link -->
                </div>
                <!-- Submit button -->
                <button class="button" type="submit" name="login">Login Now</button>
                <!-- Link for registering if the user doesn't have an account -->
                <div class="login_signup">Don't have an account? <a href="register.php" id="signup">Signup</a></div>
            </form>
        </div>
    </div>
    <script src="./CSS/script.js"></script>
</body>

</html>