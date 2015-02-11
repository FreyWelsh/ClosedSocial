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

    $connection = makeConnection( );
    // while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) )  {
    //     foreach($row as $key => $value) {
    //         if( $value == 'websiteDB') {
    //             $dbExists = true;
    //             break;
    //         }
    //     }
    //
    //SET UP A LIST FOR OUTPUT
    echo '<ul>';
    $query = "CREATE DATABASE websiteDB";
    if( mysqli_query($connection, $query) ) {
        mysqli_select_db($connection, 'websiteDB');
    }
    else {
        echo 'database could not be created, using default database';
        //**********************************//
       // exit( 'database creation errror, script halted so you can figure out what you must do');
    }
    ////////////
    // DEFINE USERS TABLE

    //NOT using IF NOT EXISTS so we can check for the error
    //  condition and alert
    $query = "CREATE TABLE users(
        user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        email VARCHAR(60) NOT NULL,
        pass CHAR(40) NOT NULL,
        user_level TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
        active CHAR(32),
        registration_date DATETIME NOT NULL,
        PRIMARY KEY (user_id),
        UNIQUE KEY (email),
        INDEX login (email, pass) )";
    if( !mysqli_query($connection, $query) ){
        echo '<li>error occured in creation of users table</li>';
    }
    else {
        echo '<li>users table created</li>';
    }

    /////////////////
    // DEFINE TABLE POSTS
    $query = "CREATE TABLE posts (
        post_id INT UNSIGNED AUTO_INCREMENT,
        user_id INT UNSIGNED NOT NULL,
        thread_id INT UNSIGNED,
        important_flag BOOLEAN,
        post_date DATETIME NOT NULL,
        PRIMARY KEY (post_id) )";
    if( !mysqli_query($connection, $query) ){
        echo '<li>error occured in creation of posts table</li>';
    }
    else {
        echo '<li>posts table created</li>';
    }


    //////////////////
    // DEFINE TABLE thread_access
    $query = "CREATE TABLE thread_access (
        thread_id INT UNSIGNED NOT NULL,
        user_id INT UNSIGNED NOT NULL )";
    if( !mysqli_query($connection, $query) ){
        echo '<li>error occured in creation of thread_access table</li>';
    }
    else {
        echo '<li>thread_access table created</li>';
    }

    ////////////////
    // DEFINE TABLE post_content
    $query = "CREATE TABLE post_content (
        post_id INT UNSIGNED AUTO_INCREMENT,
        content VARCHAR(500),
        PRIMARY KEY (post_id) )";
    if( !mysqli_query($connection, $query) ){
        echo '<li>error occured in creation of post_content table</li>';
    }
    else {
        echo '<li>post_content table created</li>';
    }

    ////////////////
    // DEFINE TABLE parent_thread
    $query = "CREATE TABLE parent_thread (
        child_thread_id INT UNSIGNED NOT NULL,
        parent_thread_id INT UNSIGNED NOT NULL,
        PRIMARY KEY (child_thread_id) )";
    if( !mysqli_query($connection, $query) ){
        echo '<li>error occured in creation of parent_thread table</li>';
    }
    else {
        echo '<li>parent_thread table created</li>';
    }

    //end list
    echo '</ul>';

    // $query = "SHOW COLUMNS FROM users";
    // $result = mysquli_query($connection, $query);

    closeConnection($database);
    showSchema();
    echo 'reached end';
?>
</body>