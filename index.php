<!DOCTYPE HTML>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Put Content Here">
    <meta name="keywords" content="Put keywords here">
    <meta name="author" content="Put your name here">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>DB Name</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="css/l3_data_style.css"> 
        <link rel="stylesheet" href="css/font-awesome.min.css">
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
    
            <h1>DB Name</h1>
        </div>    <!-- / banner -->

        <!-- Navigation goes here.  Edit BOTH the file name and the link name -->
        <div class="box nav">
            
            <div class="linkwrapper">
                <div class="commonsearches">
                    <a href="#l">Item</a> | 
                    <a href="#">Item</a> | 
                    <a href="#">Item</a> 
                </div>  <!-- / common searches -->
            
                <div class="topsearch">
                    
                    <!-- Quick Search -->           
                    <form method="post" action="quick_search.php" enctype="multipart/form-data">

                        <input class="search quicksearch" type="text" name="quick_search" size="40" value="" required placeholder="Quick Search..." />

                        <input class="submit" type="submit" name="find_quick" value="&#xf002;" />

                    </form>     <!-- / quick search -->
                    
                </div>  <!-- / top search -->
                
                <div class="topadmin">
                    <a href="#">Log In</a>
                    
                </div>  <!-- / top admin -->
                
            </div>  <!--- / link wrapper -->
            
        </div>    <!-- / nav -->        
        
        <div class="box main">
            
        <?php

        if(!isset($_REQUEST['page'])) {
            include("content/home.php");
        }
        else {
            include("content/$page.php")
        }

        ?>
            
        </div>    <!-- / main -->
        

        <div class="box footer">
            CC Harish Peddi 2023
        </div>    <!-- / footer -->
    
    </div>  <!-- / wrapper  -->
    
</body>        
