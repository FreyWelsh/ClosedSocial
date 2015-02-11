<?php

//this script loads all threads that the user is permissed to view
// and returns them as a json object

//create the session object iff none exists
if(!isset($_SESSION)) { session_start(); }

// Check to make sure user is logged in
if( isset($_SESSION['user_id']) ) {

	//connect to the database
	require_once('interface.php');
	$database = makeConnection(true);
	// echo 'att least it is running';
	//build the query string to find the thread ids a user is invited to
	$uid = $_SESSION['user_id'];
	//Return all threads you're allowed to see
	$query = "SELECT t.thread_id, p.content, posts.post_date, u.name 
				FROM thread_access AS t
				JOIN post_content AS p ON p.post_id=t.thread_id 
				JOIN posts ON posts.post_id=t.thread_id 
				JOIN users AS u ON u.user_id=posts.user_id 
				WHERE t.user_id='$uid'
				ORDER BY posts.post_date DESC";
	$result = mysqli_query($database, $query);

	// $threads = mysqli_fetch_all($result, MYSQLI_NUM);
	$threads = array(); 
	while($row = mysqli_fetch_assoc($result)) {
		$threads[] = $row;
	}
	echo json_encode($threads);
	closeConnection($database);

}