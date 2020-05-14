<?php

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
        
        $_SESSION ['UserID'] = $row['StudentID'];
        
        $url1 = "../student/index.php";
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


