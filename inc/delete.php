<?php

	require_once 'db.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM avaness_post WHERE id=:id";
	$query = $pdo->prepare($sql);
	$query->execute(array(':id' => $id));

	header("Location: admin.php");
?>