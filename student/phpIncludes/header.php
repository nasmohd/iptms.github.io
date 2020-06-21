<?php 
    session_start();
    include '../../DBconnection.php';


?>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title> IPT Management System  </title>
    
    <!-- Add a tab icon -->
    <link rel="icon" href="../../img/logo.png">
    
    <meta name="description" content="A convenient website designed specifically to ease Information Management during various IPT procedures for Students and Supervisors"/>

    
    <!-- CDN for dropdown menu, delete later if offline version found -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
        <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../../css/bootstrap.min.css">   
    
    
<!--    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css" type="text/css">-->
    
    <!-- css file from Bootstrap that will be used -->
    <link rel="stylesheet" href="../../styles/main_page.css" type="text/css">
    <link rel="stylesheet" href="../studentcss.css" type="text/css">
<!--    <link rel="stylesheet" href="../styles/sidebar.css" type="text/css">-->

<!--    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
<!--
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.13.0-web/css/fontawesome.min.css" type="text/css">
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.13.0-web/css/all.css" type="text/css">
-->
<!--    <link rel="stylesheet" href="font-awesome.css">-->
    
<!--    <link rel="stylesheet" href="font-awesome.min.css">-->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    
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
    
    <div class="container-fluid header" id="div_nav"> <!-- replace div_nav with myHeader -->
        <button class="openbtn mt-3" onclick="openNav()">&#9776;</button><!-- div_nav sets the header's attributes -->
        <div class="row">
<!--            style="background-color: cyan"-->
        <!-- div tag below is for the navigation button to toggle the navigation for this particular page -->
            <div class="col-lg-2 col-3 ml-auto mr-auto mt-3">
<!--
                    <div class="col-2">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">

                                <button type="button" id="sidebarCollapse" class="btn btn-info" style=" background-color: #333333">
                                    <i class="fa fa-bars" title="Edit" style="color: white"></i>
                                </button>
                            </div>
                        </nav>

                    </div>
-->
                    
<!--                <div class="ml-auto mr-auto">-->
                    <img src="../../img/logo7.png" class="img-fluid" style="width: 55px; height: 50px;"/>
                    <a class="" href="../../phpIncludes/logout.inc.php" style="color:white; font-size:13.5px; font-decoration: none;">Management System</a>
<!--                </div>                    -->
            </div>  
<!--            </div>-->
        </div> 
    </div>
            
<!--
            <div class="col-lg-5 col-5 ml-auto" >
                <div class="row">
                    
                    <div class="col-6 ml-auto mt-2">
                        <?php
                            if (isset($_SESSION['StudentID'])){
                                echo "<img class='img-fluid' id='user_img' src='../profile_pictures/".$_SESSION['ProfilePic_Name']."'>
                                <a href='../../phpIncludes/logout.inc.php' style='font-size: 14px; color:white;'>".$_SESSION['FirstName']." ".$_SESSION['LastName']."</a>
                                
                                ";   
                            }
                        ?>
                    </div>
                    
                    <style>
                        #user_img{
                            height: 90px;
                            width: 80px;
                        }
                    
                    
                    </style>

                </div>
            </div>          
-->
            
<!--
            <div class="col-lg-2 col-3 float-right mt-2 ml-auto" style="background-color: yellow; font-size: 13px;"> 
                
            </div>
            
            <div class="col-lg-1 col-md-3 col-3 float-right mt-1 ml-auto">
                <img src="../img/profile.png" class="img-fluid"/>
            </div> 
-->


<!-- UNDELETE THIS
<div class="wrapper">
        <nav id="sidebar">

            <div class="sidebar-header">
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                <a href="../main/index.php">Home</a>
                </li>
                
                <li>
                    <a href="../pages/placement.php">Placement</a>
                </li>
                
                <li>
                    <a href="../pages/reporting.php">Reporting</a>
                </li>
                                                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Logbook</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="../pages/daily_entry.php">Daily Entry</a>
                        </li>
                        <li>
                            <a href="../pages/weekly_entry.php">Weekly Entry</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="../pages/evaluation.php">Evaluation</a>
                </li>
                
                <li>
                    <a href="#">Contacts</a>
                </li>
            </ul>
        </nav>
-->

<!--
<style>
    #sidebar {
    width: 250px;
        position: relative;
/*    position: fixed;*/
    top: 0;
    left: -250px;
    height: 100vh;
    z-index: 999;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
    overflow-y: scroll;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}
    #sidebar.active {
    left: 0;
}
    
    #dismiss {
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    background: #7386D5;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
    
    .overlay {
    display: none;
    position: fixed;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    z-index: 998;
    opacity: 0;
    transition: all 0.5s ease-in-out;
}
    
    .overlay.active {
    display: block;
    opacity: 1;
}
    .dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}
    #content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
    position: absolute;
    top: 0;
    right: 0;
}
    
    </style>
-->
<!--  Navigation on top of the pages -->
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">User Info</a>
    <a href="../pages/placement.php">Placement</a>
    <a href="../pages/reporting.php">Reporting</a>
    <a href="../pages/logbook.php">Logbook</a>
    <a href="#">Contact us</a>
</div>

<div id="main">
<!--    <button class="openbtn mt-3" onclick="openNav()">&#9776;</button>-->
    
    <style>
    .sidebar {
        height: 100%; /* 100% Full-height */
        width: 200px; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0;
        left: 0;
        background-color: #333333; /* Black*/
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 60px; /* Place content 60px from the top */
        transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
    }

/* The sidebar links */
    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 15px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

/* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        color: #f1f1f1;
    }

/* Position and style the close button (top right corner) */
    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

/* The button used to open the sidebar */
    .openbtn {
        position: fixed;
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        background-color: #444;
    }

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s; /* If you want a transition effect */
        padding: 20px;
    }

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 14px;}
    }
    
        
/*    Style the header */

        
        
    </style>
    
    
<script>
function openNav() {
    document.getElementById("mySidebar").style.width = "200px";
//    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
//    document.getElementById("main").style.marginLeft = "0";
}
    
    
////Header customization
//// When the user scrolls the page, execute myFunction
//window.onscroll = function() {myFunction()};
//
//// Get the header
//var header = document.getElementById("div_nav");
//
//// Get the offset position of the navbar
//var sticky = header.offsetTop;
//
//// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
//function myFunction() {
//  if (window.pageYOffset > sticky) {
//    header.classList.add("sticky");
//  } else {
//    header.classList.remove("sticky");
//  }
//}
    
</script>
    
    

    
    
    