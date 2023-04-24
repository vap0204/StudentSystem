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

    if($_GET['dept_id']){
        $user_id = $_GET['dept_id'];
    
        $sql = "SELECT * FROM dept WHERE d_id='$user_id' ";

        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
            $dep_build = $_POST['buildno']; 
            $dep_name = $_POST['dept'];
             $user_gender = $_POST['gender'];
            $user_phone = $_POST['phone'];
            $user_email = $_POST['email'];
            $user_title = $_POST['title'];
            $user_dept = $_POST['dept'];
            

            $query = "UPDATE dept SET d_build_no='$dep_build', d_name='$dep_name' WHERE d_id='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:admin_view_dept.php");
            }

        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Updating Dept Info</title>

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
		<h1>Update Dept Info</h1>
        <h3>Department ID <?php echo "{$info['d_id']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Department Building</label>
                    <input type="text" name="buildno" value="<?php echo "{$info['d_build_no']}"; ?>" >
                </div>

                <div>
                    <label>Department Name</label>
                    <input type="radio" name="dept" value="CSE" >CSE
                    <input type="radio" name="dept" value="EEE" >EEE
                    <input type="radio" name="dept" value="BBA" >BBA
                    <input type="radio" name="dept" value="ENG" >ENG
                    <input type="radio" name="dept" value="ARC" >ARC
                    <input type="radio" name="dept" value="CIVIL" >CIVIL
                    <input type="radio" name="dept" value="MECHA" >MECHA
                    <input type="radio" name="dept" value="PHR" >PHR
                </div><br>

                <div>
                    <input type="submit" class="btn btn-primary" name="update" value="Update Department" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>