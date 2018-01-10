<?php 
include 'core/init.php';
admin_protect();
//protect_page();
include 'includes/overall/header.php';
?>
     <h1>Admin</h1>
      <nav>
    	<ul>
        	<li><a href="register.php">Register a User</a></li>
            <li><a href="admin.php?type=usersettings">User Settings</a></li>
         <ul>
    </nav>
    <p></p>
     <p>Hello Admin, <?php echo $user_data['firstname'];?></p>
  <p>
     <?php
	 	if(isset($_GET['type']) && !empty($_GET['type'])){

	$sql = "SELECT * FROM `users`";
	$result = mysql_query($sql)or die(mysql_error());
	
	?>
    <table>
	<tr><th>USER ID</th><th>USERNAME</th><th>FIRST NAME</th><th>LAST NAME</th><th>USER ACTIVE</th><th>OPTIONS</th></tr>
	<?php
	while($row = mysql_fetch_array($result)){
	$user_id		= $row['user_id'];
	$username		= $row['username'];
	$firstname		= $row['firstname'];
	$lastname		= $row['lastname'];
	$active			= $row['active'];
	?>
	<tr>
			<td ><?php echo $user_id; ?></td>
			<td ><?php echo $username; ?></td>
			<td><?php echo $firstname; ?></td>
			<td><?php echo $lastname; ?></td>
			<td><?php echo $active; ?></td>
			<td>
            <?php
			if($active=='d'){
				echo "<a href='adminoptions.php?user_id=$user_id&active=$active'>Activate</a>";		
			} else{
				echo "<a href='adminoptions.php?user_id=$user_id&active=$active'>DeActivate</a>";
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
</p>
<?php include 'includes/overall/footer.php'; ?>