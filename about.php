<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Infa pro mene | Avaness</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="container">
			<div class="row">

				<div class="col s12">
					<div class="card">
						<div class="card-content">
							<figure>
								<img class="circle" width="23%" src="content/upload/avaness.jpeg" alt="avaness">
							</figure>
							<h3 class="center">Vadym Kushch</h3>
							<h4 class="center">Відеомонтажер</h4>
							<p>Оператор з обробки інформації та програмного забезпечення</p><br>
							<p>вивчення HTML, CSS - грудень 2015 - квітень 2016</p><br>
							<p>монтаж весільних фільмів - вересень - грудень 2017</p><br>
							<p>контент-менеджер - березень - вересень 2018</p><br>
						</div>
					</div>
				</div>

			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>