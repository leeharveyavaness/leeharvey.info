<?php

	if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
	
		require_once "inc/db.php";

		$sql = "SELECT * FROM avaness_war WHERE id = :id";
	
		if($stmt = $pdo->prepare($sql)){
		
			$stmt->bindParam(":id", $param_id);
			$param_id = trim($_GET["id"]);
		
			if($stmt->execute()){
				if($stmt->rowCount() == 1){
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$title = $row["title"];
					$content = $row["content"];
				} else{
					header("location: error.php");
					exit();
				}
		
			} else{
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		unset($stmt);

		unset($pdo);
	} else{
		header("location: error.php");
		exit();
	}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require 'inc/head.php'; ?>
		<meta property="og:url" content="http://leeharvey.info/post?id=<?php echo $row['id']; ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="<?php echo $row['title']; ?>" />
		<meta property="og:description" content="<?php echo $row['anons']; ?>" />
		<meta property="og:image" content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
		<link rel="stylesheet" href="css/main.css">
		<title><?php echo $row['title']; ?> | Avaness</title>
	</head>
	<body>

		<?php 
			require 'inc/nav.php';
			require 'inc/switch.php';
		?>

		<div class="nav-wrapper center">
			<div class="col s12">
				<a href="/" class="breadcrumb">Home</a>
				<a class="breadcrumb"><?php echo $row['title']; ?></a>
			</div>
		</div><br>

		<div class="container">
			<div class="row">

				<div class="col s12">
					<div class="card">
						<div class="card-content">
                                                        <h3 class="center"><?php echo $row['title']; ?></h3>
							<p><?php echo $row['content']; ?></p>

							<h5>Share this post:</h5>
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" style="font-size: 35px;"><i class="fa fa-facebook"></i></a>
							<a target="_blank" href="https://twitter.com/share?url=http://leeharvey.info/post?id=<?php echo $row['id']; ?>&text=<?php echo $row['title']; ?>&hashtags=avaness" style="font-size: 35px;"><i class="fa fa-twitter"></i></a>
							<a target="_blank" href="https://t.me/share/url?url=http://leeharvey.info/post?id=<?php echo $row['id']; ?>&text=<?php echo $row['title']; ?>" style="font-size: 35px;"><i class="fa fa-telegram"></i></a>
							<a onclick="copyToClipboard()" style="font-size: 35px;" href=""><i class="fa fa-link"></i></a>

						</div>
      					</div>
    				</div>

			</div>
		</div>

		<?php 
			require 'inc/footer.php';
			require 'inc/script.php';
		?>

<script>
function copyToClipboard(text) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value = window.location.href;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);
}
</script>
		
	</body>
</html>



