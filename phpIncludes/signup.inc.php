<?php
    include '../DBconnection.php';

    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $RegNo = $_POST['regNo'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];
    $password = $_POST['pwd'];

    $sqlInsert = "INSERT INTO student_info (FirstName, LastName, RegistrationNumber, course, EmailAddress, PhoneNumber, StudentPassword) VALUES ('$FirstName', '$LastName', '$RegNo', '$course', '$email', '$phoneNumber', '$password')";
    $result2 = $conn -> query ($sqlInsert);

    $url2 = "http://localhost/UNI_3rd_year/index.php";
    header('Location: '.$url2);
    exit();


//firstname
//lastname
//regNo
//course
//email
//phonenumber
//pwd

//if (isset($_POST['login']) && !empty($_POST['regNo']) && !empty($_POST['pwd'])){
//
//    $regNo = $_POST['regNo'];
//    $pwd = $_POST ['pwd'];
//
//    $sqlQuery1 = "SELECT * FROM student_info WHERE RegNo = '$regNo' AND StudentPassword = '$pwd'";
//
//    $result = $conn -> query($sqlQuery1);  //Runs the SQL query on the database
//    $row = $result -> fetch_assoc();       //Fetches results from the database
//
////    echo $row['RegNo'];
//    $_SESSION['loginid'] = $row['StudentID'];
//    
//    $url1 = "../student/index.php";
//    header ('Location: '.$url1);
//    
//} else{
//    echo "Reg No or Password field is empty";
//
//}



//echo $row['RegNo'];

//while ($row = $result -> fetch_assoc()){
//    echo $row['RegNo'];
//}



//if (in_array($regNo, $row)){
//    //in_array() is a function which accepts a value to be tested as
//    //the first parameter and an array to be tested in second parameter
//    
////    echo $row['StudentPassword']; //display the password
//    
//    
//    $url1 = "http://localhost/UNI_3rd_year/student/index.php";
////    $url1 = "http://localhost/UNI_3rd_year/welcome.php";
//    header('Location: '.$url1);
//    exit();
//}



