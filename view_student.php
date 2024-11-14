<?php
// Suppress error reporting
error_reporting(0);

// Start the session
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("location: index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    // Redirect students to login page
    header('location: index.php');
}

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";

// Establish a connection to the database
$data = mysqli_connect($host, $user, $password, $db);

// SQL query to select all student data from the 'user' table where usertype is 'student'
$sql = "SELECT * FROM user WHERE usertype='student'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <?php
    // Include CSS styles for the admin dashboard
    include 'admin_css.php';
    ?>
    <style type="text/css">
        /* Styles for table header and cells */
        .table_th {
            padding: 20px;
            font-size: 20px;
        }

        .table_td {
            padding: 20px;
            background-color: skyblue;
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
            <h1>Student Data</h1>

            <?php
            // Display session message if it exists
            if ($_SESSION['message']) {
                echo $_SESSION['message'];
            }

            // Unset the session message
            unset($_SESSION['message']);
            ?>

            <!-- Table to display student data -->
            <table border="1px">
                <tr>
                    <th class="table_th"> Name</th>
                    <th class="table_th">UserName</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Phone</th>
                    <th class="table_th">Password</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php
                // Loop through each row of student data and display it in the table
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="table_td"><?php echo "{$info['fname']}"; ?></td>
                        <td class="table_td"><?php echo "{$info['Username']}"; ?></td>
                        <td class="table_td"><?php echo "{$info['email']}"; ?></td>
                        <td class="table_td"><?php echo "{$info['phone']}"; ?></td>
                        <td class="table_td"><?php echo "{$info['password']}"; ?></td>
                        <td class="table_td">
                            <!-- Button to delete a student, confirmation dialog on click -->
                            <?php echo "<a onclick=\"javascript:return confirm('Are you sure');\" class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Delete</a>"; ?>
                        </td>
                        <td class="table_td">
                            <!-- Button to update a student -->
                            <?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>"; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    </div>

</body>

</html>