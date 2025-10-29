<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/classes/FormSanitizer.php';
require_once __DIR__ . '/includes/classes/Account.php';
require_once __DIR__ . '/includes/classes/Constants.php';

$account = new Account($con);

// Handle POST safely: check request method and use null-coalescing + casts
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitButton'])) {
	$firstName = FormSanitizer::sanitizeFormString((string) ($_POST['firstName'] ?? ''));
	$lastName = FormSanitizer::sanitizeFormString((string) ($_POST['lastName'] ?? ''));
	$username = FormSanitizer::sanitizeFormUsername((string) ($_POST['username'] ?? ''));
	$email = FormSanitizer::sanitizeFormEmail((string) ($_POST['email'] ?? ''));
	$confirmEmail = FormSanitizer::sanitizeFormEmail((string) ($_POST['confirmEmail'] ?? ''));
	$password = FormSanitizer::sanitizeFormPassword((string) ($_POST['password'] ?? ''));
	$confirmPassword = FormSanitizer::sanitizeFormPassword((string) ($_POST['confirmPassword'] ?? ''));

	$account->register($firstName, $lastName, $username, $email, $confirmEmail, $password, $confirmPassword);
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
				<img src="asset/images/logo.png" title="Logo" alt="Site Logo">
				<h3>Sign Up</h3>
				<span>to continue to SaviPlex</span>

			</div>
			<form method="POST">
				<?php echo htmlspecialchars($account->getErrors(Constants::$firstNameCharacters) ?? '', ENT_QUOTES, 'UTF-8'); ?>
				<input type="text" name="firstName" id="firstName" placeholder="First Name" required>
				<?php echo htmlspecialchars($account->getErrors(Constants::$lastNameCharacters) ?? '', ENT_QUOTES, 'UTF-8'); ?>
				<input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
				<?php echo htmlspecialchars($account->getErrors(Constants::$usernameCharacters) ?? '', ENT_QUOTES, 'UTF-8'); ?>
				<input type="text" name="username" id="username" placeholder="Username" required>
				<input type="email" name="email" id="email" placeholder="Email" required>
				<input type="email" name="confirmEmail" id="confirmEmail" placeholder="Confirm Email" required>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"
					required>
				<input type="submit" name="submitButton" value="SUBMIT">
			</form>
			<a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
		</div>
	</div>

</body>

</html>