<?php
    $host = "43.206.19.165";
    $user = "mobile";
    $pw = "Yujin0822!";
    $dbName = "mydb";

    $conn = new mysqli($host, $user, $pw, $dbName);
    
    /* DB 연결 확인 */
    if($conn){ echo "Connection established"."<br>"; }
    else{ die( 'Could not connect: ' . mysqli_error($conn) ); }
    
    mysqli_close($conn);
?>