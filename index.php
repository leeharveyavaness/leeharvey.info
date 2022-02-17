<?php 
	require_once 'inc/db.php';
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
				$sql = "SELECT * FROM avaness_post ORDER BY id DESC";   
				$result = $pdo->query($sql);
				if($result->rowCount() > 0){
					while($row = $result->fetch()) : ?>

					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-content">
								<a href="post.php?id=<?php echo $row['id']; ?>" class="card-title truncate"><?php echo $row['title']; ?></a>
								<p><?php echo $row['anons']; ?></p>
								
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
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>