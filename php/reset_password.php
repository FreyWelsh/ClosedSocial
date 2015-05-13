<?php # Script 18.10 - forgot_password.php
// This page allows a user to reset their password, if forgotten.

//$page_title = 'Forgot Your Password';
//include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('interface.php');
        $database = makeConnection(true);
	// Assume nothing:
	$uid = FALSE;

	// Validate the email address...
	if (!empty($_POST['email'])) {

		// Check for the existence of that email address...
		$q = 'SELECT user_id FROM users WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 1) { // Retrieve the user ID:
			list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { // No database match made.
			echo '<div class="error">The submitted email address does not match those on file!</p>';
		}
		
	} else { // No email!
		echo '<div class="error">You forgot to enter your email address!</p>';
	} // END !empty($_POST['email']) IF.
	
	if ($uid) { // mysql query was successful

		// Create a new, random password:
		$p = substr ( md5(uniqid(rand(), true)), 3, 10);

		// Update the database:
		$query = "UPDATE users SET pass=SHA1('$p') WHERE user_id=$uid LIMIT 1";
		$r = mysqli_query ($database, $query) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		if (mysqli_affected_rows($database) == 1) { // If it ran OK.
		
			// Send an email:
			$body = "Your password to log into this website we mad has been temporarily changed to '$p'";
                        $body .= "We probably hashed it. Please log in using this password and this email address.";
                        $body .= "Then you may change your password to something more familiar.";
			mail ($_POST['email'], 'Your temporary password.', $body, 'From: admin@sitename.com');
			
			// Print a message and wrap up:
			echo ('<h3>Your password has been changed. You will receive the new,');
                        echo ('temporary password at the email address with which you registered.');
                        echo (' Once you have logged in with this password, you may change it by ');
                        echo ('clicking on the "Change Password" link.</h3>');
			closeConnection($database);
			//include ('includes/footer.html');
			exit(); // Stop the script.
			
		} else { // If it did not run OK.
			echo('<div class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'); 
		}

	} else { // Failed the validation test.
		echo('<div class="error">Please try again.</p>');
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
?>

<h1>Reset Your Password</h1>
<p>Enter your email address below and your password will be reset.</p> 
	<form action="forgot_password.php" method="post">
		<span class="label"><b>Email Address:</b></span>
		<input type="text" name="email" size="20" maxlength="60" 
			value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
		<input type="submit" name="submit" value="Reset My Password" />
</form>

<?php //include ('includes/footer.html'); ?>
