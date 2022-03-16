<?php 
	require_once 'inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Home | Avaness Global</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<div class="chip center">
					Русский военный корабль, иди нах*й!
					<i class="close material-icons">close</i>
				</div>
			</div>
		</div><br>

		<div class="container">
			<div class="row">
				<nav>
					<div class="nav-wrapper">
						<form action="search" method="post">
							<div class="input-field">
								<input id="search" type="search" placeholder="Search..." name="search">
								<label class="label-icon" for="search"><i class="material-icons">search</i></label>
								<i class="material-icons">close</i>
							</div>
						</form>
					</div>
				</nav>
			</div>
		</div><br>

		<div class="container">
			<div class="row">
				<!-- <h4 class="center error">24 лютого 2022 року РФ почала повномасштабну війну проти України, проти її свободи, незалежності, демократії</h4><br> -->
				
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