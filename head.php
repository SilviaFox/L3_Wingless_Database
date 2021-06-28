<!DOCTYPE HTML>

<html lang="en">


<?php
    
    session_start(); // to allow variable transfer between pages...
    include("config.php");
    include("functions.php");
    
    // Connect to database...
    $dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if(mysqli_connect_errno()) {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }
    
    ?>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Level 3 website for Level 3 game">
    <meta name="author" content="Samantha Kennedy">
    <meta name="keywords" content="game, gaming, indie">

    <title>H0ST LIBRARY</title>

    <!-- for multiple fonts change | to %7c * no spaces*  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet">
    <link rel="stylesheet" href="css/WeezerFont.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/data_style.css"> <!-- custom style sheet -->
    <link rel="stylesheet" href="css/auto_complete">


</head>

<body>

    <p class="message">Eek! Your browser does not support grid. Please upgrade your system.</p>