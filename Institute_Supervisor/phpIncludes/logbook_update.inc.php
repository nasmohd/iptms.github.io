<?php
session_start();
include '../../DBconnection.php';

$user_ID = $_SESSION['student_selected'];
$selected_week = $_SESSION['selected_week'];

//$ind_sup_comments = $_POST['industrial_supComments'];

$get_statuses = "SELECT * FROM logbook_entries WHERE userID='$user_ID' AND weekNumber = '$selected_week'";
$run_getstatus = $conn -> query ($get_statuses);
$get_res = $run_getstatus -> fetch_assoc();
//$check_status = $_POST['check_verifyStatus'];

//echo $inst_sup_comments;

if (($get_res['instSup_verifystatus'] == '') || ($get_res['instSup_verifystatus'] == '0')){ //If Industrial Supervisor status is empty, update
    $check_status = $_POST['check_verifyStatus'];
    if(isset($check_status)){
//    echo $user_ID;
//    $sqlInsert = "INSERT INTO logbook_entries (indSup_comments, indSup_verifystatus) VALUES ('$ind_sup_comments', 1) WHERE userID = '$user_ID'";
    
    $sqlInsert = "UPDATE logbook_entries SET instSup_verifystatus = '1' WHERE userID = '$user_ID' AND weekNumber='$selected_week'";
    
    $res = $conn -> query($sqlInsert);
    
    $urlx = $_SESSION['prev_url'];
    header ('Location: '.$urlx);
    
    
//    $row5 = $res -> fetch_assoc();
//    header('Location');
    }
}
//if ($get_res['indSup_verifystatus'] == '1'){
//    $sqlInsert2 = "UPDATE logbook_entries SET indSup_comments = '$ind_sup_comments' WHERE userID = '$user_ID' AND weekNumber='$selected_week'";
//    
//    $res2 = $conn -> query($sqlInsert2);
//    $urlx = $_SESSION['prev_url'];
//    header ('Location: '.$urlx);
//}
    
?>


