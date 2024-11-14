<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
} elseif ($_SESSION['usertype'] == 'admin') {
	header('location:index.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Student Dashboard</title>

	<?php
	include 'student_css.php';
	?>
</head>

<body>
	<?php
	include 'student_sidebar.php';
	?>
</body>

</html>