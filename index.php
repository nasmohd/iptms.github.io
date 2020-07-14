<?php
    include 'DBconnection.php';

?>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A website for simplified Information Management during IPT sessions for Students and Supervisors"/>
    <meta name="author" content="Nassor Mohamed Suleiman">
    <meta name="keywords" content="IPT sessions, Management System">
    
    <title> IPT Management System  </title>
    
    <!-- Add tab icon -->
    <link rel="icon" href="img/logo.png">
    
    
    
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    
<!--    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css" type="text/css">-->
    
    <!-- css file from Bootstrap that will be used -->
    <link rel="stylesheet" href="styles/main_page.css" type="text/css">

    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
<!--    CDN LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    
    </head>


<body>
    
<!--    <div class="container-fluid" id="div_nav"> -->
        
<div class="container-fluid" id="div_nav">
    <div class="row">
        <div class="col-lg-3 mt-4 ml-auto mr-auto" style="position:relative;">
            <img src="img/logo8.png" class="img-fluid" style="height: 40px;"/>
        </div>
            
    </div>
</div>
    <br/> <br/> 
 

<div class="container">    
    <div class="row">
<!--        <div class="col-lg-4"></div>-->        
<!--        <div class="col-lg-7 col-12 ml-auto mr-auto">-->
        <div class="col-lg-4 col-10 mr-auto ml-auto" style="color:white; background-color: #306FA0; height: 60px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <div class="text-center pt-3" style="font-size: 17px;">
                <p> STUDENT LOG IN </p>
                    
            </div>
                        
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg-4 col-10 ml-auto mr-auto" id="loginForm"
             style="border: 2px solid rgba(48, 111, 160, 0.6); border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;">
            
            <form method="post" action="phpIncludes/login.inc.php">
            <div class="form-group"> <!-- style="border:3px solid rgba(48, 111, 160, 0.4)" -->
                
                                
                <div class="row d-flex justify-content-center">
                    
<!--
                    <div class="col-lg-10">
                    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: pink;"> 
                        <div class="row">
                <ul class="nav nav-pills nav-tabs" id="pills-tab" role="tablist">
<div class="col-lg-4 d-flex justify-content-center" style="background-color: yellow;">        
  <li class="nav-item" style="margin-left:-2px;">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Student</a>
  </li></div>
                    
<div class="col-lg-4 d-flex justify-content-center">           
  <li class="nav-item" style="margin-left:-2px;">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
        <span style="text-align: center;">Institute</span> <br/>Supervisor </a>
  </li></div>
                    
<div class="col-lg-4 d-flex justify-content-center">
  <li class="nav-item" style="margin-left:-2px;">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Industrial <br/>Supervisor</a>
                        </li></div>
</ul>    </div></div>  
                </div> 
                    </div>
-->
                    
                <div class="col-lg-10 col-12 mt-5">
                    <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Registration Number" value="170210225935">
                </div>
                
                <div class="col-lg-10 col-12 mt-3">
                    <input type="password" class="form-control input-sm" id="input" name="pwd" placeholder="Password" value="cl">
                </div>
                    <!-- delete the value attribute here and above -->
                    
                    
                <div class="col-lg-10 col-12 mt-2" id="WrongPassword" style="color: red; visibility: hidden; display:none; font-size:14px;">
                    <p><span class='mr-2' style="font-size:17px; font-weight: bold;">&#10071;</span> Incorrect Reg. Number or Password </p>
                </div>
                    
                <div class="col-lg-10 col-12 mt-2" id="AccntLogout" style="color: green; visibility: hidden; display:none; font-size:14px;">
                    <p><span class='mr-2' style="font-size:17px; font-weight: bold;">&#10003;</span>Logged out Successfully </p>
                </div>
                    
                <div class="col-lg-10 col-12 mt-3">
                    <button type="submit" id="input1" class="btn col-12" style="background-color: #306FA0; color:white" name="login"> LOG IN</button>
                </div>
                
                <?php
                    //Incorrect Password
                    $requestUrl = $_SERVER ['REQUEST_URI'];
                    $urlComponents = explode ('/', $requestUrl);
                     
                    $dot = explode ('.', $urlComponents[2]);
                    $dot_len = count($dot);
                    
                    if ($dot_len > 1){
                        $lenurl = strlen($dot[1]);
                        $last = $lenurl - 1;
                    
                        if (($lenurl >3) && ($dot[1][$last] == '?')){
                        echo "<script>
                            document.getElementById('WrongPassword').style.display = 'block';
                            document.getElementById('WrongPassword').style.visibility = 'visible';
                            document.getElementById('input1').style.marginTop = '-30px';
                            
                            setTimeout(function(){
                                document.getElementById('WrongPassword').style.display = 'none';
                            document.getElementById('WrongPassword').style.visibility = 'hidden';
                            
                            document.getElementById('input1').style.marginTop = '0px';

                            }, 4000);
                            
                            </script>";
                    }
                        }
                ?>                
                    
                <?php 
                    //Logout Successful
                    $requestUrl2 = $_SERVER ['REQUEST_URI'];
                    $urlComponents2 = explode ('/', $requestUrl2);
                     
                    $dot2 = explode ('.', $urlComponents2[2]);
                    $dot_len2 = count($dot2);
                    
                    if ($dot_len2 > 1){
                        $lenurl2 = strlen($dot2[1]);
                        $last2 = $lenurl2 - 1;
                        $pen = $lenurl2 - 2;
                        
                        if (($lenurl2 >4) && ($dot2[1][$last2] == '1')){
                        echo "<script>
                            document.getElementById('AccntLogout').style.display = 'block';
                            document.getElementById('AccntLogout').style.visibility = 'visible';
                            document.getElementById('input1').style.marginTop = '-30px';
                            
                            setTimeout(function(){
                                document.getElementById('AccntLogout').style.display = 'none';
                            document.getElementById('AccntLogout').style.visibility = 'hidden';
                            
                            document.getElementById('input1').style.marginTop = '0px';
                            
                             
                            
                            }, 4000);
                            
                            </script>";
//                        $goback2 = ltrim($urlComponents2[2], '?1');
//                        header ('Location: '.$urlComponents2[2]);
                        }   
                    }
                ?>
                
                    
                <div class="col-lg-10">
                    <div class="row" id="loginlinks" style="color:#306FA0;" >
                        <div class="col-lg-12 mt-3">
                            <ul class="nav float-right">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="lnk" data-toggle="dropdown" style="margin-right:-13px;"> Log in as a different user </a>
                                    
                                    <div class="dropdown-menu" style="background-color: #306FA0">
                                        <a href="Industrial_Supervisor/index.php" class="dropdown-item"> Industrial Supervisor </a>
                                        <a href="Institute_Supervisor/index.php" class="dropdown-item"> Institute Supervisor </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <style>
                            .nav:hover{
                                text-decoration: underline;
                            }
                            
                            .dropdown-toggle::after {
                                margin-left: 0px;
                            }
                        </style>
                        
                        <div class="col-lg-12 mb-0">
                            <a href="pages/signup.php" class="float-right" id="lnk" style="margin-top:-8px;"> Sign Up (Create Account) </a>
                        </div>
                        
                        <div class="col-lg-12 mb-3" id="lnk">
                            <a href="#" id="lnk" class="float-right"> Forgot Password </a>
                        </div>
                            
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div> 
<!--            </div>-->
<!--        <div class="col-lg-4"></div>-->
    </div>
</div> 
    
<div class="container">
    <div class="row"> 

<!-- #306FA0 -->

<!--
<ul class="nav nav-pills mb-3 nav-tabs" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Student</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
        Institute Supervisor </a>
      
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Industrial Supervisor</a>
  </li>
</ul>
-->
        
<!--
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>
-->
    
    </div>
    </div>

<!-- End of the container-fluid class -->
<!--    <script src="js/bootstrap.min.js" type="text/javascript"></script>-->
    
<!--    Footer -->    
<?php 
    include "phpIncludes/footer.php";

    ?>
    
</body>
</html>
