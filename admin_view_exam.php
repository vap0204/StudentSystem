<!-- admin -->

<?php


error_reporting(0);
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "370project";

    $data= mysqli_connect($host,$user,$password,$db);

    $sql = "SELECT * FROM exam ";   // WHERE usertype= 'student' 
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin View Exam Info</title>

<?php

include "admin_css.php"

?>

<style type = "text/css">

    .table_th 
    {
        padding: 20px;
        font-size: 20px;
    }
    .table_td 
    {
        padding: 20px;
        background-color: skyblue;

    }
</style>


</head>
<body>

	<?php

    include "admin_sidebar.php"

    ?>




	<div class="content">

        <center>

		<h1>Exam Info </h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

    <br><br>
        <table border="1px">
            <tr>
                <th class = "table_th">Exam No</th>
                <th class = "table_th">Exam Date</th>
                <th class = "table_th">Exam Course</th>
                <th class = "table_th">Delete</th>
                <th class = "table_th">Update</th>
                
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>
                <td class = "table_td"> 
                    <?php echo"{$info['exam_no']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['exam_date']}"; ?>
                </td>
                
                <td class = "table_td"> 
                    <?php echo"{$info['exam_course']}"; ?>
                </td>



                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('delete this exam data'); \" href='admin_delete_exam.php?exam_id={$info['exam_no']}'>Delete</a>"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-primary' href='admin_update_exam.php?exam_id={$info['exam_no']}'>Update</a>"; ?>
                </td>

            </tr>

            <?php
            }
            ?>
        </table>
        </center>



	</div>

</body>
</html>