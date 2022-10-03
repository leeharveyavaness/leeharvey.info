<?php require 'inc/db.php';

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Error 404| Avaness Global</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Invalid Request</h2>
				<h4 class="center">Sorry, you've made an invalid request. Please <a href="index.php">go back</a> and try again.</h4>
			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>