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

    if(isset($_POST['add_exam'])){                                         
        $exm_date = $_POST['examdate'];
        $exm_course = $_POST['examcourse'];
        $sql = "INSERT INTO exam (exam_date,exam_course) VALUES ('$exm_date','$exm_course')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:admin_view_exam.php");
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
	<title>Admin ADD Exam Info</title>

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
		<h1>Add Exam Info</h1>

		<div class="div_deg">

            <form action="#" method="POST">
                <div>
                    <label>Exam Date</label>
                    <input type="date" name="examdate" >
                </div>

                <div>
                    <label>Exam Course</label>
                    <input type="text" name="examcourse" >
                </div>
                
                <div>
                    <input type="submit" class="btn btn-primary" name="add_exam" value="Add Exam" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>