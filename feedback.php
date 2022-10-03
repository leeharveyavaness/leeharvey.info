<?php
	session_start();

	function filterName($field){
    
		$field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
		if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
			return $field;
		} else{
			return FALSE;
		}
	}

	function filterEmail($field){
    
		$field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);

		if(filter_var($field, FILTER_VALIDATE_EMAIL)){
			return $field;
		} else{
			return FALSE;
		}
	}

	function filterString($field){
    
		$field = filter_var(trim($field), FILTER_SANITIZE_STRING);
		if(!empty($field)){
			return $field;
		} else{
			return FALSE;
		}
	}

	$nameErr = $emailErr = $messageErr = "";
	$name = $email = $subject = $message = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["name"])){
			$nameErr = "Please enter your name.";
		} else{
			$name = filterName($_POST["name"]);
			if($name == FALSE){
				$nameErr = "Please enter a valid name.";
			}
		}
    
		if(empty($_POST["email"])){
			$emailErr = "Please enter your email address.";     
		} else{
			$email = filterEmail($_POST["email"]);
			if($email == FALSE){
				$emailErr = "Please enter a valid email address.";
			}
		}
    
		if(empty($_POST["subject"])){
			$subject = "";
		} else{
			$subject = filterString($_POST["subject"]);
		}

		if(empty($_POST["message"])){
			$messageErr = "Please enter your comment.";     
		} else{
			$message = filterString($_POST["message"]);
			if($message == FALSE){
				$messageErr = "Please enter a valid comment.";
			}
		}
    
		if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
			$to = 'leeharveyavaness@gmail.com';

			$headers = 'From: '. $email . "\r\n" .
			'Reply-To: '. $email . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			if(mail($to, $subject, $message, $headers)){
				echo '<p class="success">Your message has been sent successfully!</p>';
			} else{
				echo '<p class="error">Unable to send email. Please try again!</p>';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Feedback | Avaness Global</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h3 class="center">Feedback</h3><br>
				<p class="center txt">Тут ви можете відправити нам своє питання, пропозицію чи скаргу і ми в найближчий час відповімо Вам</p>
				<form action="feedback" method="post" class="col s12 center">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="name">
									<label for="icon_prefix">Name *</label>
									<span class="error"><?php echo $nameErr; ?></span>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">email</i>
									<input id="icon_prefix" type="email" name="email">
									<label for="icon_prefix">Email *</label>
									<span class="error"><?php echo $emailErr; ?></span>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="subject">
									<label for="icon_prefix">Subject</label>
									
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<textarea id="textarea1" name="message" class="materialize-textarea"></textarea>
									<label for="textarea1">Message</label>
									<span class="error"><?php echo $messageErr; ?></span>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>

					<button class="btn waves-effect waves-light" type="submit" name="submit">Send
						<i class="material-icons right">send</i>
					</button>

				</form>
				
			</div>
		</div><br>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>
	
	</body>
</html>