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
        
        $sql = "UPDATE articles SET title=:title, anons=:anons, content=:content WHERE id=:id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":title", $param_title);
            $stmt->bindParam(":anons", $param_anons);
            $stmt->bindParam(":content", $param_content);
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_title = $title;
            $param_anons = $anons;
            $param_content = $content;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: ../index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM articles WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $title = $row["title"];
                    $anons = $row["anons"];
                    $content = $row["content"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: ../error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
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
		<title>Update post | Avaness</title>
	</head>
	<body>

		<?php 
			require 'nav.php';
			require 'switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Оновити пост</h2><br>
				
				<form action="update.php" method="post" enctype="multipart/form-data" class="col s12">

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