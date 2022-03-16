<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Music | Avaness Global</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h3 class="center">My Music</h3>
				<h6>Disaster</h6>
				<audio controls>
					<source src="../music/Disaster.mp3" type="audio/mpeg">
				</audio>
				<h6>Holy Ghost</h6>
				<audio controls>
					<source src="../music/Holy Ghost.mp3" type="audio/mpeg">
				</audio>
				<h6>Oceans</h6>
				<audio controls>
					<source src="../music/Oceans.mp3" type="audio/mpeg">
				</audio>
				<h6>Stefania</h6>
				<audio controls>
					<source src="../music/Stefania.mp3" type="audio/mpeg">
				</audio>
				<h6>Байрактар</h6>
				<audio controls>
					<source src="../music/Байрактар.mp3" type="audio/mpeg">
				</audio>
				<h6>Доброго вечора</h6>
				<audio controls>
					<source src="../music/Доброго вечора.mp3" type="audio/mpeg">
				</audio>
				<h6>Ми Президенти Своєї Країни</h6>
				<audio controls>
					<source src="../music/Ми Президенти Своєї Країни.mp3" type="audio/mpeg">
				</audio>
				<!-- <h6></h6>
				<audio controls>
					<source src="../music/" type="audio/mpeg">
				</audio> -->
				
				

			</div>
		</div>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>

	</body>
</html>