<?php

	require_once "db.php";
 
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty(trim($_POST["username"]))){
			$username_err = "Please enter a username.";
		} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
			$username_err = "Username can only contain letters, numbers, and underscores.";
		} else{
			$sql = "SELECT id FROM users WHERE username = :username";

			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
				$param_username = trim($_POST["username"]);

				if($stmt->execute()){
					if($stmt->rowCount() == 1){
						$username_err = "This username is already taken.";
					} else{
						$username = trim($_POST["username"]);
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				unset($stmt);
			}
		}

		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter a password.";     
		} elseif(strlen(trim($_POST["password"])) < 6){
			$password_err = "Password must have atleast 6 characters.";
		} else{
			$password = trim($_POST["password"]);
		}

		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm password.";     
		} else{
			$confirm_password = trim($_POST["confirm_password"]);
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}

		if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
			$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
				$stmt->bindParam(":password", $param_password, PDO::PARAM_STR);    
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT);

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
		<?php require 'head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Reg | Avaness</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Реєстрація</h2><br>
				<p class="center">Є профіль? <a href="log.php">Увійти</a></p>
				<form action="reg.php" method="post" class="col s12">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="icon_prefix" type="text" name="username" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $username_err; ?></span>
									<label for="icon_prefix">Username</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<!-- <div class="row">
						<div class="col s12 m6 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">mail</i>
									<input id="icon_email" type="email" class="validate">
									<label for="icon_email">E-mail</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div> -->

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">more_horiz</i>
									<input id="icon_pass" type="password" name="password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $password_err; ?></span>
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
									<input id="icon_pass2" type="password" name="confirm_password" class="<?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
									<label for="icon_pass2">Confirm password</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>

				</form>
				
			</div>
		</div><br>

		<?php 
			require 'footer.php';
			require 'script.php';
		?>
	
	</body>
</html>