<?php
    include '../phpIncludes/header.php';



?>

<div class="container-fluid mt-2">
    <form method="post" action="../phpIncludes/search_ipt.inc.php">
        <div class="row">
            <div class="col-lg-5 ml-auto" background-color:red;>
                    <textarea class="form-control" rows="1" style="border: 2px solid #306FA0; resize:none; border-radius" placeholder="Enter name of IPT place..."></textarea>
            </div>
            
            <div class="col-lg-2 mr-auto" background-color:yellow;>
                <button type="submit" class="btn btn-primary" id="searchIPT" style="font-size:15px;"> Search </button>
                
                <style>
                    #searchIPT {
                        background-color: #306FA0;
                    }
                </style>
            </div>
        </div>
    </form>
    
    <div class="row mt-2 mb-2">
        <div class="col-7 ml-auto mr-auto mb-2 mt-2" style="border: 3px solid #333333; border-radius: 10px;">
<!--            <a class="mt-2"> Company Name </a>  -->
            <div class="row">
                <div class="col-lg-10 col-10 mt-3" style="border-bottom-color: #333333">
                    <a class="mt-2"> Company Name: </a>  
                </div>  
                <hr>

                <div class="dropdown ml-auto col-lg-1 col-1 mt-2" >
<!--                    <p> Dots </p>    -->
                    <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background:url('https://facebookbrand.com/wp-content/themes/fb-branding/prj-fb-branding/assets/images/fb-art.png');background-size:cover;width:50px;height:50px">
                    <span class="fa fa-ellipsis-v" style="color: black;"></span>
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>


                </div>

                <div class="col-lg-8">
                    <p> Location: </p>
                </div>   
                <hr>

                <div class="col-lg-5">
                    <p> Placements Requested: </p>
                </div>                

                <div class="col-lg-3 ml-auto">
                    <p> Remaining: </p>
                </div>

                <div class="col-lg-5">
                    <p> Reviews (out of 10): </p>
                </div>                

                <div class="col-lg-2 ml-auto">
                    <form method="post">
                        <button class="btn btn-success" style="background-color: #306FA0;">APPLY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Optional jQuery file that will be used -->
    <script src="js/bootstrap.min.js"></script>

    
    </body>
</html>
