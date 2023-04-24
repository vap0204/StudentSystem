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

    if($_GET['course_id']){
        $user_id = $_GET['course_id'];
    
        $sql = "SELECT * FROM course WHERE c_id='$user_id' ";

        $result = mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if (isset($_POST['update'])) {
            // $course_id = $_POST['cid'];
            $course_title = $_POST['ctitle'];
            $course_prereq = $_POST['prereq'];
            $course_credit = $_POST['credit'];
            $course_sec = $_POST['sec'];
            $course_ass = $_POST['ass'];
            $course_exam = $_POST['exmno'];
            // $user_title = $_POST['title'];
            // $user_dept = $_POST['dept'];
            

            $query = "UPDATE course SET c_title='$course_title', c_prereq='$course_prereq', c_credit='$course_credit', c_sec='$course_sec', c_ass='$course_ass', exm_no='$course_exam' WHERE c_id='$user_id' ";
            $result2=mysqli_query($data,$query);

            if($result2){
                header("location:admin_view_course.php");
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
		<h1>Update Course</h1>
        <h3>Course ID <?php echo "{$info['c_id']}"; ?></h3>

		<div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Course Title</label>
                    <input type="text" name="ctitle" value="<?php echo "{$info['c_title']}"; ?>" >
                </div>

                <div>
                    <label>Pre-req</label>
                    <input type="text" name="prereq" value="<?php echo "{$info['c_prereq']}"; ?>" >
                </div>

                <div>
                    <label>Credit</label>
                    <input type="number" name="credit" value="<?php echo "{$info['c_credit']}"; ?>" >
                </div>

                <div>
                    <label>Section</label>
                    <input type="number" name="sec" value="<?php echo "{$info['c_sec']}"; ?>" >
                </div>

                <div>
                    <label>Assignment</label>
                    <input type="number" name="ass" value="<?php echo "{$info['c_ass']}"; ?>" >
                </div>

                <div>
                    <label>Exam No</label>
                    <input type="number" name="exmno" value="<?php echo "{$info['exm_no']}"; ?>" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="update" value="Update Course" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>