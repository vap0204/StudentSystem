<!-- student -->

<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
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

$name = $_SESSION['username'];

$sql = "SELECT * FROM faculty WHERE f_name='$name' ";

$result = mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $s_name = $_POST['name'];
    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

    $query = "UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name' ";
    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:studenthome.php");
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Faculty Profile</title>

<?php

include "admin_css.php"

?>

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

</head>
<body>

	<?php

    include "faculty_sidebar.php"

    ?>


    <div class="content">
        <center>
		<h1>Faculty Profile</h1>

		<div class="div_deg">

            <form action="#" method="POST">    

                <div>
                    <h4><label>Faculty ID</label>
                    <?php echo "{$info['f_id']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Age</label>
                    <?php echo "{$info['f_age']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Gender</label>
                    <?php echo "{$info['f_gender']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Phone</label>
                    <?php echo "{$info['f_phone']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Email</label>
                    <?php echo "{$info['f_email']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Title</label>
                    <?php echo "{$info['f_title']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Department</label>
                    <?php echo "{$info['f_dept']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Payment ID</label>
                    <?php echo "{$info['pay_id']}"; ?></h4>
                </div>

                <div>
                    <h4><label>Payment Amount</label>
                    <?php echo "{$info['f_amount']}"; ?></h4>
                </div>

                <!-- <div>
                    <input type="submit" class="btn btn-success" name="update_profile" value="Update Profile" >
                </div> -->

            </form>

        </div>
        </center>

	</div>

</body>
</html>