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
			</div>
		</div>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>

	</body>
</html>