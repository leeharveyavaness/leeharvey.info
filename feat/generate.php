<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require '../inc/head.php'; ?>
		<link rel="stylesheet" href="../css/main.css">
		<title>Generate password | Avaness Global</title>
	</head>
	<body>

		<?php 
			require '../inc/nav.php';
			require '../inc/switch.php';
		?>

		<div class="container">
			<div class="row">
				<h2 class="center">Generate password</h2><br>

				<div class="col s12 center">

					<span id="result"> </span>
						<button class="btn" id="clipboard">
						<i class="fa fa-clipboard"></i>
					</button>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<label>Password length</label>
									<input type="number" id="length" min='8' max='50' value='12' />
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<label>
										<input type="checkbox" id="uppercase" checked="checked" />
										<span>Include uppercase letters</span>
									</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<label>
										<input type="checkbox" id="lowercase" checked="checked" />
										<span>Include lowercase letters</span>
									</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<label>
										<input type="checkbox" id="numbers" checked="checked" />
										<span>Include numbers</span>
									</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div>

					<div class="row">
						<div class="col s12 m3 l3"></div>
							<div class="col s12 m6 l6">
								<div class="input-field col s12">
									<label>
										<input type="checkbox" id="symbols" checked="checked" />
										<span>Include symbols</span>
									</label>
								</div>
							</div>
						<div class="col s12 m3 l3"></div>
					</div><br>

					<button class="btn" id="generate">Generate password</button>

				</div>

			</div>
		</div><br>

		<?php 
			require '../inc/footer.php';
			require '../inc/script.php';
		?>

		<script type="text/javascript">
			const resultEl = document.getElementById('result');
			const lengthEl = document.getElementById('length');
			const uppercaseEl = document.getElementById('uppercase');
			const lowercaseEl = document.getElementById('lowercase');
			const numbersEl = document.getElementById('numbers');
			const symbolsEl = document.getElementById('symbols');
			const generateEl = document.getElementById('generate');
			const clipboard = document.getElementById('clipboard');

			const randomFunc = {
				lower: getRandomLower,
				upper: getRandomUpper,
				number: getRandomNumber,
				symbol: getRandomSymbol
			}

			clipboard.addEventListener('click', () => {
				const textarea = document.createElement('textarea');
				const password = resultEl.innerText;
	
				if(!password) { return; }
	
				textarea.value = password;
				document.body.appendChild(textarea);
				textarea.select();
				document.execCommand('copy');
				textarea.remove();
				alert('Password copied to clipboard');
			});

			generate.addEventListener('click', () => {
				const length = +lengthEl.value;
				const hasLower = lowercaseEl.checked;
				const hasUpper = uppercaseEl.checked;
				const hasNumber = numbersEl.checked;
				const hasSymbol = symbolsEl.checked;
	
				resultEl.innerText = generatePassword(hasLower, hasUpper, hasNumber, hasSymbol, length);
			});

			function generatePassword(lower, upper, number, symbol, length) {
				let generatedPassword = '';
				const typesCount = lower + upper + number + symbol;
				const typesArr = [{lower}, {upper}, {number}, {symbol}].filter(item => Object.values(item)[0]);

				if(typesCount === 0) {
					return '';
				}

				for(let i=0; i<length; i+=typesCount) {
					typesArr.forEach(type => {
						const funcName = Object.keys(type)[0];
						generatedPassword += randomFunc[funcName]();
					});
				}
	
				const finalPassword = generatedPassword.slice(0, length);
	
				return finalPassword;
			}

			function getRandomLower() {
				return String.fromCharCode(Math.floor(Math.random() * 26) + 97);
			}

			function getRandomUpper() {
				return String.fromCharCode(Math.floor(Math.random() * 26) + 65);
			}

			function getRandomNumber() {
				return +String.fromCharCode(Math.floor(Math.random() * 10) + 48);
			}

			function getRandomSymbol() {
				const symbols = '!@#$%^&*(){}[]=<>/,.'
				return symbols[Math.floor(Math.random() * symbols.length)];
			}

		</script>
	
	</body>
</html>