<?php 
include 'core/init.php';
include 'includes/overall/header.php';
$user_id = $_SESSION['user_id'];

?>
     <h1>Home</h1>
     

<?php 
if(logged_in()===true){
	
	if(has_access($user_id,1)==true){
	 header('location: admin.php');
	 exit;
     	} else if(has_access($user_id,2)==true){
				header('location:faculty.php');
				exit;
		
		}else{
				echo '
						<nav>
							<ul>
								<li><a href="courses.php">View Course Updates</a></li>
								<li><a href="result.php">View Result</a></li>
								<li><a href="exams.php">View Exam Time Table</a></li>
							<ul>
						</nav>
					';
		}

}
include 'includes/overall/footer.php';

?>