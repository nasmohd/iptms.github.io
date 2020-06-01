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

    $logbookInsert = "INSERT INTO logbook_daily (userID, weekNumber, weekStart, weekEnds, monEntry, tueEntry, wedEntry, thurEntry, friEntry, satEntry) VALUES ('$userID' , '$weekNumber', '$startDate', '$endDate', '$monEntry', '$tueEntry', '$wedEntry', '$thurEntry', '$friEntry', '$satEntry')";

    $resultInsert = $conn -> query($logbookInsert);
    
    $url3 = "http://localhost/UNI_3rd_year/student/pages/daily_entry.php";
    header ('Location: '.$url3);
    ?>    
<html>

<!--<a href="../pages/logbook.php"></a>-->

</html>
    

    