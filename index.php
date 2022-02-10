<?php require 'inc/db.php'; 

	session_start();

	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: inc/log.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Home | Avaness</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
			require 'inc/search.php';
		?>

		<div class="container">
			<div class="row">
				<?php
				$sql = "SELECT * FROM post";   
				$result = $pdo->query($sql);
				if($result->rowCount() > 0){
					while($row = $result->fetch()) : ?>

					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-content">
								<a href="<?php echo $row['link']; ?>" class="card-title"><?php echo $row['title']; ?></a>
								<p><?php echo $row['info']; ?></p>
							</div>
      						</div>
    					</div>
	
				<?php
					endwhile;
    				} else{
					echo "No records matching your query were found.";
    				}
				
				?>

			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>