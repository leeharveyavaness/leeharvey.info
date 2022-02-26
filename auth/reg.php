<?php

	require_once "../inc/db.php";
 
	$user = $email = $pass = $confirm_pass = "";
	$user_err = $email_err = $pass_err = $confirm_pass_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty(trim($_POST["user"]))){
			$user_err = "Please enter a username.";
		} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))){
			$user_err = "Username can only contain letters, numbers, and underscores.";
		} else{
			$sql = "SELECT id FROM avaness_user WHERE user = :user";

			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
				$param_username = trim($_POST["user"]);

				if($stmt->execute()){
					if($stmt->rowCount() == 1){
						$user_err = "This username is already taken.";
					} else{
						$user = trim($_POST["user"]);
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				unset($stmt);
			}
		}

		if(empty(trim($_POST["email"]))){
			$email_err = "Please enter a email.";     
		} else{
			$email = trim($_POST["email"]);
		}

		if(empty(trim($_POST["pass"]))){
			$pass_err = "Please enter a password.";     
		} elseif(strlen(trim($_POST["pass"])) < 6){
			$pass_err = "Password must have atleast 6 characters.";
		} else{
			$pass = trim($_POST["pass"]);
		}

		if(empty(trim($_POST["confirm_pass"]))){
			$confirm_pass_err = "Please confirm password.";     
		} else{
			$confirm_pass = trim($_POST["confirm_pass"]);
			if(empty($pass_err) && ($pass != $confirm_pass)){
				$confirm_pass_err = "Password did not match.";
			}
		}

		if(empty($user_err) && empty($email_err) && empty($pass_err) && empty($confirm_pass_err)){
			$sql = "INSERT INTO avaness_user (user, email, pass) VALUES (:user, :email, :pass)";
			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
				$stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
				$stmt->bindParam(":pass", $param_pass, PDO::PARAM_STR);    
				$param_user = $user;
				$param_email = $email;
				$param_pass = password_hash($pass, PASSWORD_DEFAULT);

				if($stmt->execute()){	
					header("location: log.php");
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				unset($stmt);
			}
		}
		unset($pdo);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Reg | Avaness</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Реєстрація</h2><br>
				<p class="center">Є профіль? <a href="log">Увійти</a></p>
				<form action="reg.php" method="post" class="col s12 center">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_prefix" type="text" name="user" class="<?php echo (!empty($user_err)) ? 'is-invalid' : ''; ?>">
									<span class="error"><?php echo $user_err; ?></span>
									<label for="icon_prefix">Username</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m6 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">mail</i>
									<input id="icon_email" type="email" name="email" class="<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
									<span class="error"><?php echo $email_err; ?></span>
									<label for="icon_email">E-mail</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">more_horiz</i>
									<input id="icon_pass" type="password" name="pass" class="<?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>">
									<span class="error"><?php echo $pass_err; ?></span>
									<label for="icon_pass">Password</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m6 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">more_horiz</i>
									<input id="icon_pass2" type="password" name="confirm_pass" class="<?php echo (!empty($confirm_pass_err)) ? 'is-invalid' : ''; ?>">
									<span class="error"><?php echo $confirm_pass_err; ?></span>
									<label for="icon_pass2">Confirm password</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Reg
						<i class="material-icons right">send</i>
					</button>

				</form>
				
			</div>
		</div><br>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>
	
	</body>
</html>