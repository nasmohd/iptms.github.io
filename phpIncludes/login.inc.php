<?php
session_start();
include '../DBconnection.php';

if (isset($_POST['login']) && !empty($_POST['regNo']) && !empty($_POST['pwd'])){

    $regNo = $_POST['regNo'];
    $pwd = $_POST ['pwd'];

//    $sqlQuery1 = "SELECT * FROM student_info WHERE RegistrationNumber = '$regNo' AND StudentPassword = '$pwd'";
    $sqlQuery1 = "SELECT * FROM student_info WHERE RegistrationNumber = '$regNo'";

    $result = $conn -> query($sqlQuery1);  //Runs the SQL query on the database
    $row = $result -> fetch_assoc();       //Fetches results from the database

//    echo $row['RegNo'];
//    $_SESSION['loginid'] = $row['StudentID'];

    if (($row['RegistrationNumber'] == $regNo) && ($row['StudentPassword']) == $pwd){
        
        $_SESSION ['StudentID'] = $row['StudentID'];
        $_SESSION ['FirstName'] = $row['FirstName'];
        $_SESSION ['LastName'] = $row ['LastName'];
        $_SESSION ['ProfilePic_Name'] = $row ['ProfilePicture'];
        $_SESSION ['Reg_Number'] = $row ['RegistrationNumber'];
        $_SESSION ['EmailAddress'] = $row ['EmailAddress'];
        $_SESSION ['PhoneNumber'] = $row ['PhoneNumber'];
        $_SESSION ['course'] = $row ['course'];
        $_SESSION ['year_of_study'] = $row ['year_of_study'];
        $_SESSION ['ipt_weeks'] = $row ['ipt_weeks'];
//        $_SESSION ['UserProfile'] = $row['ProfilePicture'];
        
//        echo $row['ProfilePicture'];
        $url1 = "../student/main/index.php";
        header ('Location: '.$url1);
    }
    
    else{
        $url2 = "../index.php";
        header ('Location: '.$url2.'?');
        
        echo "<script>
            document.getElementById('WrongPassword').style.display = 'block';
            document.getElementById('WrongPassword').style.visibility = 'visible';
        </script>";
        
    }
    
    
} else{
    echo "Reg No or Password field is empty";

}


