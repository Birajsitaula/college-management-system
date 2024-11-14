<?php
// Start the session and suppress error reporting
session_start();
error_reporting(0);

// Check if the username is not set in the session, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("location: index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    // If the usertype is 'student', redirect to the login page
    header('location: index.php');
}

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$db = "collegeproject";

// Establish a connection to the database
$data = mysqli_connect($host, $username, $password, $db);

// Get the student ID from the URL
$id = $_GET['student_id'];

// SQL query to fetch student data based on the ID
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($data, $sql);

// Fetch the student data as an associative array
$info = $result->fetch_assoc();

// Check if the 'update' form is submitted
if (isset($_POST["update"])) {
    // Get values from the form
    //test 
    $fname = $_POST['fname'];
    //
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check for duplicate entries excluding the current user
    $check = "SELECT * FROM user WHERE (username='$name' OR email='$email') AND id != '$id'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    // If a duplicate entry is found, display an alert
    if ($row_count > 0) {
        echo "<script type='text/javascript'>
            alert('Username or Email Already Exists. Try another Username or Email');
        </script>";
    } else {
        // Proceed with the update if there are no duplicate entries
        $query = "UPDATE user SET  fname='$fname', Username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";
        $result2 = mysqli_query($data, $query);

        // If the update is successful, redirect to the student view page
        if ($result2) {
            header("location:view_student.php");
        } else {
            echo "Error updating record: " . mysqli_error($data);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <?php
    // Include the CSS file for the admin dashboard
    include 'admin_css.php';
    ?>

    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>
    <?php
    // Include the admin sidebar
    include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>
            <h1>Update Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <!-- Input field for the student's username -->
                        <label for="fname">name</label>
                        <input type="text" name="fname" value="<?php echo htmlspecialchars($info['name']); ?>" required>
                    </div>
                    <div>

                        <label for="name">UserName</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($info['Username']); ?>" required>
                    </div>

                    <div>
                        <!-- Input field for the student's email -->
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($info['email']); ?>" required>
                    </div>

                    <div>
                        <!-- Input field for the student's phone number -->
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" value="<?php echo htmlspecialchars($info['phone']); ?>" required>
                    </div>

                    <div>
                        <!-- Input field for the student's password -->
                        <label for="password">Password</label>
                        <input type="text" name="password" value="<?php echo htmlspecialchars($info['password']); ?>" required>
                    </div>

                    <div>
                        <!-- Submit button for updating the student data -->
                        <input class="btn btn-success" type="submit" name="update" value="Update">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>