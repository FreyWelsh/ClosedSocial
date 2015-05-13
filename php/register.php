<?php
//////////
// THis file contains the registration script to be
// run for new applicants to the site
//
// @return a json object containing either errors or 
//    a success message
// echo '<p>this page exists</p><br/>';
if(!isset($_SESSION)) { session_start(); }

	//Need the database connection:
	require_once('interface.php');
	$database = makeConnection(true);
// echo '<p>this page exists</p><br/>';
	// Create the header before sending any data
	header("content-type:application/json");

// echo '<p>this page exists</p><br/>';
	// Trim all the incoming data:
	$account_info = array_map('trim', $_POST);
	$errors = array();
	$name = $email = $pass = false;
// echo '<p>this page exists</p><br/>';
	if (preg_match('/^[A-Z \'.-]{2,20}$/i', $account_info['name'])) {
		$name = mysqli_real_escape_string ($database, $account_info['name']);
	} else {
		$errors[] = 'Give the account a name';
	}
// echo '<p>this page exists</p><br/>';
	// email address (by php's built in 'filter' check
	if (filter_var($account_info['email'], FILTER_VALIDATE_EMAIL)) {
		$email = mysqli_real_escape_string ($database, $account_info['email']);
	} else {
		$errors[] = 'Please enter a valid email address!';
	}
// echo '<p>this page exists</p><br/>';
// echo '<pre>'.var_dump($errors).'</pre>';
	// pass with confirm pass
	if (preg_match('/^\w{4,20}$/', $account_info['pass']) ) {
		if ($account_info['pass'] == $account_info['pass1']) {
			$pass = mysqli_real_escape_string ($database, $account_info['pass']);
		} else {
			$errors[] = 'Your password did not match the confirmed password!';
		}
	} else {
		$errors[] = 'Please enter a valid password!';
	}

// echo '<p>this page exists</p><br/>';
// echo '<pre>'.var_dump($errors).'</pre>';

	if($name && $email && $pass) {
		// Make sure the email address is available:
		$q = "SELECT user_id FROM users WHERE email='$email'";
		$r = mysqli_query ($database, $q);// or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		// echo '<p>this page exists</p><br/>';
		// echo '<pre>'.var_dump($errors).'</pre>';
		if (mysqli_num_rows($r) == 0) { // Available.

			// Create the activation code:
			$a = md5(uniqid(rand(), true));

			// Add the user to the database:
			$query = "INSERT INTO users (email, pass, name, active, registration_date)";
			$query .= "VALUES ('$email', SHA1('$pass'), '$name', '$a', NOW())";
			$result = mysqli_query($database, $query);

			if (mysqli_affected_rows($database) == 1) { // If it ran OK.

				// Send the email:
				$body = $name . "\n";
				$body .= "Thank you for registering at this website we made, we probably hashed your password.";
				$body .= "To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'activate.php?x=' . urlencode($email) . "&y=$a";
				mail($account_info['email'], 'Registration Confirmation', $body, 'From: freyjt@bgsu.edu');
				$success = array();
				$success[0] = 'Thank you for registering! A confirmation email has ';
				$success[0] .= 'been sent to your address. Please click on the link in ';
				$success[0] .= 'that email in order to activate your account.';
				echo json_encode($success);
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				$errors[] = 'You could not be registered due to a system error. We apologize for any inconvenience.';
				echo json_encode($errors);
			}
			
		} else { // The email address is not available.
			$errors[] = 'That email address has already been registered. 
				If you have forgotten your password, use the link to 
				have your password sent to you.';
			echo json_encode($errors);
		}


	}
	else echo json_encode($errors);
// echo '<p>this page exists</p><br/>';
// echo '<pre>'.var_dump($errors).'</pre>';
?>