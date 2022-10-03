<?php 
	require_once '../inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Portfolio | Avaness Global</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h3 class="center">Portfolio</h3>
					<iframe width="48%" height="315" src="https://www.youtube.com/embed/rsaIXs8oCqo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe width="48%" height="315" src="https://www.youtube.com/embed/FCfaJz4ASHo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe width="48%" height="315" src="https://www.youtube.com/embed/l0QUsyq4loQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>

	</body>
</html>