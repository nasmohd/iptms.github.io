<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-8 col-12 ml-auto mr-auto" style="border: 1px solid #306FA0; border-radius:10px;">
            <?php
                    $requestUrl = $_SERVER ['REQUEST_URI'];
                    $urlComponents = explode ('/', $requestUrl);
                     
                    $dot = explode ('.', $urlComponents[4]);
//                    echo $urlComponents[4]; //logbook.php?2
                    $dot_len = count($dot);
//                    echo $dot[1][4]; //shows the number selected
                    $get_no = explode ('?', $dot[1]); //$dot[1] = php?2
            
                     //final number selected by the user
//                    echo $selected_no;
                    
                    
                    if ($dot[1] == 'php'){
                        //empty form goes in here
                        include 'empty_form.php';
                        
                        
                    }else{
                        //form with the selected week number goes in here
                        $current_userID = $_SESSION ['StudentID'];
                        $selected_no = $get_no[1];
                        $_SESSION['student_weekSelection'] = $selected_no;
                        $getEntries = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$selected_no'";
                        $getRes = $conn -> query($getEntries);
                        $getRow = $getRes -> fetch_assoc();
                        
                        include 'filled_form.php';
                        
                        
//                        echo $selected_no;
                    } 
            ?>

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
















