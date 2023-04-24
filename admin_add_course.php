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

    if(isset($_POST['add_course'])){
        $course_title = $_POST['ctitle'];        //name same as from name in form
        $course_prereq = $_POST['prereq'];
        $course_credit = $_POST['credit'];
        $course_sec = $_POST['sec'];
        $user_type = "student";
        $course_ass = $_POST['ass'];
        $course_exm = $_POST['exmno'];

        $sql = "INSERT INTO course (c_title,c_prereq,c_credit,c_sec,c_ass,exm_no) VALUES ('$course_title','$course_prereq','$course_credit','$course_sec','$course_ass','$course_exm')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:admin_view_course.php");
            echo "<script type='text/javascript'>
             alert('Data Uploaded Successfully');
            </script>";
        }
        else{
            echo "Upload Failed";
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
		<h1>Add Course</h1>

		<div class="div_deg">

            <form action="#" method="POST">
                
                <div>
                    <label>Course Title</label>
                    <input type="text" name="ctitle" >
                </div>

                <div>
                    <label>Discipline</label>
                    <input type="text" name="prereq" >
                </div>

                <div>
                    <label>Credit</label>
                    <input type="number" name="credit" >
                </div>

                <div>
                    <label>Section</label>
                    <input type="number" name="sec" >
                </div>

                <div>
                    <label>Assignment</label>
                    <input type="number" name="ass" >
                </div>

                <div>
                    <label>Exam No</label>
                    <input type="number" name="exmno" >
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_course" value="Add Course" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>