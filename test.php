<?php
    require("/var/www/db/dbset.php");

    $conn = new mysqli($host, $user, $pw, $dbName);
    
    /* DB 연결 확인 */
    if($conn){ echo "Connection established"."<br>"; }
    else{ die( 'Could not connect: ' . mysqli_error($conn) ); }
    
    mysqli_close($conn);
?>