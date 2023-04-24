<!-- admin -->


<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    else if($_SESSION['usertype']=='student'){
        header("location:login.php");
    }

    $host="localhost";

    $user="root";

    $password="";

    $db="370project";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_faculty'])){                                         
        $t_name = $_POST['name'];
        $t_age = $_POST['age'];
        $t_gender = $_POST['gender'];
        $t_phone = $_POST['phone'];
        $t_email = $_POST['email'];
        $t_title = $_POST['title'];
        $t_dept = $_POST['dept'];
        $t_payid = $_POST['payid'];
        $t_payamount = $_POST['payamount'];
  

        $sql = "INSERT INTO faculty (f_name,f_age,f_gender,f_phone,f_email,f_title,f_dept,pay_id,f_amount) VALUES ('$t_name','$t_age','$t_gender','$t_phone','$t_email','$t_title','$t_dept','$t_payid','$t_payamount')";

        $result = mysqli_query($data, $sql);

        if($result){
            header("location:admin_view_faculty.php");
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
	<title>Admin ADD Faculty</title>

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
		<h1>Add Faculty</h1>

		<div class="div_deg">

            <form action="#" method="POST">
                
                <div>
                    <label>Faculty Name</label>
                    <input type="text" name="name" >
                </div>

                <div>
                    <label>Age</label>
                    <input type="number" name="age" >
                </div>

                <div>
                    <label>Gender</label>
                    <input type="radio" name="gender" value="Male" >Male
                    <input type="radio" name="gender" value="Female" >Female
                </div>

                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" >
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" >
                </div>

             

                <div>
                    <label>Title</label>
                    <select name="title">
                        <option value="Lecturer" selected>Lecturer</option>
                        <option value="Professor">Professor</option>
                    </select>
                </div>

                <div>
                    <label>Department</label>
                    <input type="radio" name="dept" value="SEO" >SEO
                    <input type="radio" name="dept" value="MATH" >MATH
                    <input type="radio" name="dept" value="BG" >BG
                    <input type="radio" name="dept" value="ENG" >ENG
                    <input type="radio" name="dept" value="ARC" >ARC
                </div>

               
                <div>
                    <input type="submit" class="btn btn-primary" name="add_faculty" value="Add Faculty" >
                </div>

            </form>

        </div>
        </center>

	</div>

</body>
</html>