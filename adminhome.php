<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:index.php');
}








?>
















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <?php
    include 'admin_css.php';
    ?>
</head>

<body>
    <?php

    include 'admin_sidebar.php';

    ?>


    <div class="content">

        <h1>Admin Dashboard</h1>


    </div>

</body>

</html>

</body>

</html>