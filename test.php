<?php

    // datebase 로그인 정보는 다른 파일로 분리
    require("/var/www/db/dbset.php");
    
    // db 연결
    $conn = new mysqli($host, $user, $pw, $dbName);
    
    /* DB 연결 확인 */
    if($conn){ echo "Connection established"."<br>"; }
    else{ die( 'Could not connect: ' . mysqli_error($conn) ); }
    
    mysqli_close($conn);
?>