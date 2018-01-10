<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
$user_id=$_SESSION['user_id'];


?>

<h2>Register</h2>
      <nav>
    	<ul>
            <li><a href="courses.php?type=courseregistration">Register Courses</a></li>
         <ul>
    </nav>
<p></p>
	 <p>
     <?php
	 
	 
	 	if(isset($_GET['type']) && !empty($_GET['type'])){

	$sql = "SELECT * FROM `course` WHERE `active`='a'";
	$result = mysql_query($sql)or die(mysql_error());
	
	?>
    <table>
	<tr><th>COURSE CODE</th><th>COURSE TITLE</th><th>COURSE UNIT</th><th>SEMESTER</th><th>LEVEL</th></tr>
	<?php
	while($row = mysql_fetch_array($result)){
	$course_code		= $row['course_code'];
	$course_title		= $row['course_title'];
	$course_unit		= $row['course_unit'];
	$semester			= $row['semester'];
	$level				= $row['level'];
	?>
	<tr>
			<td ><?php echo $course_code; ?></td>
			<td ><?php echo $course_title; ?></td>
			<td><?php echo $course_unit; ?></td>
			<td><?php echo $semester; ?></td>
			<td><?php echo $level; ?></td>
			<td>
			<?php
			
				echo "<a href='courseregistration.php?course_code=$course_code&active=$active'>Register</a>";
			?>
            </td>
		</tr>
        <?php
	} // End our while loop

		} else{
			echo 'Select from the menu above!';
		}
		?>
        </table>
</p>

<?php
include 'includes/overall/footer.php';
?>