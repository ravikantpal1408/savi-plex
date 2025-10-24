<?php
if (isset($_POST["submitButton"])) {
	echo ("Form submitted successfully!");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Welcome to SaviPlex</title>
	<link rel="stylesheet" type="text/css" href="asset/style/style.css">
</head>

<body>
	<div class="signInContainer">
		<div class="column">
			<div class="header">
				<img src="asset/images/logo.png" title="Logo" alt="Site Logo" />
				<h3>Login</h3>
				<span>to continue to SaviPlex</span>

			</div>
			<form method="POST">
				<input type="email" name="email" id="email" placeholder="Email" required>
				<input type="email" name="confirmEmail" id="confirmEmail" placeholder="Confirm Email" required>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<input type="submit" name="submitButton" value="SUBMIT">
			</form>
			<a href="register.php" class="signUpMessage">Need an account? Sign up here!</a>
		</div>
	</div>

</body>

</html>