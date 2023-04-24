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

    $sql = "SELECT * FROM course ";   // WHERE usertype= 'student' 
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

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

		<h1>Course Data </h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

    <br><br>
        <table border="1px">
            <tr>
                <th class = "table_th">Course ID</th>
                <th class = "table_th">Course Title</th>
                <th class = "table_th">Pre-req</th>
                <th class = "table_th">Credit</th>
                <th class = "table_th">Section</th>
                <th class = "table_th">Assignment</th>
                <th class = "table_th">Exam No</th>
                <th class = "table_th">Delete</th> 
                <th class = "table_th">Update</th>
                
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>
                <td class = "table_td"> 
                    <?php echo"{$info['c_id']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['c_title']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['c_prereq']}"; ?>
                </td>
                
                <td class = "table_td"> 
                    <?php echo"{$info['c_credit']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['c_sec']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['c_ass']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['exm_no']}"; ?>
                </td>


                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('delete this course data'); \" href='admin_delete_course.php?course_id={$info['c_id']}'>Delete</a>"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-primary' href='admin_update_course.php?course_id={$info['c_id']}'>Update</a>"; ?>
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