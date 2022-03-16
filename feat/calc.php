<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Calculator | Avaness Global</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h3 class="center">Calculator</h3>
				<div class="col s12 m3 l3"></div>
				<form class="calculator center col s12 m6 l6" name="calc">
					<input type="text" readonly class="value" name="txt">
					<span class="num clear" onclick="calc.txt.value = '' ">c</span>
					<span class="num" onclick="document.calc.txt.value += '/' ">/</span>
					<span class="num" onclick="document.calc.txt.value += '*' ">*</span>
					<span class="num" onclick="document.calc.txt.value += '7' ">7</span>
					<span class="num" onclick="document.calc.txt.value += '8' ">8</span>
					<span class="num" onclick="document.calc.txt.value += '9' ">9</span>
					<span class="num" onclick="document.calc.txt.value += '-' ">-</span>
					<span class="num" onclick="document.calc.txt.value += '4' ">4</span>
					<span class="num" onclick="document.calc.txt.value += '5' ">5</span>
					<span class="num" onclick="document.calc.txt.value += '6' ">6</span>
					<span class="num plus" onclick="document.calc.txt.value += '+' ">+</span>
					<span class="num" onclick="document.calc.txt.value += '1' ">1</span>
					<span class="num" onclick="document.calc.txt.value += '2' ">2</span>
					<span class="num" onclick="document.calc.txt.value += '3' ">3</span>
					<span class="num" onclick="document.calc.txt.value += '0' ">0</span>
					<span class="num" onclick="document.calc.txt.value += '00' ">00</span>
					<span class="num" onclick="document.calc.txt.value += '.' ">.</span>
					<span class="num" onclick="document.calc.txt.value =eval(calc.txt.value)">=</span>

				</form>
			<div class="col s12 m3 l3"></div>
			</div>
		</div>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>

	</body>
</html>