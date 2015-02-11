<?php

//create the session object iff none exists
if(!isset($_SESSION)) { session_start(); }

// Check to make sure user is logged in
if( isset($_POST['tid']) ) {
	$thread = $_POST['tid'];
	// $thread = 32;
	//connect to the database
	require_once('interface.php');
	$database = makeConnection(true);
	// echo 'att least it is running';
	//build the query string to find the comments that belong to the thread referenced

 	
	$query = "SELECT posts.post_date, u.name, p.content
				FROM posts
				JOIN post_content AS p ON p.post_id=posts.post_id
				JOIN users AS u ON u.user_id=posts.user_id
				WHERE posts.thread_id='$thread'
				AND posts.post_id!='$thread'
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
?>