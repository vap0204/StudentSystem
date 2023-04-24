<?php 
session_start();


$host="localhost";

$user="root";

$password="";

$db="370project";


$data=mysqli_connect($host,$user,$password,$db);


if($_GET['course_id']){
    $user_id = $_GET['course_id'];

    $sql = "DELETE FROM course WHERE c_id='$user_id' ";
    $result = mysqli_query($data, $sql);
    
    if($result){
        $_SESSION['message'] = 'Data has been deleted';
        header("location:admin_view_course.php");
    }
}


?>