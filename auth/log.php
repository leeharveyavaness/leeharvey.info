<?php

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: ../index.php");
		exit;
	}

	require_once "../inc/db.php";

	$user = $pass = "";
	$user_err = $pass_err = $login_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
    		if(empty(trim($_POST["user"]))){
			$user_err = "Please enter username.";
		} else{
			$user = trim($_POST["user"]);
		}

		if(empty(trim($_POST["pass"]))){
			$pass_err = "Please enter your password.";
		} else{
			$pass = trim($_POST["pass"]);
		}

		if(empty($user_err) && empty($pass_err)){

			$sql = "SELECT id, user, pass FROM avaness_user WHERE user = :user";
	
			if($stmt = $pdo->prepare($sql)){
	    
				$stmt->bindParam(":user", $param_user, PDO::PARAM_STR);
				$param_user = trim($_POST["user"]);
	    
	    
	    			if($stmt->execute()){
		
					if($stmt->rowCount() == 1){
						if($row = $stmt->fetch()){
							$id = $row["id"];
							$user = $row["user"];
							$hashed_password = $row["pass"];
							if(password_verify($pass, $hashed_password)){
			    
								session_start();

								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["user"] = $user;                            
			    
			    
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
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Log in | Avaness</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Вхід</h2><br>
				<p class="center">Нема профілю? <a href="reg">Зареєструйтеся</a></p>
				<form action="log.php" method="post" class="col s12 center">

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

					<button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
					<a href="../inc/reset" class="btn waves-effect waves-light">Reset password</a>

				</form>
				
			</div>
		</div><br>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>
	
	</body>
</html>