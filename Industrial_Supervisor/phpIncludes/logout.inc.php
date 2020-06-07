<?php
    session_start();
    session_destroy();
    session_unset();
    
    $goback = "../index.php";
    header ('Location: '.$goback.'?1');


?>