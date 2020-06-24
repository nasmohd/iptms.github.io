<?php 
    session_start();
    include '../../DBconnection.php';


?>


<!DOCTYPE html>
<html lang="en-US">
<head>
   <!-- Start of the head tag -->
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

    <!--   -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">   
    <link rel="stylesheet" href="../plugins/plugins/fontawesome-free/css/all.min.css">
    
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
 
 
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- css file from Bootstrap that will be used -->
    <link rel="stylesheet" href="../../styles/main_page.css" type="text/css">
    <link rel="stylesheet" href="../studentcss.css" type="text/css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    </head> 
    <!-- End of the head tag -->

<body>
    <!-- Start of the body tag -->
 
    <div class="container-fluid header" id="div_nav"> <!-- replace div_nav with myHeader -->
        <button class="openbtn mt-3 ml-5" onclick="openNav()" style="background-color: transparent;">&#9776;</button><!-- div_nav sets the header's attributes -->
        <div class="row">

            <div class="col-lg-2 col-3 ml-auto mr-auto mt-3">
                <img src="../../img/logo7.png" class="img-fluid" style="width: 55px; height: 50px;"/>
                <a class="" href="../../phpIncludes/logout.inc.php" style="color:white; font-size:13.5px; font-decoration: none;">Management System</a>
            </div>  

        </div> 
    </div>
            

<!--  Navigation on top of the pages -->


<div id="main">
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style='background-color:transparent'>&times;</a>

        <a class="mt-5" href="#"><span style="font-size: 20px;">&#128104;</span> Profile</a>
    <!--    <div style="background-color:white;"><hr> </div>-->
        <a class='' href="../main/index.php"><span class='ml-1' style="font-size: 20px;">&#8962;</span> <span id='sidebar_txt' class="ml-2">Home</span></a>
        <a href="../pages/placement.php"><span style="font-size: 20px;">&#x1F3E2;</span> <span id='sidebar_txt' class="ml-1">Placement</span></a>
        <a href="../pages/reporting.php"><span style="font-size: 20px;">&#9873;</span> <span id='sidebar_txt' class="ml-2">Reporting</span></a>
        <a href="../pages/logbook.php"><span style="font-size: 20px;">&#128366;</span><span id='sidebar_txt' class="ml-1">Logbook</span></a>
        <a href="#"><span style="font-size: 20px;">&#9742;</span> <span id='sidebar_txt' class="ml-1">Contacts</span></a>

        <a href="#" id='settings_btn'><span style="font-size: 20px;">&#9881;</span> <span id='sidebar_txt' class="ml-2">Settings</span></a>
    </div>

<!--    <button class="openbtn mt-3" onclick="openNav()">&#9776;</button>-->
    
    <style> 

    .sidebar {
        margin-top:80px;
        height: 100%; /* 100% Full-height */
        width: 0px; /* 0 width - change this with JavaScript */
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0;
        left: 0;
        background-color: #112637; /* Black*/
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 60px; /* Place content 60px from the top */
        /* transition: 0.5s;  */
        /* 0.5 second transition effect to slide in the sidebar */
    }

/* The sidebar links */
    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 15px;
        color: #919191;
        display: block;
        /* transition: 0.3s; */
    }
        
/*
    .sidebar a:link, a:visited{
        background-color: #EEEEEE;
        color: black;
    }
*/
        
/* setting at the bottom of the sidebar
    .sidebar #settings_btn{
        position: absolute;
        bottom: 0;
    }
*/
        
/*
        .sidebar a #sidebar_txt{
            
        }
*/

/* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        color: #f1f1f1;
        background-color: #306FA0;
    }    
        
/*
    .sidebar a:last-child:hover {
        background-color: transparent;
    }
*/

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
    
//var wd = document.getElementById("mySidebar").style.width;
//    alert (wd);
//if (wd == "200px"){
//    function openNav(){
//        document.getElementById("mySidebar").style.width = "0";
//    }
//}

</script>
    
    

    
    
    