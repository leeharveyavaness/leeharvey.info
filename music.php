<?php 
	require_once 'inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<link rel="stylesheet" href="css/main.css">
		<title>Music | Avaness</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h3 class="center">My Music</h3>
				<h4 class="center" id="clock"><script>currentTime();</script></h4>
				<h5 class="center"><script>document.write(months[month] + " "+ day +" "+ year);</script></h5><br>
				
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Time</th>
							<th>Artist</th>
							<th>Album</th>
							<th>Genre</th>
						</tr>
					</thead>

					<tbody>
						<?php
							$sql = "SELECT * FROM avaness_music";   
							$result = $pdo->query($sql);
							if($result->rowCount() > 0){
								while($row = $result->fetch()) : ?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['time']; ?></td>
							<td><?php echo $row['artist']; ?></td>
							<td><?php echo $row['album']; ?></td>
							<td><?php echo $row['genre']; ?></td>
						</tr>

						<?php
								endwhile;
    							} else{
								echo "<h3>No records matching your query were found.</h3>";
							}
				
						?>
					</tbody>
				</table><br>

			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

	</body>
</html>