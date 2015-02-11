<?php
	if(!isset($_SESSION)) { session_start(); }

	require_once('interface.php');
	$database = makeConnection(true);

	$user = $_SESSION['user_id'];
	$query = "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1";
	$result = mysqli_query($database, $query);
	$row = mysqli_fetch_object($result);
		// $threadnum++;
	$threadnum = $row->post_id;
	$threadnum++;
	mysqli_free_result($result);

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
	
	$query = "INSERT INTO thread_access (thread_id, user_id)";
	$query .= "VALUES";
	$query .= "('$threadnum', '$user')";
	foreach($_POST['users'] as $key) {
		$query .= ", ('$threadnum', '$key')";
	}

	$result = mysqli_query($database, $query);
	if(!(mysqli_affected_rows($database) >= 1)) {
		header("content-type:application/json");
		$error = array();
		$error[] = "it broke on the thread_access insertion";
		echo json_encode($error);
		exit();
	}
	mysqli_free_result($result);
	$content = mysqli_real_escape_string($database, $_POST['content']);
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