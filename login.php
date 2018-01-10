<?php
include 'core/init.php';
logged_in_redirect();


if(empty($_POST)===false){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if( empty($username)===true||empty($password)===true){
		$errors[]='please enter a username and password';
	}
	else if(user_exist($username)===false){
		$errors[]='we cannot find that username. Have you registered?';
	}
	else if(user_active($username)===false){
		$errors[]='You haven\'t activated your account!';
	}
	else{
		$login=login($username, $password);
		if($login===false){
			$errors[]='The username/password cobination is incorrect';
	}
	else{
	$_SESSION['user_id'] = $login;
	header('location:index.php');
	exit();
	}
	}

} else{
$errors[]='No data recieved.';
}
include 'includes/overall/header.php';
if(empty($errors)===false){
?>
	<h2>We tried to log you in but...</h2>
<?php
echo output_errors($errors);
}
include 'includes/overall/footer.php'
?>