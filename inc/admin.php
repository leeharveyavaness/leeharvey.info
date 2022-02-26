<?php require 'db.php';

	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../auth/log");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Admin | Avaness Alpha</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<?php
				$sql = "SELECT * FROM avaness_post ORDER BY id DESC";   
				$result = $pdo->query($sql);
				if($result->rowCount() > 0){
					while($row = $result->fetch()) : ?>

					<div class="col s12 m6 l6">
						<div class="card">
							<div class="card-content">
								<span class="card-title truncate"><?php echo $row['title']; ?></span>
								<a href="../post.php?id=<?= $row['id'] ?>" class="btn-floating" title="View Record"><i class="material-icons">remove_red_eye</i></a>
								<a href="update.php?id=<?php echo $row['id']; ?>" class="btn-floating" title="Update post"><i class="material-icons">edit</i></a>
								<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-floating red" title="Delete post"><i class="material-icons">delete</i></a>
							</div>
      						</div>
    					</div>

				<?php
					endwhile;
    				} else{
					echo "<h3>No records matching your query were found.</h3>";
    				}
				
				?>

			</div>
		</div>

		<?php 
			require 'footer.php';
			require 'script.php';
		?>

	</body>
</html>