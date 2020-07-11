<?php 
    session_start();
    include '../../DBconnection.php';


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IPT Management System</title>
    <link rel="icon" href="../../img/logo.png">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../styles/sidebar.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar code starts here  -->
        <nav id="sidebar">
           
           <!-- arrow to dismiss the sidebar -->
            <div id="dismiss"> 
                <i class="fas fa-arrow-left"></i>
            </div>

<!--
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>
-->

            <ul class="list-unstyled components mt-5">
<!--                <p>Logged User</p>-->
               
               
                <li style="margin-top: 13vh;">
                   <hr>
                    <a href="../pages/profile.php"><span class="">
                    <?php
                        echo "
                    <img class='img-fluid rounded-circle' src='../profile_pictures/".$_SESSION ['ProfilePic_Name']."' width='60vw'>
                        ";
                    ?>
<!--                    <i class="nav-icon fas fa-user"></i>-->
                    </span>
                    
                    <?php
                    echo "
                    <span class='ml-1' id='sidebar_lnk' style='font-size:13px;'>".$_SESSION['FirstName']." ".$_SESSION['LastName']."</span>";
                        
                    ?>
                    </a>      
                </li>
                <hr>
                
                <li class="active" >
                    <a href="../main/index.php"><span class="ml-3">
                    <i class="nav-icon fas fa-tachometer-alt"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Dashboard</span>
                    </a>
                </li>
                   
                <li>
                    <a href="../pages/reporting.php"><span class="ml-3">
                    <i class="nav-icon fas fa-flag"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Reporting</span>
                    </a>
                </li>
                
                <li>
                    <a href="../pages/logbook.php"><span class="ml-3">
                    <i class="mr-1 nav-icon fas fa-book"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Logbook</span>
                    </a>
                </li>
                    
                <li>
                    <a href="../pages/tasks.php"><span class="ml-3">
                    <i class="nav-icon fas fa-list-alt"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Tasks</span>
                    </a>
                </li>
                  
                <li>
                    <a href="../pages/placement.php"><span class="ml-3">
                    <i class="nav-icon fas fa-building"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Placement</span>
                    </a>
                </li>
                   
                <li>
                    <a href="#"><span class="ml-3">
                    <i class="mr-1 nav-icon fas fa-file"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Library</span>
                    </a>
                </li>
                
                <li>
                    <a href="#"><span class="ml-3">
                    <i class="nav-icon fas fa-question-circle"></i></span>
                    <span class="ml-2" id="sidebar_lnk">How to Use</span>
                    </a>
                </li>
                    
                <li>
                    <a href="#"><span class="ml-3">
                    <i class="nav-icon fas fa-cog"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Settings</span>
                    </a>
                </li>
                   
                <li style="color: green;">
<!--                   <div class="dropdown-divider" style="color:black;"></div>-->
                    <a href="../../phpIncludes/logout.inc.php"><span class="ml-3">
                    <i class="nav-icon fas fa-sign-out-alt"></i></span>
                    <span class="ml-2" id="sidebar_lnk" style="font-weight:bold;">Logout</span>
                    </a>
                </li>
            </ul>
        
        </nav>
    <div class="overlay"></div>
        <!-- All the Page Contents go inside here  -->
    <div class="content">
        <div id="content2">
            <nav class="navbar navbar-expand-lg" id="my_nav">
                <div class="container-fluid">
                    <div class="col-lg-1 col-2">
                        <button type="button" id="sidebarCollapse" class="col-lg-8 btn btn-info" style="background-color: #FFFFFF; color: #306FA0;">
                        <span style="font-weight:bold;"><i class="fas fa-bars"></i></span>
                        </button>
                    </div>
                
                    <div class="col-lg-8 ml-auto mr-auto col-7">
                        <!-- Just added this form below -->
                        <form class="ml-5 form-inline">
                        <div class="col-lg-10 ml-4 input-group input-group-md">
                            <input class="col-lg-12 col-12 form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                            <span style="color: #306FA0; background-color: #FFFFFF;"><i class="fas fa-search"></i></span>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    <!-- Right side of nav -->
                    <div class="col-lg-1 col-3" >
                       <div class="row">


                        <!-- Notification Icon and information -->
                        <div class="dropdown" >
                            <a class="nav-link" data-toggle="dropdown" href="#" style="background-color:white; border-radius:20px;">
                                <span style="background-color:white; color: #306FA0;">
                                    <i class="fas fa-bell"></i>
                                </span>
    <!--                        <span class="badge badge-warning navbar-badge text-center">15</span>-->
                            </a>
                            <div class="dropdown-menu col-lg-12 text-center">
                                <li><a href="#">Notif 1</a></li>
                                <li><a href="#">Notif 2</a></li>
                            </div>  
                        </div>
                        </div>
                    </div>
     
                </div>
            </nav>
            
        </div>
           