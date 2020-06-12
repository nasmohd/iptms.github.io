<?php
    include '../../DBconnection.php';
    session_start();
    
    $weekNumber = $_SESSION['student_weekSelection'];
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
//    echo $weekNumber;
//    $weekpicture = $_POST['week_img'];
//    $weekp = $_FILES['week_img'];

    $weekpic = $_FILES['week_img'];
    $weekpic_temp = $weekpic['tmp_name'];
    $weekpic_name = $weekpic['name'];
    $weekpic_size = $weekpic['size'];
//    echo $weekpic_name[0];
    
    $weekpic_partition = explode ('.', $weekpic_name); //[0] = filename, [1] = file_Extension
    $pic_name = $weekpic_partition[0];
    $pic_extension = strtolower($weekpic_partition[1]);
    
    $db_picName = $pic_name.'.'.'user=s'.$_SESSION['StudentID'].',w'.$weekNumber.'.'.$pic_extension;
//    $db_picName = $weekpic_name.'?user=s'.$_SESSION['StudentID'].'?week=1'.$weekNumber;
//    echo $db_picName;
    
//    $fileDestination = 'logbook_images/'.$db_picName;
    $fileDestination = '../pages/logbook_images/'.$db_picName;
//    echo $fileDestination;
    move_uploaded_file ($weekpic_temp, $fileDestination);

//    $userID = $_SESSION['StudentID'];
//    $checkDB = "SELECT * FROM logbook_entries WHERE userID = '$userID' AND weekNumber = '$weekNumber'";
    $checkDB = "SELECT * FROM logbook_entries WHERE userID = '$userID' AND weekNumber = '$weekNumber'";
    $res1 = $conn -> query ($checkDB);
    $row1 = $res1 -> fetch_assoc();
    
    if ($row1['weekNumber'] == $weekNumber){ //if the week is already present
        $updateQuery = "UPDATE logbook_entries SET weekStart='$startDate', weekEnds='$endDate', monEntry='$monEntry', tueEntry='$tueEntry', wedEntry='$wedEntry', thurEntry='$thurEntry', friEntry='$friEntry', satEntry='$satEntry', week_Entry='$weekEntry', week_picture='$db_picName' WHERE userID ='$userID' AND weekNumber = '$weekNumber'";
        
        $res2 = $conn -> query ($updateQuery);
        
    }

    else{
        $logbookInsert = "INSERT INTO logbook_entries (userID, weekNumber, weekStart, weekEnds, monEntry, tueEntry, wedEntry, thurEntry, friEntry, satEntry, week_Entry, week_picture) VALUES ('$userID' , '$weekNumber', '$startDate', '$endDate', '$monEntry', '$tueEntry', '$wedEntry', '$thurEntry', '$friEntry', '$satEntry', '$weekEntry', '$db_picName')";
        
        $resultInsert = $conn -> query($logbookInsert);
        
    }
    
 
    $url3 = "../pages/logbook.php";
    header ('Location: '.$url3);   

?>
    

    