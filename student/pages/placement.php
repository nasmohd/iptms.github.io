<?php
    include '../phpIncludes/header.php';



?>

<div class="container">
     <div class="row mr-auto">
         <div class="col-lg-2">
         </div>
         
        <div class="ml-5 col-lg-5 ml-auto">
                <textarea class="form-control" rows="1" style="border: 2px solid #306FA0; resize:none; border-radius" placeholder="Enter name of IPT place..."></textarea>
        </div>

        <div class="col-lg-3 mr-auto">
            <button type="submit" class="btn btn-primary" id="searchIPT" style="font-size:15px;"> Search </button>

            <style>
                #searchIPT {
                    background-color: #306FA0;
                }
            </style>
        </div>
    </div>
    <hr>
<!--    </div>-->
<!--    border: 2px solid rgba(48, 111, 160, 0.6); border-radius: 10px;   -->
    <?php
//        $sql_ipt = "SELECT COUNT(*) AS cols FROM ipt_place_info"; //returns 2 for this case
        $sql_ipt = "SELECT MAX(IPTplace_id) AS cols FROM ipt_place_info";
        $res2 = $conn -> query($sql_ipt);
        $number_of_cols = $res2 -> fetch_assoc();
        

//        echo $number_of_cols['cols'];
        $loop = $number_of_cols['cols'];
        $iterate = 1;
    
        while ($iterate <= $loop){
            $co_name = "SELECT * from ipt_place_info WHERE IPTplace_id = '$iterate'";
            
//            if ($co_name == !em){
//                echo "true";
//            }
            
            $res3 = $conn -> query($co_name);
            $co_res = $res3 -> fetch_assoc();
            if ($co_res['IPTplace_id'] != $iterate){
                
            }
            
            else{
                echo "
    <div class='row mt-2 mb-2'>
        
        <div class='col-6 ml-auto mr-auto mb-2' style='border: 2px solid #333333; border-radius: 10px;  box-shadow: 0px 6px 6px 0px gray;' id='place_style' onclick='co_page()'>
            <div class='row'>
                <div class='col-lg-10 col-10 mt-1' style='border-bottom-color: #333333' id='co_name'>
                        <a href='../main/index.php' class='mt-2 font-weight-bold text-uppercase' style='font-size: 19px; color: #306FA0;'> Company Name: ".$co_res['IPTplace_name']."</a>  
                </div>  
                
                <div class='dropdown ml-auto col-lg-1 col-1 mt-1 mr-3'>
                    <button class='btn btn-default' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' style='background:url('https://facebookbrand.com/wp-content/themes/fb-branding/prj-fb-branding/assets/images/fb-art.png');background-size:cover;width:50px;height:50px'>
                    <span class='fa fa-ellipsis-v' style='color: black;'></span>
                    </button>

                    <ul class='dropdown-menu' aria-labelledby='dropdownMenu1'>
                        <li><a href='#'>Action</a></li>
                        <li><a href='#'>Another action</a></li>
                        <li><a href='#'>Something else here</a></li>
                        <li><a href='#'>Separated link</a></li>
                    </ul>
                </div>
                
                <div class='col-lg-8'>
                    <p> <span class='font-weight-bold'>Location: </span>".$co_res['ipt_location']."</p>
                </div>   


                <div class='col-lg-5'>
                    <p><span class='font-weight-bold'> Placements Requested: </span>".$co_res['students_requested']."</p>
                </div>                

                <div class='col-lg-3 ml-auto'>
                    <p> <span class='font-weight-bold'>Remaining: </span>".$co_res['placements_remaining']."</p>
                </div>

                <div class='col-lg-5'>
                    <p> <span class='font-weight-bold'>Reviews (out of 10): </span>".$co_res['reviews']."</p>
                </div>                
                
                <div class='col-lg-2 ml-auto mb-2'>
                        
                            <button class='btn btn-success' style='background-color: #306FA0; border: 1px solid #306FA0' id='apply_btn' onclick='applyBtn()'>APPLY</button>
                        
                </div>
            </div>
        </div>
    </div>";    
            }
            
//            echo "<p>".$co_res['IPTplace_name']."</p>";
//            echo "<br/>";
            
            $iterate = $iterate + 1;
            
        }
    ?>
    
    <style>
        div #place_style{
            font-size:14px;
            color: #5d5d5d;
            
        }        
        
        div #place_style:hover{
/*            font-size: 3px;*/
            background-color: #EEEEEE;
            color: #4C4C4C;
/*            color: #306FA0;*/
/*            box-shadow: none;*/
            box-shadow: 0 0 0 transparent;
            cursor:pointer;
/*            text-decoration: underline;*/
/*            background-color: #000000;*/
        }
    </style>
    
    <script>
//        function applyBtn(){
//            document.getElementById('apply_btn').style.backgroundColor = "Green";
//            
//        }
        
        
        function co_page(){
//            location.href='../main/index.php';   
        }
    </script>

</div>

<?php
    include '../phpIncludes/footer2.php';


?>
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
-->

    
    </body>
</html>
