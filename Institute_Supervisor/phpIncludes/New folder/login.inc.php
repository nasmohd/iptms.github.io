<?php
session_start();
include '../../DBconnection.php';

if (isset($_POST['login']) && !empty($_POST['ind_username']) && !empty($_POST['pwd'])){

    $ind_sup_username = $_POST['ind_username'];
    $pwd = $_POST ['pwd'];
//    echo $regNo;

//    $sqlQuery1 = "SELECT * FROM student_info WHERE RegistrationNumber = '$regNo' AND StudentPassword = '$pwd'";
    $sqlQuery1 = "SELECT * FROM industrial_supervisor_info WHERE username = '$ind_sup_username'";

    $result = $conn -> query($sqlQuery1);  //Runs the SQL query on the database
    $row = $result -> fetch_assoc();       //Fetches results from the database

//    echo $row['RegNo'];
//    $_SESSION['loginid'] = $row['StudentID'];

    if (($row['username'] == $ind_sup_username) && ($row['password']) == $pwd){
        
        $_SESSION ['IndustrialSup_ID'] = $row['industrial_sup_ID'];
        $_SESSION ['FirstName'] = $row['firstName'];
        $_SESSION ['LastName'] = $row ['lastName'];
//        $_SESSION ['UserProfile'] = $row['ProfilePicture'];
        
//        echo $row['ProfilePicture'];
        $url1 = "../main/index.php";
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


