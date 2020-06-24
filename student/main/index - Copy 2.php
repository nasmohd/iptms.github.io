<?php
    include '../phpIncludes/header.php';
//    include 'phpIncludes/header.php';

?>



<!-- USE THE CODE BELOW CONTINUING FROM HERE ON
<body>      
    <div class="container-fluid" id="div_nav">  //div_nav sets the header's attributes 
        <div class="row">
-->

<!--
            <div class="row">
            <div class="col">
            <nav class="navbar navbar-expand-lg navbar-dark" id="navTop">

                
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
-->
        
        
        <!-- <div class="row"> -->
        <!-- <div class="dropdown"> -->
 <!-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Dropdown Button </button> -->
 <!-- <div class="dropdown-menu"> -->
 <!-- <a class="dropdown-item" href="#">Link 1</a> -->
 <!-- <a class="dropdown-item" href="#">Link 2</a> -->
 <!-- <a class="dropdown-item" href="#">Link 3</a> -->
 
 <!-- </div> -->
 
    

<!--</div>-->
    
<!-- Log in was here -->
<!--    </div>-->

    
<!-- Sidebar Content -->
<!--
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" aria-expanded="false" >Home</a>
-->
<!--                data-toggle="collapse" attribute in <a> tag and class="dropdown-toggle"  -->
<!--
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
-->
                
                
<!--                From here -->
<!--
            </li>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">IPT Modules</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="../pages/placement.php">Placement &amp; Application</a>
                    </li>
                    <li>
                        <a href="../pages/reporting.php">Reporting &amp; Arrival</a>
                    </li>
                    <li>
                        <a href="../pages/logbook.php">Logbook Entry &amp; Assessment</a>
                    </li>
                    <li>
                        <a href="../pages/evaluation.php">Evaluation &amp; Review</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About Us</a>
            </li>
            <li>
                <a href="#">Contacts</a>
            </li>
        </ul>
    </nav>
-->
    
    <!-- Page Content -->
<!--    this down -->
<!--
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
-->
<!-- To here -->
    
<!--
            <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin-left: -10px; background-color: #333333">
                <i class="fa fa-bars" title="Edit" style="color: white"></i>
                
                <span>Toggle Sidebar</span>
            </button>
-->
<!--
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
-->

<!--
        </div>
    </nav>
</div>
    
</div>
-->

    
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <!-- Optional jQuery file that will be used -->
    <script src="../../js/bootstrap.min.js"></script>

        <script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
    
<!--    <script src="../js/popper.min.js"></script>-->
<!--    <script src="../js/popper.js"></script>-->
<!--    <script src="../js/jquery-3.2.1.min.js"></script>-->
    <!-- Optional jQuery file that will be used -->
<!--    <script src="../js/bootstrap.min.js"></script>-->
    
    
<!--    For the navbar -->
<!--
    <script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
-->

    
    </body>
</html>
