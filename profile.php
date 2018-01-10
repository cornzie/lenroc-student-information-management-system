<?php 
include 'core/init.php';
include 'includes/overall/header.php';

if(isset($_GET['username'])=== true && empty($_GET['username'])===false){
	$username=$_GET['username'];
	if(user_exist($username)===true){
		$user_id = user_id_from_username($username);
		$profile_data= user_data($user_id, 'firstname', 'lastname', 'email', 'username','faculty','department','course_of_study','year_of_admission','hostel');
		
		?>
        <h1><?php echo $profile_data['firstname'].' '.$profile_data['lastname']; ?>'s Profile</h1>
        <p>
            <b>Matric Number:</b> <?php echo $profile_data['username']; ?> </br>
            <b>Email address:</b> <?php echo $profile_data['email']; ?></br>
            <b>Faculty:</b> <?php echo $profile_data['faculty']; ?></br>
            <b>Department:</b> <?php echo $profile_data['department']; ?></br>
            <b>Course of study:</b> <?php echo $profile_data['course_of_study']; ?></br>
            <b>Estimated Year of Graduation:</b> <?php echo $profile_data['year_of_admission']+4; ?></br>
            <b>Hostel and room number:</b> <?php echo $profile_data['hostel']; ?></br>
            <b>Medical records:</b></br>
            <b>Financial records:</b></br>
            <b>Library records:</b></br>
            <b>Transcript options:</b></br>
        <p>
        <?php
	}else{
		echo 'Sorry, that user doesn\'t exist!';
	}	
} else{
	header('location:index.php');
	exit();
}
include 'includes/overall/footer.php';
?>