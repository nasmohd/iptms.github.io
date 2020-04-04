<?php

include '../dbh.php';

$regNo = $_POST['regNo'];
$pwd = $_POST ['pwd'];

$sqlQuery1 = "SELECT RegNo, StudentPassword FROM student_info";

$result = $conn -> query($sqlQuery1);
$row = $result -> fetch_assoc();
//echo $row['RegNo'];

if (in_array($regNo, $row)){
    //in_array() is a function which accepts a value to be tested as
    //the first parameter and an array to be tested in second parameter
    
    
//    echo $row['StudentPassword']; //display the password
    $url1 = "http://localhost/UNI_3rd_year/front_page.php";
    header('Location: '.$url1);
    exit();
}



