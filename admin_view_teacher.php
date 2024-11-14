<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to login page
error_reporting(0);
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

// SQL query to select all data from the 'teacher' table
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);

// Check if 'teacher_id' is set in the URL parameters
if (isset($_GET['teacher_id'])) {
    $t_id = $_GET['teacher_id'];

    // SQL query to delete a teacher with the specified 'teacher_id'
    $sql2 = "DELETE FROM teacher WHERE id='$t_id'";
    $result2 = mysqli_query($data, $sql2);

    // If deletion is successful, redirect to the teacher view page
    if ($result2) {
        header('location: admin_view_teacher.php');
    }
}
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
    <style>
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
            <h1>View All Teacher Data</h1>

            <!-- Table to display teacher data -->
            <table border="1px">
                <tr>
                    <th class="table_th">Teacher Name</th>
                    <th class="table_th">Subject</th>
                    <th class="table_th">About Teacher</th>
                    <th class="table_th">Image</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

                <?php
                // Loop through each row of teacher data and display it in the table
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="table_td"><?php echo "{$info['name']}" ?></td>
                        <td class="table_td"><?php echo "{$info['subject']}" ?></td>
                        <td class="table_td"><?php echo "{$info['description']}" ?></td>
                        <td class="table_td">
                            <!-- Display teacher image -->
                            <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" alt="Teacher Image">
                        </td>
                        <td class="table_td">
                            <!-- Button to delete a teacher, confirmation dialog on click -->
                            <a onclick="return confirm('Are you sure to delete this?');" class='btn btn-danger'
                                href='admin_view_teacher.php?teacher_id=<?php echo $info['id'] ?>'>
                                Delete
                            </a>
                        </td>

                        <td class="table_td">
                            <?php
                            echo "
                        <a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary' >
                        Update</a>";

                            ?>
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