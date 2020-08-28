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
            
            <div class="mx-3 text-center" style="margin-top:10vh;">
                <img src="../../img/logo3.png" class="img-fluid" style="height: 10vh;">
                
            </div>

<!--
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>
-->

            <ul class="list-unstyled components">
<!--                <p>Logged User</p>-->
               
               
                <li > <!-- style="margin-top: 13vh;" -->
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
<!--
                <table>
                <tr>
                    <td></td>
                    
                    
                </tr>
-->
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
                    <i class="mr-1 nav-icon fas fa-list-alt"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Tasks</span>
                    </a>
                </li>
                  
                <li>
                    <a href="../pages/placement.php"><span class="ml-3">
                    <i class="mr-1 nav-icon fas fa-building"></i></span>
                    <span class="ml-2" id="sidebar_lnk">Review</span>
                    </a>
                </li>
                   
<!--
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
-->
                   
                <li style="color: green;">
<!--                   <div class="dropdown-divider" style="color:black;"></div>-->
                    <a href="../../phpIncludes/logout.inc.php"><span class="ml-3">
                    <i class="nav-icon fas fa-sign-out-alt"></i></span>
                    <span class="ml-2" id="sidebar_lnk" style="font-weight:bold;">Logout</span>
                    </a>
                </li>
                </table>
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
                    
                    <div class="col-lg-8 col-7 ml-auto mr-auto">
                       <div class="col-lg-5 col-6 ml-auto mr-auto">
                        <img src="../../img/logo6.png" class="img-fluid" style="height:5vh; width:20vw;">
                        </div> 
                    </div>
                
<!--
                    <div class="col-lg-8 ml-auto mr-auto col-7">
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
-->
                    
                    <!-- Right side of nav -->
                    <div class="col-lg-1 col-3">
                       <div class="row">


                        <!-- Notification Icon and information -->
                        <div class="dropdown" >
                            <a class="nav-link btn" href="#" style="background-color:white; border-radius:20px;" >
                            <!-- data-toggle="modal" data-target="#modal-default" -->
                            <span style="background-color:white; color: #306FA0;"><i class="fas fa-bell"></i>
                                </span>
    <!--                        <span class="badge badge-warning navbar-badge text-center">15</span>-->
                            </a>
                            
                            <form method="post" style="font-size:14px;">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #306FA0; color:white;">
              <h5 class="modal-title">NOTIFICATIONS</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>Choose Color:</label>
                        <select class="form-control" name="color" id="color_select" onclick="add_color('#007BFF')">
                            <option selected disabled style="background-color:white;"> Select One</option>
                          <option class='bg-primary text-light' id="option_menu">#007BFF</option>
                          <option class="bg-warning text-light" onclick="add_color('#FFC107')" id="option_menu">#FFC107</option>
                          <option class="bg-success text-light" onclick="add_color('#28A745')" id="option_menu">#28A745</option>
                          <option class="bg-danger text-light" onclick="add_color('#DC3545')" id="option_menu">#DC3545</option>
                          <option class="bg-dark text-light" onclick="add_color('#6C757D')" id="option_menu">#6C757D</option>
                          <option class="bg-info text-light" onclick="add_color('#17A2B8')" id="option_menu">#17A2B8</option>
                           
                        </select>
                    </div>
   
                    <div class="col col-md-5 mt-2">
                      <label>Subject:</label>
                        <select class="form-control" name="subject">
                          <option>Mathematics</option>
                          <option>English</option>
                          <option>Kiswahili</option>
                          <option>Geography</option>
                          <option>History</option>
                          <option>Civics</option>
                          <option>Chemistry</option>
                          <option>Physics</option>
                          <option>Biology</option>
                          <option>Book Keeping</option>
                          <option>Commerce</option> 
                        </select>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>From:</label>
                      <input type="date" name="from_date" class="form-control" placeholder="From date" style="font-size:14px;" required>
                    </div>
                    
                    <div class="col col-md-5 mt-2">
                      <label>To:</label>
                      <input type="date" name="to_date" class="form-control" placeholder="To date" style="font-size:14px;" required>
                    </div>
                     
                  </div>
                </div>
                 
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>STARTING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="start_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="start_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                 
                 <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>ENDING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="end_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="end_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                
<!--
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="4" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
-->
                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #306FA0; color:white;"><span style="font-size:14px;">Close</span></button>

              <button type="submit" name="clear_all" data-dismiss="modal" class="btn btn-primary" style="background-color: #306FA0; color:white;"><span style="font-size:14px;">Clear All</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
<!--
                            <div class="dropdown-menu col-lg-4 text-center">
                                <li><a class='ml-2 float-left' href="../pages/notification.php" style="color: #306FA0; font-size:13px; font-weight:bold;">Go to Notifications</a></li>
                            </div>  
-->
                        </div>
                        </div>
                    </div>
     
                </div>
            </nav>
            
        </div>
           