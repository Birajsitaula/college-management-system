

<?php

error_reporting(0);
session_start();


$host = "localhost";

$user = "root";

$password = "";

$db = "collegeproject";


$data = mysqli_connect($host, $user, $password, $db);


if ($data === false) {
	die("connection error");
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['username'];
	$pass = $_POST['password'];
	$category = $_POST['category']; // Get selected category


	// This is the test for the remember me. So, let's do this 

	if ($user) {
		// If "Remember Me" checkbox is checked
		if (isset($_POST["remember"])) {
			// Set cookies with username, password, and category
			setcookie("username", $username, time() + (86400 * 30), "/"); // 30 days expiration
			setcookie("password", $password, time() + (86400 * 30), "/");
			setcookie("category", $category, time() + (86400 * 30), "/");
		}
	}



	// This is the end of  the test of the remember me. So, let's close this 

	// Perform validation here (e.g., sanitize input, prevent SQL injection)

	// Query database
	$sql = "SELECT * FROM user WHERE username='$name' AND password='$pass' AND usertype='$category'";
	$result = mysqli_query($data, $sql);

	// Check if user exists with given username, password, and category
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $name;
		$_SESSION['usertype'] = $category;

		// Redirect based on user type
		// if ($category == "student") {
		//     header("location: studenthome.php");
		// } elseif ($category == "teacher") {
		//     header("location: teacherhome.php");
		// } elseif ($category == "admin") {
		//     header("location: adminhome.php");
		// }

		if ($category == "Admin") {
			header("location:adminhome.php");
		} elseif ($category == "student") {
			header("location:studenthome.php");
		}
	} else {
		// User authentication failed
		$message = "Username, password, or category do not match";
		$_SESSION['loginMessage'] = $message;
		header("location: index.php");
	}
}
