<?php
    include '../phpIncludes/header.php';

    $current_user = $_SESSION ['StudentID'];
    $student_info_query = "SELECT * FROM student_info WHERE StudentID = $current_user";
    $run_query = $conn -> query($student_info_query);
    $get_student_res = $run_query -> fetch_assoc();

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-4 col-12 ml-auto mr-auto" style="border: 2px solid #17A2B8; border-radius:10px; background-color: #DDDDDD;">
         
          <form method="post" action="../phpIncludes/updateProfile.inc.php">
           <div class="row">
<!--
            <div class='mt-2 col-lg-9 ml-auto mr-auto text-center'>
               <img src="logo.jpg" class="img-fluid" style='width:5vw; height:10vh;'>
                
            </div>
-->
           
            <div class='mt-2 col-lg-4 ml-auto mr-auto text-center'>
                <?php
                echo "

                <img src='../profile_pictures/".$get_student_res['ProfilePicture']."' height='300vh' width='120vw' class='img-fluid' alt='User Image' style='border: 2px solid #306FA0;'>
                ";
                ?>
            </div>
            
            <div class='col-lg-12' style=''><hr style='border-top: 2px solid #17A2B8;'></div>
           
           
            <div class="col-lg-7">
                <label for='exampleFormControlTextarea1'>Full Name: </label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' readonly class='form-control col-lg-12' style='border: 1px solid #306FA0' rows='1'  style='resize:none;'>".$get_student_res['FirstName']." ".$get_student_res['LastName']."</textarea>
                ";?>
                
            </div>
               
            <div class="col-lg-5">
                <label for='exampleFormControlTextarea1'><span>Registration Number: </span></label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' readonly class='form-control' style='border: 1px solid #306FA0' rows='1'  style='resize:none;'>".$get_student_res ['RegistrationNumber']."</textarea>
                ";?>
            </div>
              
            <div class="col-lg-4 mt-3">
                <label for='exampleFormControlTextarea1'>Course:</label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' class='form-control col-lg-12' style='border: 1px solid #306FA0' rows='1'  style='resize:none;' name='course'>".$get_student_res['course']."</textarea>
                ";?>
            </div>
              
            <div class="col-lg-3 mt-2">
                <label for='exampleFormControlTextarea1' class='pt-2'>Year:</label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' class='form-control' style='border: 1px solid #306FA0' rows='1'  style='resize:none;' class='pt-2' name='year_of_study'>".$get_student_res['year_of_study']."</textarea>
                ";?>
            </div>
              
            <div class="col-lg-5 mt-2">
                <label for='exampleFormControlTextarea1' class='pt-2'>IPT Weeks:</label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' class='form-control' style='border: 1px solid #306FA0' rows='1'  style='resize:none;' class='pt-2' name='ipt_weeks'>".$get_student_res['ipt_weeks']."</textarea>
                ";?>
            </div>
               
            <div class="col-lg-12 mt-2">
                <label for='exampleFormControlTextarea1' class='pt-2'>Email Address: </label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' class='form-control' style='border: 1px solid #306FA0' rows='1'  style='resize:none;' class='pt-2' name='email_address'>".$get_student_res['EmailAddress']."</textarea>
                ";?>
            </div>
            
            <div class="col-lg-6 mt-2">
                <label for='exampleFormControlTextarea1' class='pt-2'>Phone Number: </label>
                
                <?php
                echo "
                <textarea placeholder='' type='text' id='txtinput' class='form-control' style='border: 1px solid #306FA0' rows='1'  style='resize:none;' class='pt-2' name='phoneNumber'>".$get_student_res['PhoneNumber']."</textarea>
                ";?>
            </div>

            <style>
                #txtinput{
                    font-size: 14px;
                } 
                
            </style>
            
            <div class="col-lg-4 mt-5 mb-3 ml-auto mr-auto">
                <button class="btn btn-success">UPDATE PROFILE</button>
            </div>
            
            
            </div></form>
            
            
            <style>
                #txtinput{
                    resize: none;
                }
            
            </style>
            
            
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
















