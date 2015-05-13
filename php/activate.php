<?php //activate.php
// This page activates the user's account.
// adapted from PHP and MySql for Dynamic websites by Larry Ullman, chapter 18
// If $x and $y don't exist or aren't of the proper format, return an error string
if(!isset($_SESSION)) { session_start(); }
if (isset($_POST['x'], $_POST['y']) ){
	// && filter_var($_POST['x'], FILTER_VALIDATE_EMAIL)
	// && (strlen($_POST['y']) == 32 )) 
header("content-type:application/json");
	$returner = array();
	$x = urldecode($_POST['x']);
	// Update the database...
	require_once ('interface.php');
	$database = makeConnection(true);
	// $returner = array();
	// $returner[] = $x;
	// // $returner[] = mysqli_real_escape_string($database, $_POST['x']);
	// echo json_encode( $returner );

	$query = "UPDATE users SET active=NULL WHERE (email='";
        $query .= mysqli_real_escape_string($database, $x) . "' AND active='";
        $query .= mysqli_real_escape_string($database, $_POST['y']) . "') LIMIT 1";
	$result = mysqli_query ($database, $query);
	
	// return a message based on query result
	if (mysqli_affected_rows($database) == 1) {
		$returner[] = 'Your account is now active. You may now log in.';
	} else {
		$returner[] = 'Your account could not be activated. Please re-check the link or contact the system administrator.'; 
	}

	closeConnection($database);

} else { // Redirect.

	$returner[] = 'The variables presented were not what was expected. Please don\'t hack us.';

} // END varcheck IF-ELSE.
header("content-type:application/json");
echo json_encode($returner);
?>
