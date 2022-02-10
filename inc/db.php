<?php

	// $host = 'localhost';
	// $db   = 'leeharvey';
	// $user = 'root';
	// $pass = 'root';
	// $charset = 'utf8';

	// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	// $opt = [
	// 	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	// 	PDO::ATTR_EMULATE_PREPARES   => false,
	// ];

	// $pdo = new PDO($dsn, $user, $pass, $opt);

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'leeharvey');
 
    	$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
