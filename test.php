<?php 
	require_once 'inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Test | Avaness Alpha</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h4 class="center" id="clock"><script>currentTime();</script></h4>
				<h5 class="center"><script>document.write(months[month] + " "+ day +" "+ year);</script></h5><br>				
			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>