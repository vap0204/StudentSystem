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

    $sql = "SELECT * FROM course" ;      
    // a WHERE st_name = '$name' "
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

		<h1>Department Courses</h1>

        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

        unset($_SESSION['message']);

        ?>

        <br><br>
        <table border="1px">
            <tr>
                <th class = "table_th">Department</th>
                <th class = "table_th">Course</th>
                <!-- <th class = "table_th">Course</th> -->
                <!-- <th class = "table_th">Course</th> -->
                <!-- <th class = "table_th">Delete</th> -->
                <!-- <th class = "table_th">Update</th> -->
            </tr>

            <?php
            while($info =$result->fetch_assoc())

            {


            ?>

            <tr>

                <td class = "table_td"> 
                    <?php
                    $t = $info['c_title'];
                    // echo $t[1];
                    if ($t[0] == "c" and $t[1] == "s" and $t[2] == "e") {
                        echo "CSE";
                    }
                    elseif ($t[0] == "C" and $t[1] == "S" and $t[2] == "E") {
                        echo "CSE";
                    }

                    elseif ($t[0] == "e" and $t[1] == "e" and $t[2] == "e") {
                        echo "EEE";
                    }
                    elseif ($t[0] == "E" and $t[1] == "E" and $t[2] == "E") {
                        echo "EEE";
                    }

                    elseif ($t[0] == "b" and $t[1] == "b" and $t[2] == "a") {
                        echo "BBA";
                    }
                    elseif ($t[0] == "B" and $t[1] == "B" and $t[2] == "A") {
                        echo "BBA";
                    }

                    elseif ($t[0] == "e" and $t[1] == "n" and $t[2] == "g") {
                        echo "ENG";
                    }
                    elseif ($t[0] == "E" and $t[1] == "N" and $t[2] == "G") {
                        echo "ENG";
                    }

                    elseif ($t[0] == "a" and $t[1] == "r" and $t[2] == "c") {
                        echo "ARC";
                    }
                    elseif ($t[0] == "A" and $t[1] == "R" and $t[2] == "C") {
                        echo "ARC";
                    }

                    elseif ($t[0] == "p" and $t[1] == "h" and $t[2] == "r") {
                        echo "PHR";
                    }
                    elseif ($t[0] == "P" and $t[1] == "H" and $t[2] == "R") {
                        echo "PHR";
                    }
                    ?>
                </td>

                <td class = "table_td"> 
                    <?php echo"{$info['c_title']}"; ?>
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