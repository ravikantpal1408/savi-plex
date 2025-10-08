<?php
	if (isset($_POST["submitButton"])) {
		echo ("Form submitted successfully!");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Welcome to Savi-plex</title>
	<link rel="stylesheet" type="text/css" href="asset/style/style.css">
</head>

<body>
	<div class="signInContainer">
		<div class="column">
			<form method="POST">
				<input type="text" name="firstName" id="firstName" placeholder="First Name" required>
				<input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
				<input type="email" name="email" id="email" placeholder="Email" required>
				<input type="email" name="confirmEmail" id="confirmEmail" placeholder="Confirm Email" required>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"
					required>
				<input type="submit" name="submitButton" value="SUBMIT">
			</form>

		</div>
	</div>

</body>

</html>