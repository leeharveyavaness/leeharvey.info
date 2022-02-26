<?php

	require_once "db.php";

	$title = $anons = $content = "";
	$title_err = $anons_err = $content_err = "";

	if(isset($_POST["id"]) && !empty($_POST["id"])){
		$id = $_POST["id"];

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

		$input_content = trim($_POST["content"]);
		if(empty($input_content)){
			$content_err = "Please enter an content.";
		} else{
			$content = $input_content;
		}
	
		if(empty($title_err) && empty($anons_err) && empty($content_err)){
			$sql = "UPDATE avaness_post SET title=:title, anons=:anons, content=:content WHERE id=:id";
			if($stmt = $pdo->prepare($sql)){
		
				$stmt->bindParam(":title", $param_title);
				$stmt->bindParam(":anons", $param_anons);
				$stmt->bindParam(":content", $param_content);
				$stmt->bindParam(":id", $param_id);
	
				$param_title = $title;
				$param_anons = $anons;
				$param_content = $content;
				$param_id = $id;
		
		
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
	} else{
		if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
		
			$id =  trim($_GET["id"]);
		
			$sql = "SELECT * FROM avaness_post WHERE id = :id";
			if($stmt = $pdo->prepare($sql)){
				$stmt->bindParam(":id", $param_id);
				$param_id = $id;
				if($stmt->execute()){
					if($stmt->rowCount() == 1){
						$row = $stmt->fetch(PDO::FETCH_ASSOC);

						$title = $row["title"];
						$anons = $row["anons"];
						$content = $row["content"];
					} else{
						header("location: ../error.php");
						exit();
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
			}
			unset($stmt);
			unset($pdo);
		}  else{
			header("location: ../error.php");
			exit();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Update post | Avaness Alpha</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Оновити пост</h2><br>
				
				<form action="update" method="post" class="col s12 center">

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<i class="material-icons prefix">create</i>
									<input id="icon_prefix" type="text" name="title" value="<?php echo $title; ?>">
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
									<input id="icon_prefix" type="text" name="anons"  value="<?php echo $anons; ?>">
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
									<textarea id="textarea1" name="content" class="materialize-textarea" value="<?php echo $content; ?>"></textarea>
									<label for="textarea1">Content</label>
								</div>
							</div>
						<div class="col s12 m6 l3"></div>
					</div>

					<input type="hidden" name="id" value="<?php echo $id; ?>"/>
					
					<button class="btn waves-effect waves-light" type="submit" name="action">Update
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