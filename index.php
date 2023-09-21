<!DOCTYPE HTML>

<?php

    session_start();
    include("config.php");
    include("functions.php");

    // connect to database
    $dbconnect=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno()) {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Put Content Here">
    <meta name="keywords" content="Put keywords here">
    <meta name="author" content="Put your name here">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Indian Food Database</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="css/l3_data_style.css"> 
        <link rel="stylesheet" href="css/font-awesome.min.css">
    
</head>
    
<body>
    
    <div class="wrapper">
    
    <?php include("banner_navigation.php") ?>
        
        <div class="box main">
            
        <?php

        if(!isset($_REQUEST['page'])) {
            include("content/home.php");
        }
        else {
            $page = preg_replace('/[^0-9a-zA-z]-/', '', $_REQUEST['page']);
            include("content/$page.php");
        }

        ?>
            
        </div>    <!-- / main -->
        

        <div class="box footer">
            CC Harish Peddi 2023
        </div>    <!-- / footer -->
    
    </div>  <!-- / wrapper  -->
    
</body>        
