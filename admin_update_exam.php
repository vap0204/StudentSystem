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

    if($_GET['exam_id']){
        $user_id = $_GET['exam_id'];
    
        $sql = "SELECT * FROM exam WHERE exam_no='$user_id' ";

        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
             $exm_date = $_POST['edate']; //name same as from name in form
             $exm_course = $_POST['ecourse'];
             $user_gender = $_POST['gender'];
             $user_phone = $_POST['phone'];
             $user_email = $_POST['email'];
             $user_title = $_POST['title'];
             $user_dept = $_POST['dept'];
            

            $query = "UPDATE exam SET exam_date='$exm_date', exam_course='$exm_course' WHERE exam_no='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:admin_view_exam.php");
            }

        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Updating Exam Info</title>

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
		<h1>Update Exam Info</h1>
        <h3>Exam No <?php echo "{$info['exam_no']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Exam Date</label>
                    <input type="date" name="edate" value="<?php echo "{$info['exam_date']}"; ?>" >
                </div>

                <div>
                    <label>Exam Course</label>
                    <input type="text" name="ecourse" value="<?php echo "{$info['exam_course']}"; ?>" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="update" value="Update Exam" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>