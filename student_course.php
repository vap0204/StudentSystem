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

    $sql = "SELECT * FROM course";                   // WHERE username='$name' 

    $result = mysqli_query($data,$sql);

//  2nd part

    $name = $_SESSION['username'];

    if(isset($_POST['student_add_course'])){                                         
        $course_1 = $_POST['course1'];
        $course_2 = $_POST['course2'];
        $course_3 = $_POST['course3'];
        // $t_age = $_POST['age'];
        // $t_gender = $_POST['gender'];
        // $user_type = "faculty";

        $sql2 = "INSERT INTO student_course (st_name,st_course1,st_course2,st_course3) VALUES ('$name','$course_1','$course_2','$course_3')";

        $result2 = mysqli_query($data, $sql2);

        if($result2){
            // echo "<script type='text/javascript'>
            // alert('Data Uploaded Successfully');
            // </script>";
            header("location:student_enrolled_course.php");
        }
        else{
            echo "Upload Failed";
        }
    
    }


?>

<!-- student -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Dashboard</title>

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

    include "student_sidebar.php"

    ?>


	<div class="content">
		<h1>All Available Courses</h1>
	</div>

    <div class="content">

		<div class="row">

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>

			<div class="col-md-4">

				<h2><?php echo "{$info['c_title']}" ?></h3>

			</div>
			
            <?php
            }
            ?>

		</div>

<!-- 2nd part -->

        <div>
            <center>
            <h1>Add Courses</h1>

            <div class="div_deg">

                <form action="#" method="POST">
                    
                    <div>
                        <label>1st Course</label>
                        <input type="text" name="course1" >
                    </div>

                    <div>
                        <label>2nd Course</label>
                        <input type="text" name="course2" >
                    </div>

                    <div>
                        <label>3rd Course</label>
                        <input type="text" name="course3" >
                    </div>
                    
                    <div>
                        <input type="submit" class="btn btn-primary" name="student_add_course" value="Add course" >
                    </div>

                </form>

            </div>
            </center>

        </div>

	</div>

</body>
</html>