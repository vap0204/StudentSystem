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

    $sql = "SELECT * FROM faculty ";   // WHERE usertype= 'student' 
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

		<h1>Faculty Data </h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

    <br><br>
        <table border="1px">
            <tr>
                <th class = "table_th">Faculty ID</th>
                <th class = "table_th">Faculty Name</th>
                <th class = "table_th">Age</th>
                <th class = "table_th">Gender</th>
                <th class = "table_th">Phone</th>
                <th class = "table_th">Email</th>
                <th class = "table_th">Title</th>
                <th class = "table_th">Department</th>
               <!-- <th class = "table_th">Payment ID</th>
                <th class = "table_th">Faculty Amount</th>
        -->
                <th class = "table_th">Delete</th>
                <th class = "table_th">Update</th>
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>
                <td class = "table_td"> 
                    <?php echo"{$info['f_id']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['f_name']}"; ?>
                </td>
                
                <td class = "table_td"> 

                    <?php echo"{$info['f_age']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['f_gender']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['f_phone']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['f_email']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['f_title']}"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['f_dept']}"; ?>
                </td>

                


                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('delete this faculty data'); \" href='admin_delete_faculty.php?faculty_id={$info['f_id']}'>Delete</a>"; ?>
                </td>

                <td class = "table_td"> 
                    <?php echo "<a class='btn btn-primary' href='admin_update_faculty.php?faculty_id={$info['f_id']}'>Update</a>"; ?>
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