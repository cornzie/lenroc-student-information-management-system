<?php 
include 'core/init.php';
admin_protect();
include 'includes/overall/header.php';

$user_id = $_SESSION['user_id'];

$username = $user_data['username'];

$course_code = $_GET['course_code'];
$active = $_GET['active'];

	mysql_query("INSERT INTO `lenroc_ssims`.`registercourses` (`user_id`, `username`, `course_code`) VALUES ('$user_id', '$username', '$course_code')");
	header('location: courses.php?type=courseregistration');
?>

<?php 
include 'includes/overall/footer.php';

?>