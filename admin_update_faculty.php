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

    if($_GET['faculty_id']){
        $user_id = $_GET['faculty_id'];
    
        $sql = "SELECT * FROM faculty WHERE f_id='$user_id' ";

        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
            $user_name = $_POST['name'];
            $user_age = $_POST['age'];
            $user_gender = $_POST['gender'];
            $user_phone = $_POST['phone'];
            $user_email = $_POST['email'];
            $user_title = $_POST['title'];
            $user_dept = $_POST['dept'];
            $user_payid = $_POST['payid'];
            $user_famount = $_POST['famount'];
            

            $query = "UPDATE faculty SET f_name='$user_name', f_age='$user_age', f_gender='$user_gender', f_phone ='$user_phone', f_email='$user_email', f_title='$user_title', f_dept='$user_dept', pay_id='$user_payid', f_amount='$user_famount' WHERE f_id='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:admin_view_faculty.php");
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
		<h1>Update Faculty</h1>
        <h3>Faculty ID <?php echo "{$info['f_id']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Faculty Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['f_name']}"; ?>" >
                </div>

                <div>
                    <label>Age</label>
                    <input type="number" name="age" value="<?php echo "{$info['f_age']}"; ?>" >
                </div>

                <div>
                    <label>Gender</label>
                    <input type="radio" name="gender" value="Male" >Male
                    <input type="radio" name="gender" value="Female" >Female
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo "{$info['f_phone']}"; ?>" >
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['f_email']}"; ?>" >
                </div>

                 <div>
                    <label>Title</label>
                    <input type="radio" name="title" value="Lecturer" >Lecturer
                    <input type="radio" name="title" value="Associate Professor" >Associate Professor
                    <input type="radio" name="title" value="Professor" >Professor
                </div> 

                <div>
                    <label>Title</label>
                    <select name="title">
                        <option value="Lecturer" selected>Lecturer</option>
                        <option value="Associate Professor">Associate Professor</option>
                        <option value="Professor">Professor</option>
                    </select>
                </div>

               
                <div>
                    <label>Department</label>
                    <input type="radio" name="dept" value="CSE" >CSE
                    <input type="radio" name="dept" value="EEE" >EEE
                    <input type="radio" name="dept" value="BBA" >BBA
                    <input type="radio" name="dept" value="ENG" >ENG
                    <input type="radio" name="dept" value="ARC" >ARC
                </div>

                <div>
                    <label>Payment ID</label>
                    <input type="number" name="payid" value="<?php echo "{$info['pay_id']}"; ?>" >
                </div>

                <div>
                    <label>Faculty Amount</label>
                    <input type="number" name="famount" value="<?php echo "{$info['f_amount']}"; ?>" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="update" value="Update Faculty" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>