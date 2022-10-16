<?php

/*
    식당 승인 요청한 목록들을 보여주는 페이지
    식당 이름 클릭시 그 식당 요청 정보를 보여주는 페이지(showrestaurantapply.php)로 이동
 */

// DB 관련 정보
require("/var/www/db/dbset.php");

//ㅇb 연결
$conn = mysqli_connect($host, $username, $password, $dbname); 

// db 연결 오류 체크
if (!($conn)) {
    echo "db 연결 실패: " . mysqli_connect_error();
}

// db 데이터 문자 인코딩 설정
mysqli_query($db, "set session character_set_connection=utf8;");
mysqli_query($db, "set session character_set_results=utf8;");
mysqli_query($db, "set session character_set_client=utf8;");
mysqli_set_charset($conn,"utf8mb4");

// 배열 두개에 간단한 게시판 기능 구현을 위한 데이터 저장
$array_id = [];
$array_name = [];
// 받아온 데이터수, 반복문에 사용할 변수
$count;
// 쿼리문 실행, 식당 승인 요청한 목록을 불러온다.
$result = mysqli_query($conn,"select * from restaurant_apply");
// 테이블에서 필요한 정보를 빼와 배여렝 저장
while($row = mysqli_fetch_array($result)) {
  array_push($array_id,$row['restaurant_id']);
  array_push($array_name,$row['restaurant_name']);
}
// 연결 종료
mysqli_close($conn);
// 배열의 길이를 저장
$count = count($array_id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 승인 페이지</title>
    <link rel="stylesheet" href="css/registerpage.css">
</head>
<body>
    <div class="topParent">
        <div class="topChild">
            <h2 class="topText">식당 승인 페이지</h2>
        </div>
    </div>
    <div class="middle">
    <div class="middle info">
        <br><h2>식당리스트</h2><br><hr class="myhr">
    </div>

    <?php
    echo "";
    for ($i=0 ; $i < $count ; $i++) {
        echo "<a href='./showrestaurantapply.php?restaurant_id=$array_id[$i]'> $array_name[$i] </a><hr class=\"myhr\">";  
    }
    ?>
    </div>    
</body>
</html>

