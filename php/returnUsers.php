<?php
if(!isset($_SESSION)) { session_start(); }

if(isset($_SESSION['user_id'])) {
	// echo 'hellow world';
	require_once('interface.php');
	$database = makeConnection( true );
    $uid = $_SESSION['user_id'];
	$query = "SELECT user_id, name FROM users WHERE user_id != '$uid'";

	// echo $query;
	$result = mysqli_query($database, $query);
	// echo '<pre>' . var_dump($result) . '</pre>';

	$users = array(); 
	while($row = mysqli_fetch_assoc($result)) {
		$users[] = $row;
	}

	// echo ('<br /><pre>' . var_dump($users) . '</pre>');

	echo json_encode($users);
 
	closeConnection($database);
}

?>