<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}


elseif($_SESSION['usertype']=='student'){
    header('location:index.php');
}



$host="localhost";
$user="root";
$password= "";
$db= "collegeproject";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST["add_student"])){

    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="student";

    $check = "SELECT * FROM user WHERE username='$username' OR email='$user_email'";
$check_user = mysqli_query($data, $check);

$row_count = mysqli_num_rows($check_user);

if ($row_count > 0) {
    echo "<script type='text/javascript'>
        alert('Username or Email Already Exists. Try another Username or Email');
    </script>";
} else 


{

    



    $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";


    $result=mysqli_query($data,$sql);
    if($result)
    {
        echo "<script type='text/javascript'>
        alert('Data Upload Success');
        </script>";
    }
    else{
        echo "Upload Failed";
    }
}
}




?>
















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style type="text/css">

        label{
           display: inline-block; 
           text-align: right;
           width: 100px;
           padding-top:10px;
           padding-bottom: 10px;
        }
        .div-deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

	<?php
    include'admin_css.php';
    ?>
</head>
<body>
<?php

include'admin_sidebar.php';

?>


	<div class="content">
        <center>
		
		<h1>Add Student</h1>

        <div class="div-deg">
            <form action="#" method="POST">
                <div >
                    <label >Username</label>
                    <input type="text" name="name" id="" required>
                </div>

                <div>
                    <label >Email</label>
                    <input type="email" name="email" id="" required>
                </div>

                <div>
                    <label >Phone</label>
                    <input type="text" name="phone" id="" required>
                </div>


                <div>
                    <label >Password</label>
                    <input type="text" name="password" id="" required>
                </div>

                <div>
                    
                    <input type="submit"       class="btn btn-primary"  name="add_student" value="Add Student">
                </div>
            </form>
        </div>

    </center>


	</div>

</body>
</html>
    
</body>
</html>