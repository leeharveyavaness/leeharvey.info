<?php

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: ../index.php");
		exit;
	}

	require_once "db.php";

	$username = $password = "";
	$username_err = $password_err = $login_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
    		if(empty(trim($_POST["username"]))){
			$username_err = "Please enter username.";
		} else{
			$username = trim($_POST["username"]);
		}

		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter your password.";
		} else{
			$password = trim($_POST["password"]);
		}

		if(empty($username_err) && empty($password_err)){

			$sql = "SELECT id, username, password FROM users WHERE username = :username";
	
			if($stmt = $pdo->prepare($sql)){
	    
				$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
				$param_username = trim($_POST["username"]);
	    
	    
	    			if($stmt->execute()){
		
					if($stmt->rowCount() == 1){
						if($row = $stmt->fetch()){
							$id = $row["id"];
							$username = $row["username"];
							$hashed_password = $row["password"];
							if(password_verify($password, $hashed_password)){
			    
								session_start();
			    
			    
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["username"] = $username;                            
			    
			    
								header("location: ../index.php");
							} else{
								$login_err = "Invalid username or password.";
							}
						}
					} else{
		    				$login_err = "Invalid username or password.";
					}
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
		<title>Log in | Avaness</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Вхід</h2><br>
				<p class="center">Нема профілю? <a href="reg.php">Зареєструйтеся</a></p>
				<form action="log.php" method="post" class="col s12 center">

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