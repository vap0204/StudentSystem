<?php 


session_start();


$host="localhost";

$user="root";

$password="";

$db="370project";


$data=mysqli_connect($host,$user,$password,$db);


if($_GET['student_id']){
    $user_id = $_GET['student_id'];

    $sql = "DELETE FROM user WHERE id='$user_id' ";
    $result = mysqli_query($data, $sql);
    
    if($result){
        $_SESSION['message'] = 'Data has been deleted';
        header("location:view_student.php");
    }
}


?>