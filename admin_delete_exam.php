<?php 

session_start();


$host="localhost";

$user="root";

$password="";

$db="370project";


$data=mysqli_connect($host,$user,$password,$db);


if($_GET['exam_id']){
    $user_id = $_GET['exam_id'];

    $sql = "DELETE FROM exam WHERE exam_no='$user_id' ";
    $result = mysqli_query($data, $sql);
    
    if($result){
        $_SESSION['message'] = 'Data has been deleted';
        header("location:admin_view_exam.php");
    }
}


?>