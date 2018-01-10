<?php
	 	if(isset($_GET['type']) && !empty($_GET['type'])){

	$sql = "SELECT * FROM `course`";
	$result = mysql_query($sql)or die(mysql_error());
	
	?>
    <table>
	<tr><th>COURSE CODE</th><th>COURSE TITLE</th><th>UNIT</th><th>SEMESTER</th><th>LEVEL</th><th>COURSE ACTIVE</th><th>OPTIONS</th></tr>
	<?php
	while($row = mysql_fetch_array($result)){
	$course_code		= $row['course_code'];
	$course_title		= $row['course_title'];
	$course_unit		= $row['course_unit'];
	$semester			= $row['semester'];
	$level				= $row['level'];
	$active				= $row['active'];
	?>
	<tr>
			<td ><?php echo $course_code; ?></td>
			<td ><?php echo $course_title; ?></td>
			<td><?php echo $course_unit; ?></td>
			<td><?php echo $semester; ?></td>
            <td><?php echo $level; ?></td>
			<td><?php echo $active; ?></td>
			<td>
            <?php
			if($active=='d'){
				echo "<a href='activatecourses.php?course_code=$course_code&active=$active'>Activate</a>";		
			} else{
				echo "<a href='activatecourses.php?course_code=$course_code&active=$active'>DeActivate</a>";
			}
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