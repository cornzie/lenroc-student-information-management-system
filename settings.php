<?php 
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';

if(empty($_POST)===false){
 	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
			$errors[]='A valid email is required';
		}else if(email_exist($_POST['email'])===true && $user_data['email'] !== $_POST['email']){
			$errors[]='Sorry, the email \''.$_POST['email'].'\' already exixts';
		}
		
}
?>

<h1>Settings</h1>

<?php

if(isset($_GET['success'])===true && empty($_GET['success'])===true){
	echo 'Your details have been successfully updated';
} else{
	if(empty($_POST)===false && empty($errors)=== true){
	
	$update_data=array(
			'firstname'					=>	$_POST['firstname'],
			'lastname'					=>	$_POST['lastname'],
			'email'						=>	$_POST['email'],
			'faculty'					=>	$_POST['faculty'],
			'department'				=>	$_POST['department'],
			'course_of_study'			=>	$_POST['course_of_study'],
			'year_of_graduation'		=>	$_POST['year_of_graduation'],
			'sex'						=>	$_POST['sex'],
			'hostel'					=>	$_POST['hostel'],
			);
			
			update_user($session_user_id, $update_data);
			header('location: settings.php?success');
			exit();
	
	} else if(empty($errors)===false){
	echo output_errors($errors);
	
	}
?>
<form action="" method="post">
	<ul>
        <li>
            First name:<br />
            <input type="text" name="firstname" value="<?php echo $user_data['firstname'] ?>"/>
        </li>
        <li>
            Last name:<br />
            <input type="text" name="lastname" value="<?php echo $user_data['lastname'] ?>"/>
        </li>
        <li>
            email:<br />
            <input type="text" name="email" value="<?php echo $user_data['email'] ?>"/>
        </li>
        <li>
            <input type="submit" value="Update" />
        </li>
    </ul>
</form>

<?php
}
include 'includes/overall/footer.php';
?>