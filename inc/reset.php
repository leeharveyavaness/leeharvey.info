<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: log.php");
    exit;
}
 
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: log.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Reset password | Avaness</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Скидання паролю</h2><br>
				
				<form action="reset.php" method="post" class="col s12 center">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">more_horiz</i>
									<input id="icon_prefix" type="text" name="new_password" class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $username_err; ?></span>
									<label for="icon_prefix">New password</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">more_horiz</i>
									<input id="icon_pass" type="password" name="confirm_password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
									<span class="invalid-feedback"><?php echo $password_err; ?></span>
									<label for="icon_pass">Confirm password</label>
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