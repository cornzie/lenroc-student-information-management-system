<?php 
include 'core/init.php';
protect_page();
faculty_protect();
include 'includes/overall/header.php';
//$user_id = $_SESSION['user_id'];

$course_code = $_GET['course_code'];
$active = $_GET['active'];

if($active=='d'){
	mysql_query("UPDATE `course` SET `active`= 'a' WHERE `course_code`= '$course_code'");
	header('location: faculty.php?type=coursesettings');
	
} else if($active=='a'){
	mysql_query("UPDATE `course` SET `active`= 'd' WHERE `course_code`= '$course_code'");
	header('location: faculty.php?type=coursesettings');
}

?>
 
		
<?php
include 'includes/overall/footer.php';

?>