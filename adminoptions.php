<?php 
include 'core/init.php';
admin_protect();
include 'includes/overall/header.php';

//$user_id = $_SESSION['user_id'];

$user_id = $_GET['user_id'];
$active = $_GET['active'];

if($active=='d'){
	mysql_query("UPDATE `users` SET `active`= 'a' WHERE `user_id`= '$user_id'");
	header('location: admin.php?type=user');
	
} else if($active=='a'){
	mysql_query("UPDATE `users` SET `active`= 'd' WHERE `user_id`= '$user_id'");
	header('location: admin.php?type=user');
}
?>

<?php 
include 'includes/overall/footer.php';

?>