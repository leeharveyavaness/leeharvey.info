<?php 
	require_once 'inc/db.php';
	$searchErr = '';
	$employee_details='';
	if(isset($_POST['search'])) {
		if(!empty($_POST['search'])) {
			$search = $_POST['search'];
			$stmt = $pdo->prepare("SELECT * FROM avaness_post WHERE title LIKE '%$search%'");
			$stmt->execute();
			$employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$searchErr = "Please enter the information";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Search... | Avaness</title>
		
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
				<?php
					if(!$employee_details) {
						echo "<h3>No records matching your query were found.</h3>";
					} else {
						foreach($employee_details as $key=>$value) : ?>

					<div class="col s12 m6 l4">
						<div class="card">
							<div class="card-content">
								<a href="post.php?id=<?php echo $value['id']; ?>" class="card-title truncate" title="<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a>
							</div>
						</div>
					</div>
				
					<?php
					endforeach;
				}
					
					?>
			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>