<?php
    include '../../DBconnection.php';
    session_start();
      
    $location_coordinates = $_POST['loc_coodinates'];
    $location_split = explode (' ', $location_coordinates); //$loc_split[0] = 6°50'40.7"S and $loc_split[1] = 39°16'21.0"E
//    echo $location_split[1];

    $replace_apostrophe = str_replace("'", '&#8217;', $location_split[0]);
    $replace_double = str_replace('"', '&#34;', $replace_apostrophe);
//    echo $replace_double;

    $replace_apostrophe2 = str_replace("'", '&#8217;', $location_split[1]);
    $replace_double2 = str_replace('"', '&#34;', $replace_apostrophe2);
//    echo $replace_double2;
    
//    $explode_apostophe = explode ("'", );
    
    $coordinates = $replace_double."+".$replace_double2;

    
//    echo $coordinates;
    
    
?>

<html>
    <head></head>
    
<body>
    <?php
        echo "<a href='https://www.google.com/maps/place/".$coordinates."'>Google Maps</a>";
        $s = 5;
        echo $s."&#35;";
//        echo $location_split[0]."+".$location_split[1];
    ?>
    
</body>
<!--<a href="../pages/logbook.php"></a>-->
</html>
    

    