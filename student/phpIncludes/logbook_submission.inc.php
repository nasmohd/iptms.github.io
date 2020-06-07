<?php
    include '../../DBconnection.php';
    session_start();
    
    $weekNumber = $_POST['weekNumber'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $userID = $_SESSION['StudentID'];
    
    $monEntry = $_POST['monEntry'];
    $tueEntry = $_POST['tueEntry'];
    $wedEntry = $_POST['wedEntry'];
    $thurEntry = $_POST['thurEntry'];
    $friEntry = $_POST['friEntry'];
    $satEntry = $_POST['satEntry'];

    $weekEntry = $_POST['week_entry'];
    $weekpicture = $_POST['week_img'];
//    $img = $_POST['img_name'];
//    echo $monEntry;

    $logbookInsert = "INSERT INTO logbook_entries (userID, weekNumber, weekStart, weekEnds, monEntry, tueEntry, wedEntry, thurEntry, friEntry, satEntry, week_Entry, week_picture) VALUES ('$userID' , '$weekNumber', '$startDate', '$endDate', '$monEntry', '$tueEntry', '$wedEntry', '$thurEntry', '$friEntry', '$satEntry', '$weekEntry', '$weekpicture')";

    $resultInsert = $conn -> query($logbookInsert);
    
    $url3 = "http://localhost/UNI_3rd_year/student/pages/daily_entry.php";
//    header ('Location: '.$url3);   

?>
    

    