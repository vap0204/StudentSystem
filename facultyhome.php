<?php

session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Faculty Dashboard</title>

<?php

include "admin_css.php"

?>

</head>
<body>

	<?php

    include "faculty_sidebar.php"

    ?>


	<div class="content">
		
		<h1>Faculty Dashboard</h1>
		
		<!-- <input type="text" name=""> -->


	</div>

</body>
</html>