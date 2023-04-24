<!-- student -->

<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
        header("location:login.php");
    }

$host="localhost";
$user="root";
$password="";
$db="370project";

$data=mysqli_connect($host,$user,$password,$db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username='$name' ";

$result = mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    // $s_name = $_POST['name']; //name same as from name in form
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
	<title>Student Profile</title>

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

    include "student_sidebar.php"

    ?>


    <div class="content">
        <center>
		<h1>Update Profile</h1>

        <div>
            <h4><label>Student ID</label>
            <?php echo "{$info['id']}"; ?></h4>
        </div>

		<div class="div_deg">

            <form action="#" method="POST">    
                
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
                    <input type="submit" class="btn btn-success" name="update_profile" value="Update Profile" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>