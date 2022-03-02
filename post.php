<?php

	if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
	
		require_once "inc/db.php";

		$sql = "SELECT * FROM avaness_post WHERE id = :id";
	
		if($stmt = $pdo->prepare($sql)){
		
			$stmt->bindParam(":id", $param_id);
			$param_id = trim($_GET["id"]);
		
			if($stmt->execute()){
				if($stmt->rowCount() == 1){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$title = $row["title"];
					$content = $row["content"];
				} else{
					header("location: error.php");
					exit();
				}
		
			} else{
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		unset($stmt);

		unset($pdo);
	} else{
		header("location: error.php");
		exit();
	}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title><?php echo $row['title']; ?> | Avaness</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="nav-wrapper center">
			<div class="col s12">
				<a href="/" class="breadcrumb">Home</a>
				<a class="breadcrumb"><?php echo $row['title']; ?></a>
			</div>
		</div><br>

		<div class="container">
			<div class="row">

				<div class="col s12">
					<div class="card">
						<div class="card-content">
                                                        <h3 class="center"><?php echo $row['title']; ?></h3>
							<p><?php echo $row['content']; ?></p><br>
							<h5>Share this post</h5>
							<p>ddosify -t rbc.ru -d 86400 -n 500000</p>
							<a target="_blank" href="" style="font-size: 35px;"><i class="fa fa-facebook"></i></a>
							<a target="_blank" href="" style="font-size: 35px;"><i class="fa fa-telegram"></i></a>
							<a target="_blank" href="" style="font-size: 35px;"><i class="fa fa-twitter"></i></a>
						</div>
      					</div>
    				</div>

			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>
		
	</body>
</html>