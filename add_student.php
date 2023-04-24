<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="370project";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student'])){
        $user_name = $_POST['name'];       
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_password = $_POST['password'];
        $user_type = "student";
        $user_dept_id = $_POST['deptid'];
        $user_pay_id = $_POST['payid'];
        $user_s_amount = $_POST['samount'];

    $check = "SELECT * FROM user WHERE username = '$user_name'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if($row_count>0){
        echo "<script type='text/javascript'>
            alert('Username Already Exists. Try another');
            </script>";
    }
    else{

        $sql = "INSERT INTO user (username,email,phone,usertype,password,dept_id,pay_id,s_amount) VALUES ('$user_name','$user_email','$user_phone','$user_type','$user_password','$user_dept_id','$user_pay_id','$user_s_amount')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:view_student.php");
        }
        else{
            echo "Upload Failed";
        }
    }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

    <style type="text/css">

        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }

    </style>

<?php

include "admin_css.php"

?>

</head>
<body>

	<?php

    include "admin_sidebar.php"

    ?>


	<div class="content">
        <center>
		<h1>Add Student</h1>

		<div class="div_deg">

            <form action="#" method="POST">
                
                <div>
                    <label>Username</label>
                    <input type="text" name="name" >
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" >
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" >
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password" >
                </div>

                <div>
                    <label>Department ID</label>
                    <input type="number" name="deptid" >
                </div>

                <div>
                    <label>Payment ID</label>
                    <input type="number" name="payid" >
                </div>
                <!--
                <div>
                    <label>Student Amount</label>
                    <input type="number" name="samount" >
                </div>
                -->
                <div>
                    <input type="submit" class="btn btn-primary" name="add_student" value="Add Student" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>