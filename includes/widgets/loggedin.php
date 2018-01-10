<div class="widget">
        <h2>Hello, <?php echo $user_data['firstname']; ?></h2>
            <div class="inner">
            	<div class="profile">
                <?php
				
				if(isset($_FILES['profile']) === true){
					if(empty($_FILES['profile']['name'])=== true){
						echo 'Please choose a file';					
					} else{
						$allowed = array('gif','jpg','jpeg','png');
						
						$file_name = $_FILES['profile']['name'];
						$file_extn = strtolower(end(explode('.', $file_name)));
						$file_temp = $_FILES['profile']['tmp_name'];
						$file_size = $_FILES['profile']['size'];
						
						if(in_array($file_extn, $allowed) === true){
							change_profile_image($session_user_id, $file_temp, $file_extn);
							header('Location:' .$current_file);
						} else{
							echo 'This image cannot be uploaded because its file type is not allowed. Allowed file types include: ';
							echo implode(', ',$allowed);
						}
					}
				}
				
				if(empty($user_data['profile'])==false){
					echo '<img src="', $user_data['profile'],'" alt="', $user_data['firstname'],'\'s profile Image">';
				}
				?>
                <form action="" method="post" enctype="multipart/form-data">
                	<input type="file" name="profile" /><input type="submit" />
                </form>
                </div>
            	<ul>
                	<li>
                    <a href="logout.php">Log Out</a>
                	</li>
                    <li>
                    <a href="<?php echo $user_data['username']; ?>">Profile</a>
                	</li>
                	<li>
                   	<a href="changepassword.php">Change password</a>
                	</li>
                    <li>
                   	<a href="settings.php">Settings</a>
                 	</li>
                </ul>
            </div>
         </div>