<?php 
    session_start();
    include '../DBconnection.php';


?>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title> IPT Management System  </title>
    
    <!-- Add a tab icon -->
    <link rel="icon" href="../img/logo.png">
    
    <meta name="description" content="A convenient website designed specifically to ease Information Management during various IPT procedures for Students and Supervisors"/>

    
    <!-- CDN for dropdown menu, delete later if offline version found -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
        <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">   
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
<!--    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css" type="text/css">-->
    
    <!-- css file from Bootstrap that will be used -->
    <link rel="stylesheet" href="../styles/main_page.css" type="text/css">
    <link rel="stylesheet" href="studentcss.css" type="text/css">

<!--    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
<!--
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.13.0-web/css/fontawesome.min.css" type="text/css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.13.0-web/css/all.css" type="text/css">
-->
<!--    <link rel="stylesheet" href="font-awesome.css">-->
    
<!--    <link rel="stylesheet" href="font-awesome.min.css">-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    
<!--
    <script src="../plugins/fontawesome-free-5.13.0-web/js/fontawesome.js" type="text/javascript"></script>
    <script src="../plugins/fontawesome-free-5.13.0-web/js/solid.js" type="text/javascript"></script>
-->
    
<!--    CDN -->
    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
    
    </head>
    
<!--    <i class="fa fa-male"></i>-->

<body>      
    <div class="container-fluid" id="div_nav"> <!-- div_nav sets the header's attributes -->
        <div class="row">
<!--            style="background-color: cyan"-->
        <!-- div tag below is for the navigation button to toggle the navigation for this particular page -->
            <div class="col-lg-3 col-7 mr-auto" id="home_link">
                <div class="row">
                    <div class="col-2 mt-2">
                        <button type="button" id="sidebarCollapse" class="btn btn-info" style=" background-color: #333333">
                            <i class="fa fa-bars" title="Edit" style="color: white"></i>
                
<!--                <span>Toggle Sidebar</span>-->
                        </button>
                    </div>
                    
                    <div class="col-10 mr-auto">
                        <img src="../img/logo7.png" class="img-fluid" style="width: 55px; height: 50px;"/>
                        
                        <a class="" href="#" style="color:white; font-size:13.5px; font-decoration: none;">Management System</a>
                    </div>
                    
                    
                </div>  
            </div>

            
            <div class="col-lg-3 col-5 mt-2 ml-auto">
<!--                <p class="mt-4" style="color:white; font-size: 14px;"> Logged in as: <br/> </p>-->
                <div class="row">
                    <div class="col-6">
                        <?php
                            if (isset($_SESSION['StudentID'])){
                            
                            echo "<p class='mt-4' style='color:white; font-size:13px;'>Logged in as:<br/>".$_SESSION['FirstName']." ".$_SESSION['LastName']."</p>";}
                        ?>
                    </div>
                    
                    
                    <div class="col-6 mt-4">
                        <?php
                            if (isset($_SESSION['StudentID'])){
                            
                            echo "<form method='post' action='../phpIncludes/logout.inc.php'>
                            <button class='btn btn-primary'> LOG OUT </button> </form>"; }
                        ?>
                    </div>
                </div>
            </div>          
            
<!--
            <div class="col-lg-2 col-3 float-right mt-2 ml-auto" style="background-color: yellow; font-size: 13px;"> 
                
            </div>
            
            <div class="col-lg-1 col-md-3 col-3 float-right mt-1 ml-auto">
                <img src="../img/profile.png" class="img-fluid"/>
            </div> 
-->
        </div> 
    </div>
    
    
    
    
    