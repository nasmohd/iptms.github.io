<?php
session_start();
include '../../DBconnection.php';

$ind_sup_comments = $_POST['industrial_supComments'];

$check_status = $_POST['check_verifyStatus'];

//echo $inst_sup_comments;

if (isset($check_status)){
    $user_ID = $_SESSION['selectedID'];
//    echo $user_ID;
//    $sqlInsert = "INSERT INTO logbook_entries (indSup_comments, indSup_verifystatus) VALUES ('$ind_sup_comments', 1) WHERE userID = '$user_ID'";
    
    $sqlInsert = "UPDATE logbook_entries SET indSup_comments = '$ind_sup_comments', indSup_verifystatus = 1 WHERE userID = '$user_ID'";
    
    $res = $conn -> query($sqlInsert);
    
    $urlx = '../pages/logbook_review.php';
    header ('Location'.$urlx);
    
//    $row5 = $res -> fetch_assoc();
//    header('Location');
    
}




?>


