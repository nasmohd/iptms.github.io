<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-6 col-12 ml-auto mr-auto" style="border: 2px solid #306FA0; border-radius:10px;">
           <div class="row">
            <div class='mt-2 col-lg-9 ml-auto mr-auto text-center'>
                <?php
                echo "

                <img src='../profile_pictures/".$_SESSION ['ProfilePic_Name']."' height='300vh' width='120vw' class='img-fluid' alt='User Image' style='border: 2px solid #306FA0;'>
                ";
                ?>
            </div>
            
            <div class='col-lg-12' style=''><hr style='border-top: 1px solid #306FA0;'></div>
           
           
            <div class="col-lg-6 ml-3">
                <label for='exampleFormControlTextarea1'>Full Name: </label>
                
                <?php
                echo "
                <textarea placeholder='' name='weekNumber' type='text' id='weekinput' class='form-control' style='border: 1px solid #306FA0' rows='1' readonly style='resize:none;'>".$_SESSION['FirstName']." ".$_SESSION['LastName']."</textarea>
                ";?>
            </div>
               
            <div class="col-lg-5 ml-auto">
                <label for='exampleFormControlTextarea1'>Registration Number: </label>
                
                <?php
                echo "
                <textarea placeholder='' name='weekNumber' type='text' id='weekinput' class='form-control' style='border: 1px solid #306FA0' rows='1' readonly style='resize:none;'>".$_SESSION ['Reg_Number']."</textarea>
                ";?>
            </div>
            </div>
        </div>
    </div>    
</div>
</div>
<!--</div>-->
<!--</div>-->

<?php
    include '../phpIncludes/footer2.php';

?>

<!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
-->

    
    </body>
</html>
















