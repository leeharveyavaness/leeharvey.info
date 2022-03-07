<?php
	require_once 'db.php';

	$name = $time = $artist = $album = $genre = "";
	$name_err = $time_err = $artist_err = $album_err = $genre_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$input_name = trim($_POST["name"]);
		if(empty($input_name)){
			$name_err = "Please enter a name.";
		} else{
			$name = $input_name;
		}

		$input_time = ($_POST["time"]);
		if(empty($input_time)){
			$time_err = "Please enter an time.";     
		} else{
			$time = $input_time;
		}

		$input_artist = trim($_POST["artist"]);
		if(empty($input_artist)){
			$artist_err = "Please enter an artist.";     
		} else{
			$artist = $input_artist;
		}

		$input_album = trim($_POST['album']);
		if(empty($input_album)){
			$album_err = "Please enter an album.";     
		} else{
			$album = $input_album;
		}

		$input_genre = trim($_POST['genre']);
		if(empty($input_genre)){
			$genre_err = "Please enter an genre.";     
		} else{
			$genre = $input_genre;
		}


		if(empty($name_err) && empty($time_err) && empty($artist_err) && empty($album_err) && empty($genre_err)){
			$sql = "INSERT INTO avaness_music (name, time, artist, album, genre) VALUES (:name, :time, :artist, :album, :genre)";

			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":name", $param_name);
				$stmt->bindParam(":time", $param_time);
				$stmt->bindParam(":artist", $param_artist);
				$stmt->bindParam(":album", $param_album);
				$stmt->bindParam(":genre", $param_genre);

				$param_name = $name;
				$param_time = $time;
				$param_artist = $artist;
				$param_album = $album;
				$param_genre = $genre;

				if($stmt->execute()){
					header("location: ../");
					exit();
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
			}
			unset($stmt);
		}
		unset($pdo);
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Add music | Avaness Alpha</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Додати музику</h2><br>
				
				<form action="add-music" method="post" class="col s12 center">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="name">
									<label for="icon_prefix">Name</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="time">
									<label for="icon_prefix">Time</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="artist">
									<label for="icon_prefix">Artist</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="album">
									<label for="icon_prefix">Album</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="genre">
									<label for="icon_prefix">Genre</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<button class="btn waves-effect waves-light" type="submit" name="submit">Add
						<i class="material-icons right">send</i>
					</button>

				</form>
				
			</div>
		</div><br>

		<?php 
			require 'footer.php';
			require 'script.php';
		?>
	
	</body>
</html>
