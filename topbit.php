<!DOCTYPE HTML>

<html lang="en">
    
<?php
    
    session_start(); // to allow variable transfer between pages...
    include("config.php");
    
    // Connect to database...
    $dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if(mysqli_connect_errno()) {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }
    
    ?>
    
<head>
    <meta charset="utf-8">
    <meta name="description" content="art, drawing ">
    <meta name="author" content="Samuel Kennedy">
    <meta name="keywords" content="art, drawing">
    
    <title>Art Database</title>

    <!-- for multiple fonts change | to %7c * no spaces*  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet">  
    <link rel="stylesheet" href="css/WeezerFont.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/data_style.css">    <!-- custom style sheet -->

    
</head>

<body>
    
    <p class="message">Eek!  Your browser does not support grid.  Please upgrade your system.</p>
    
    <div class="wrapper">
    
        <!-- logo / small image goes here -->
        <div class="box logo">
            <h1><a href="index.php">The Game</a></h1> 
        </div> <!-- / logo -->
        
        <div class="box banner">
            <h5><a href="index.php" >Home</a> | <a href="database.php">Advanced Search</a> | <a href="contact.php" >About</a></h5>
            
            <h6>
                <form class="searchform" method="post" action="search_name.php" enctype="multipart/form-data">

                    <input class="search" type="text" name="item_name" size="30" value="" required placeholder="Search the database..."/>

                    <input class="submit" type="submit" name="find_item_name" value="&#xf002;"/>

                </form>
            </h6>
            
        </div> <!-- / banner -->
        

