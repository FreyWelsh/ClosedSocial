<?php

if(!isset($_SESSION)) { session_start(); }

	require_once('interface.php');
	$database = makeConnection(true);

	$user = $_SESSION['user_id'];

	$content = mysqli_real_escape_string($database, $_POST['content']);
	$threadnum = $_POST['tid'];

	$query = "INSERT INTO posts ( thread_id, user_id, important_flag, post_date)";
	$query .= "VALUES ('$threadnum','$user', FALSE, NOW())";

	$result = mysqli_query($database, $query);

	if(!(mysqli_affected_rows($database) == 1)) {
		header("content-type:application/json");
		$error = array();
		$error[] = "it broke on the posts insertion";
		echo json_encode($error);
		exit();
	}
	mysqli_free_result($result);
	
	//discover the id of the post we just made	
	$query = "SELECT post_id FROM posts WHERE (user_id = '$user') ORDER BY post_id DESC LIMIT 1";
	$result = mysqli_query($database, $query);
	$row = mysqli_fetch_object($result);
		// $threadnum++;
	$threadnum = $row->post_id;
	mysqli_free_result($result);

	$query = "INSERT INTO post_content (post_id, content)";
	$query .= "VALUES ('$threadnum', '$content')";
	$result = mysqli_query($database, $query);
	if(!(mysqli_affected_rows($database) == 1)) {
		header("content-type:application/json");
		$error = array();
		$error[] = "it broke on the content insertion";
		echo json_encode($error);
		exit();
	}
	$success = array();
	$success[] = "ran successfully";
	echo json_encode($success);

	closeConnection($database);

?>