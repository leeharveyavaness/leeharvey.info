<?php 
	require_once 'inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Home | Avaness Alpha</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

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
				<h4 class="center" id="clock"><script>currentTime();</script></h4>
				<h5 class="center"><script>document.write(months[month] + " "+ day +" "+ year);</script></h5><br>

				<h3 class="center error">ІЗ-ЗА ВПРОВАДЖЕННЯ В УКРАЇНІ ВІЙСЬКОВОГО СТАНУ РОБОТА НАД САЙТОМ ПРИЗУПИНЯЄТЬСЯ</h3>

				<iframe src="https://www.google.com/maps/d/embed?mid=10wBVAAKCTHdPXYODiUbhjTTrJoY&ehbc=2E312F" width="100%" height="480"></iframe>

			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>