<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:index.php');
}





$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";
$data = mysqli_connect($host, $user, $password, $db);


if (isset($_POST['add_teacher'])) {
    $t_name = $_POST['name'];
    $t_subject = $_POST['subject'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];


    $dst = "./image/" . $file;

    $dst_db = "image/" . $file;


    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql = "INSERT INTO teacher (name,subject,description,image) VALUES ('$t_name','$t_subject','$t_description','$dst_db')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo '<script>alert("Teacher has been added."); window.location.href = "admin_add_teacher.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        .div_deg {
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;
        }
    </style>

    <?php
    include 'admin_css.php';
    ?>
</head>

<body>
    <?php

    include 'admin_sidebar.php';

    ?>


    <div class="content">
        <center>
            <h1>Add Teacher </h1><br>
            <br>

            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">Teacher Name</label>
                        <input type="text" name="name" id="">
                    </div>

                    <br>
                    <div>
                        <label for="">Subject</label>
                        <input type="text" name="subject" id="">
                    </div>

                    <div>
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="3"></textarea>
                    </div>
                    <br>


                    <div>
                        <label for="">Image</label>
                        <input type="file" name="image" id="">
                    </div>

                    <br>

                    <div>

                        <input type="submit" name="add_teacher" id="" value="Add Teacher" class="btn btn-primary">
                    </div>



                </form>
            </div>

        </center>



    </div>

</body>

</html>

</body>

</html>