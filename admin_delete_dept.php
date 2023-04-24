<?php 

session_start();


$host="localhost";

$user="root";

$password="";

$db="370project";


$data=mysqli_connect($host,$user,$password,$db);


if($_GET['dept_id']){
    $user_id = $_GET['dept_id'];           //2

    $sql = "DELETE FROM dept WHERE d_id='$user_id' ";
    $result = mysqli_query($data, $sql);
    
    if($result){
        $_SESSION['message'] = 'Data has been deleted';
        header("location:admin_view_dept.php");
    }
}


?>