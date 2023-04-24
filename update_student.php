<!-- admin -->

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

    if($_GET['student_id']){
        $user_id = $_GET['student_id'];
    
        $sql = "SELECT * FROM user WHERE id='$user_id' ";
        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
            $user_name = $_POST['name']; //name same as from name in form
            $user_email = $_POST['email'];
            $user_phone = $_POST['phone'];
            $user_password = $_POST['password'];
            $user_dept_id = $_POST['deptid'];
            $user_pay_id = $_POST['payid'];
            $user_s_amount = $_POST['samount'];

            $query = "UPDATE user SET username='$user_name', email='$user_email', phone='$user_phone', password='$user_password', dept_id='$user_dept_id', pay_id='$user_pay_id', s_amount='$user_s_amount' WHERE id='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:view_student.php");
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
		<h1>Update Student</h1>
        <h3>Student ID <?php echo "{$info['id']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">
                
                <div>
                    <label>Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>" >
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>" >
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>" >
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>" >
                </div>

                <div>
                    <label>Department ID</label>
                    <input type="number" name="deptid" value="<?php echo "{$info['dept_id']}"; ?>" >
                </div>

                <div>
                    <label>Payment ID</label>
                    <input type="number" name="payid" value="<?php echo "{$info['pay_id']}"; ?>" >
                </div>

                <div>
                    <label>Student Amount</label>
                    <input type="number" name="samount" value="<?php echo "{$info['s_amount']}"; ?>" >
                </div>

                <div>
                    <input type="submit" class="btn btn-success" name="update" value="Update" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>