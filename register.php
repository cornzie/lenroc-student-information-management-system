<?php
include 'core/init.php';
admin_protect();
//protect_page();
include 'includes/overall/header.php';
$user_id=$_SESSION['user_id'];

if(empty($_POST)===false){
	$required_fields= array('username','password','password_again','firstname','lastname','email','faculty','department','sex');
		foreach($_POST as $key=>$value){
			if(empty($value) && in_array($key, $required_fields) === true){
			$errors[]= 'fields marked with asterisk* are required';
			break 1; 
			}
		}
		if(empty($errors)===true){
			if(user_exist($_POST['username'])===true){
			$errors[]='Sorry, the username \''.$_POST['username'].'\' already exixts';
			}
		if(preg_match("/\\s/",$_POST['username'])== true){
			$errors[]='Your username must not contain spaces';
		}
		if (strlen($_POST['password']<6)===true){
			$errors[]='Sorry, your password must be atleast 6 characters';
		}
		if($_POST['password']!== $_POST['password_again']){
			$errors[]='These keyboards can be annoying, But... Sorry, your passwords do not match';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
			$errors[]='A valid email is required';
		}
		if(email_exist($_POST['email'])===true){
			$errors[]='Sorry, the email \''.$_POST['email'].'\' already exixts';
			}
		
		}

}
?>

<h2>Register</h2>
<p style="color:#FF3333"><b>Please, For students registration, use their matric numbers in the field for username</b></p>

<?php

if(isset($_GET['success']) && empty($_GET['success'])){
	echo 'You have been successfully registered! please check your email to activate your account';
}
else{
		if(empty($_POST)===false && empty($errors)===true){
		$register_data=array(
			'username'				=>	$_POST['username'],
			'password'				=>	$_POST['password'],
			'firstname'				=>	$_POST['firstname'],
			'lastname'				=>	$_POST['lastname'],
			'email'					=>	$_POST['email'],
			'email_code'			=>	md5($_POST['username']+microtime()),
			'faculty'				=>	$_POST['faculty'],
			'department'			=>	$_POST['department'],
			'course_of_study'		=>	$_POST['course_of_study'],
			'year_of_admission'	=>	$_POST['year_of_admission'],
			'sex'					=>	$_POST['sex'],
			'hostel'				=>	$_POST['hostel'],
			'type'					=>	$_POST['type']
		
			);
			register_user($register_data);
			header('location: register.php?success');
			exit();
		}
		else if(empty($errors)===false){
		echo output_errors($errors);
		}
	?>
	
	<form action="" method="post">
		<ul>
			<li>
			Username*:<br />
			<input type="text" name="username" />
			</li>
			<li>
			Password*:<br />
			<input type="password" name="password" />
			</li>
			<li>
			Password again*:<br />
			<input type="password" name="password_again" />
			</li>
			<li>
			First name*:<br />
			<input type="text" name="firstname" />
			</li>
			<li>
			Last name*:<br />
			<input type="text" name="lastname" />
			</li>
			<li>
			Email*:<br />
			<input type="text" name="email" />
			</li>
            <li>
            Faculty:<br />
            <select name="faculty">
           		<option value= "Arts">Faculty of Arts</option>
                <option value= "Business and social sciences">Faculty of Business and Social Sciences</option>
                <option value= "sciences">Faculty of Sciences</option>
                <option value= "law">Faculty of Law</option>
            </select>
        </li>
        <li>
            Department:<br />
            <select name="department">
            	<option value= "">Null</option>
                <option value= "computer sci and Maths">Computer Sci and Maths</option>
                <option value= "basic science">Basic sciences</option>
                <option value= "religious studies">religious studies</option>
                <option value= "english and literary studies">english and literary studies</option>
                <option value= "history and intl rel">history and intl rel</option>
            </select>
        </li>
        <li>
            Course of study:<br />
            <select name="course_of_study">
            	<option value= "">Null</option>
                <option value= "1">Computer Science</option>
                <option value= "comp info sys">Computer Sci and Maths</option>
                <option value= "2">Biochemistry</option>
                <option value= "2">microbiology</option>
                <option value= "religious studies">religious studies</option>
                <option value= "english and literary studies">english and literary studies</option>
                <option value= "history and intl rel">history and intl rel</option>
            </select>
        </li>
         <li>
            Year of Admission:<br />
            <input type="text" name="year_of_admission"/>
        </li>
        <li>
            Sex:<br />
            <input type="radio" name="sex" value="male"/> Male <input type="radio" name="sex" value="female"/> Female
        </li>
         <li>
            Hostel:<br />
            <select name="hostel">
           		<option value= "male hall">Male hall</option>
                <option value= "female hall">Female hall</option>
            </select>
        </li>
        <li>
            Account Type: <br />
            <input type="radio" name="type" value="2"/>Faculty Officer  <input type="radio" name="type" value="3"/> Lecturer <input type="radio" name="type" value="4"/> Faculty Admin <input type="radio" name="type" value="5"/> Student
        </li>
        <li>
			<input type="submit" value="Register" />
		</li>
		</ul>
	</form>
<?php
}
include 'includes/overall/footer.php';
?>