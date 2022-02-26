<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>403 Forbidden | Avaness</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h3 class="center error">403</h3>
				<p>We are sorry, but you do not have access to this page or resource</p>
				<a href="/">back to home page</a>
			</div>
		</div>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>

	</body>
</html>