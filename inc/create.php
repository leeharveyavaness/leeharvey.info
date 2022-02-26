<?php
	require_once 'db.php';

	$title = $anons = $content = "";
	$title_err = $anons_err = $content_err = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$input_title = trim($_POST["title"]);
		if(empty($input_title)){
			$title_err = "Please enter a title.";
		} else{
			$title = $input_title;
		}

		$input_anons = trim($_POST["anons"]);
		if(empty($input_anons)){
			$anons_err = "Please enter an anons.";     
		} else{
			$anons = $input_anons;
		}

		$input_content = ($_POST["content"]);
		if(empty($input_content)){
			$content_err = "Please enter an content.";     
		} else{
			$content = $input_content;
		}


		if(empty($title_err) && empty($anons_err) && empty($content_err)){
			$sql = "INSERT INTO avaness_post (title, anons, content) VALUES (:title, :anons, :content)";

			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":title", $param_title);
				$stmt->bindParam(":anons", $param_anons);
				$stmt->bindParam(":content", $param_content);

				$param_title = $title;
				$param_anons = $anons;
				$param_content = $content;

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
		<title>Create post | Avaness Alpha</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Створити пост</h2><br>
				
				<form action="create" method="post" class="col s12 center">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="title">
									<label for="icon_prefix">Title</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="anons">
									<label for="icon_prefix">Anons</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<textarea id="textarea1" name="content" class="materialize-textarea"></textarea>
									<label for="textarea1">Content</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>

					<button class="btn waves-effect waves-light" type="submit" name="submit">Create
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
