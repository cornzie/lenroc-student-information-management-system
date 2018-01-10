<?php 
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';

if(isset($_GET['success'])===true && empty($_GET['success'])===true){
?>
	<h2>Thanks, We've activated your account...</h2>
    <p>You can now log in.</p>
<?php
		}else if(isset($_GET['email'], $_GET['email_code'])===true){
			$email=trim($_GET['email']);
			$email_code=trim($_GET['email_code']);
			
			if(email_exist($email)===false){
			$errors[]='Oops! something went wrong and we couldn\'t find that email';
			
			} else if(activate($email, $email_code)===false){
				$errors[]='We had problems activating your account';	
			}
			if(empty($errors)==false){
			?>
				<h2>Oops...</h2>
			<?php
			echo output_errors($errors);
			} else{
				header('location:activate.php?success');
				exit();
			} 
		} else{
			header('location: index.php');
			exit();
		}

include 'includes/overall/footer.php';
?>