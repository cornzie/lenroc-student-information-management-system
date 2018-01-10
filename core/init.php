<?php

session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

$current_file= explode('/',$_SERVER['SCRIPT_NAME']);
$current_file= end($current_file);

if(logged_in()===true){
	$session_user_id=$_SESSION['user_id'];
	$user_data= user_data($session_user_id, 'user_id', 'username', 'password', 'firstname', 'lastname', 'email', 'password_recover', 'type','profile','faculty','department','course_of_study','year_of_admission','hostel');
	
	if(user_active($user_data['username'])===false){
	session_destroy();
	header('location:index.php');
	exit();
	}
	if($current_file!=='changepassword.php' && $current_file!== 'logout.php' && $user_data['password_recover']==1){
	header('Location: changepassword.php');
	exit();
	}
}

$errors= array();
?>