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
        $user_password = $_POST['password'];
        $user_type = "faculty";
        $user_dept_id = "1";
        $user_pay_id = "1";

    $check = "SELECT * FROM user WHERE username = '$user_name'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if($row_count>0){
        echo "<script type='text/javascript'>
            alert('Username Already Exists. Try another');
            </script>";
    }
    else{

        $sql = "INSERT INTO user (username,usertype,password,dept_id,pay_id) VALUES ('$user_name','$user_type','$user_password','$user_dept_id','$user_pay_id')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:adminhome.php");
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
		<h1>Add Faculty Login Info</h1>

		<div class="div_deg">

            <form action="#" method="POST">
                
                <div>
                    <label>Faculty Name</label>
                    <input type="text" name="name" >
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_student" value="Add Student" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>