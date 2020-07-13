<?php
session_start();
include '../../DBconnection.php';

$selected_student = $_SESSION ['student_selected'];
$backURL = $_SESSION['task_back_url']; //http://localhost/UNI_3rd_year/Industrial_Supervisor/pages/tasks.php?2

$Ind_ID = $_SESSION ['IndustrialSup_ID'] ;

if (isset($_POST['delete_task'])){
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.php?', $urlComponents[4]); //$urlComponents[4] = addtasks.inc.php?1
//    echo ($dot[1]);
    $taskID = $dot[1];
    echo $taskID;
    $deleteTask = "DELETE FROM task_info WHERE StudentID = '$selected_student' AND task_id='$taskID'";
    $run_deleteTask = $conn -> query($deleteTask);
//    $res = mysqli_num_rows($run_deleteTask);
//    echo $res;
    
//    echo "OK";
}

else{
    $week_starting = $_POST['week_starting'];
    $deadline = $_POST['deadline'];
    $tasks = $_POST['tasks'];
    $addTask = "INSERT INTO task_info(StudentID, industrial_supervisor_ID, week, deadline, tasks, task_status) VALUES ('$selected_student', '$Ind_ID', '$week_starting', '$deadline', '$tasks', '0')";
    $run_addTask = $conn -> query ($addTask); 
}


$back = "../pages/".$backURL;
header ('Location: '.$back);
    