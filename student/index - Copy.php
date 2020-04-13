<?php
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
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    
<!--    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css" type="text/css">-->
    
    <!-- css file from Bootstrap that will be used -->
    <link rel="stylesheet" href="../styles/main_page.css" type="text/css">
    <link rel="stylesheet" href="studentcss.css" type="text/css">

    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
<!--    CDN -->
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    </head>


<body>      
    <div class="container-fluid" id="div_nav"> 
        <div class="row">
            
            <div class="col" style="position:relative;" id="home_link">
            <img src="../img/logo7.png" class="img-fluid" style="width: 55px; height: 50px;"/>
            <a class="" href="#" style="color:white; position:relative;"> 
                    Management System</a> </div>
            
            
            <div class="row">
            <div class="col">
            <nav class="navbar navbar-expand-lg navbar-dark" id="navTop">
<!--                <img src="img/logo7.png" class="img-fluid" style="width: 55px; height: 50px;"/>-->
                
                
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" 
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                        aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            <ul class="navbar-nav mr-auto" id="navColor">
                <li class="nav-item active">
                <a class="nav-link" href="#" id="navText">Home
                    <span class="sr-only">(current)</span>
                    </a></li>
                
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                   style="color:white; font-size: 15px;">IPT Modules</a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropNav">
                
                <a class="dropdown-item" href="action" >Placement $ Application</a>
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item" href="action2">Reporting $ Arrival</a>
                <div class="dropdown-divider"></div>
                    
                <a class="dropdown-item" href="action2">Logbook Entry $ Assessment</a>
                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item" href="action2">Evaluation $ Review</a>
                
                    </div></li>
                
                
                <li class="nav-item">
                <a class="nav-link" href="#" id="navText">About Us</a></li>
                
                <li class="nav-item">
                <a class="nav-link" href="#" id="navText">Contacts</a></li>  
                    </ul>
                </div>
                </nav>
            </div></div>
        </div>
    
    <br/> <br/> <br/> <br/> <br/> <br/>
    
    <div class="row">
    <div class="col">
        <form class="form-login d-flex justify-content-center" method="post" action="phpIncludes/login.inc.php">
            <div class="form-group">
            <label for="text"> Registration Number </label>
                <input type="text" class="form-control" placeholder="Registration Number" name="regNo" 
                       value="170210225935">
            
            <br/>
            <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="pwd" value="12345">
                <button type="submit" class="btn btn-primary" id="submitButton"
                        style="background-color: #306FA0;"> LOG IN </button>
                
            </div>
            </form>
       </div>
    </div> </div>
    
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>
    
    <!-- Page Content -->
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info" style="background-color: #306FA0">
                <i class="fas fa-bars" style="color: white"></i>
<!--                <span>Toggle Sidebar</span>-->
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>

        </div>
    </nav>
</div>
    
    

</div>

    <script src="../js/popper.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- Optional jQuery file that will be used -->
    <script src="../js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>

    
    </body>
    
    
</html>
