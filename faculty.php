<?php 
include 'core/init.php';
protect_page();
faculty_protect();
include 'includes/overall/header.php';
$user_id = $_SESSION['user_id'];
?>

<h1>FACULTY STAFF</h1>
      <nav>
    	<ul>
        	<li><a href="faculty.php?type=coursesettings">Activate Courses</a></li>
         <ul>
    </nav>
    <p></p>
 <p>
 <?php
     include 'includes/faculty/activateincludes.php';
	 ?>
</p>
		
<?php
include 'includes/overall/footer.php';
?>