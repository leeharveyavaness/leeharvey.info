<?php 
	require_once 'inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Happy | Avaness Global</title>
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
				<h3 class="center">До літа залишилося:</h3>
				<h3 id="demo" class="center"></h3>
			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

		<script>
			var countDownDate = new Date("Jun 1, 2022 00:00:00").getTime();
			var x = setInterval(function() {
				var now = new Date().getTime();

				var distance = countDownDate - now;

				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

				if (distance < 0) {
					clearInterval(x);
					document.getElementById("demo").innerHTML = "EXPIRED";
				}
			}, 1000);
		</script>

	</body>
</html>