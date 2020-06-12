<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-9 col-12 ml-auto mr-auto" style="border: 1px solid #306FA0; border-radius:10px;">
            <form method='post' action='../phpIncludes/logbook_update.inc.php'>
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
                        //If no user is selected
                        include 'empty_form.php';
                        
                    }else{
                        //If a certain user is selected
                        $selected_ID = $get_no[1];
                        $getName = "SELECT * FROM student_info WHERE StudentID = '$selected_ID'";
                        $runQuery = $conn -> query ($getName);
                        $getSelectedStudent = $runQuery -> fetch_assoc();
                        $_SESSION['SelectedStudent_FName'] = $getSelectedStudent ['FirstName'];
                        $_SESSION['SelectedStudent_LName'] = $getSelectedStudent ['LastName'];
                           
//                        echo $selected_ID;
                        include 'filled_form.php';
                        
                    }
                    
            ?>
               </form>
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
















