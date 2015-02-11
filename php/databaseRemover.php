<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welsh-Frey DB INSTALLER</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>DATABASE INSTALLER </h1>
<?php
////////////////////
// Programmer: Joshua T. Frey
// File:       databaseInstaller.php
// Description:  Defines and installs mysql tables for
//               the database for Welsh-Frey CloseSocial
//               network
// 
// Dependencies: databaseConnect.php

   # phpinfo();

    require_once 'interface.php';
    $connection = makeConnection( true );
    // while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) )  {
    //     foreach($row as $key => $value) {
    //         if( $value == 'websiteDB') {
    //             $dbExists = true;
    //             break;
    //         }
    //     }
    //
    //SET UP A LIST FOR OUTPUT

    $query = "DROP TABLE users, posts, thread_access, post_content, parent_thread;";
    if( mysqli_query($connection, $query) ) {
        echo 'database tables destroyed<br/>';
    }
    else {
        echo 'database could not be created, using default database<br/>';
 
    }

    closeConnection($database);

    echo 'reached end';
?>
</body>