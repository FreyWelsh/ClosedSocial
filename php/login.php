<?php
    if(!isset($_SESSION)) { session_start(); }
//This implements the backend of the login page for the site
// THis code adapted from PHP and MySql for dynamic web sites by Larry Ullman chapter 18
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require_once ('interface.php');
		$database = makeConnection(true);
		// echo '<html><body>hello world</body></html>';
		$errors = array();
		// $errors[] = 'whyyyyy';
		// echo $errors[0];

		// Validate the email address:
		if (!empty($_POST['email'])) {
			$e = mysqli_real_escape_string ($database, $_POST['email']);
		} else {
			$e = FALSE;
			$errors[] = 'You forgot to enter your email address!';
		}
		
		// Validate the password:
		if (!empty($_POST['pass'])) {
			$p = mysqli_real_escape_string ($database, $_POST['pass']);
		} else {
			$p = FALSE;
			$errors[] = 'You forgot to enter your password!';
		}
		
		if ($e && $p) { // If everything's OK.

			// Query the database:
			$q = "SELECT user_id, name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL";		
			$r = mysqli_query ($database, $q);
			
			if (mysqli_num_rows($r) == 1) { // A match was made.
				// if(!session_start()) {
				// 	$errors[] = 'error starting session';
				// 	header("content-type:application/json");
				// 	echo json_encode($errors);
				// 	exit();
				// }
				// Register the values:
				$_SESSION = mysqli_fetch_array($r, MYSQLI_ASSOC); 
				mysqli_free_result($r);
				closeConnection($database);
								
				// Redirect the user:
				$url = 'mainP.php'; // Define the URL.
				ob_end_clean(); // Delete the buffer.
				$errors[] = $url;
				header("content-type:application/json");
				echo json_encode($errors);
					
			} else { // No match was made.
				$errors[] = 'Either the email address and password entered do not match those on file or you have not yet activated your account.';
				header("content-type:application/json");
				echo json_encode($errors);

			}
			
		} else { // If variables were not passed

			header("content-type:application/json");
			echo json_encode($errors);

		}

		closeConnection($database);
	} // End of SUBMIT conditional.

?>
