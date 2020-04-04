<?php
    
    return $conn = mysqli_connect('localhost', 'root', '', 'ipt_system');

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
    
?>