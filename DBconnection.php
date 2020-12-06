<?php
    
    return $conn = mysqli_connect('localhost', 'bd64fd2efb274f', 'c36d191a', 'ipt_system');

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
    
?>
