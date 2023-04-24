<!-- admin -->

<?php

error_reporting(0);
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "370project";

    $data= mysqli_connect($host,$user,$password,$db);

    $name = $_SESSION['username'];

    $sql = "SELECT * FROM student_course WHERE st_name = '$name' ";   // a 
    $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Dashboard</title>

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

    include "student_sidebar.php"

    ?>




	<div class="content">

        <center>

		<h1>Enrolled Course </h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

        <br><br>
        <table border="1px">
            <tr>
                <th class = "table_th">Student Name</th>
                <th class = "table_th">1st Course</th>
                <th class = "table_th">2nd Course</th>
                <th class = "table_th">3rd Course</th>
                <!-- <th class = "table_th">Delete</th> -->
                <!-- <th class = "table_th">Update</th> -->
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>
                <td class = "table_td"> 
                    <?php echo"{$info['st_name']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['st_course1']}"; ?>
                </td>
                
                <td class = "table_td"> 
                    <?php echo"{$info['st_course2']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['st_course3']}"; ?>
                </td>

                <!-- <td class = "table_td"> 
                    <?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('delete this faculty data'); \" href='admin_delete_payment.php?payment_id={$info['p_id']}'>Delete</a>"; ?>
                </td> -->

                <!-- <td class = "table_td"> 
                    <?php echo "<a class='btn btn-primary' href='admin_update_payment.php?payment_id={$info['p_id']}'>Update</a>"; ?>
                </td> -->

            </tr>

            <?php
            }
            ?>
        </table>
        </center>



	</div>

</body>
</html>