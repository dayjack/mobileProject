<?php 

/*
   리뷰 등록하는 페이지
*/

// datebase 로그인 정보는 다른 파일로 분리
require("/var/www/db/dbset.php");
// db 연결
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

// db 데이터 받을 변수들
$restaurant_id = $_POST[restaurant_id];
$vcontent = $_POST[vcontent];
$rate = $_POST[rate];
$nickname = $_POST[nickname];


echo "$vcontent";

// review를 작성한다. parameter로 값을 받아온다. 
$sql = "insert into review(restaurant_id, vcontent, rate, nickname) values('$restaurant_id', '$vcontent', '$rate', '$nickname');";
echo "$sql";
if ($conn->query($sql) === TRUE) {
    echo "승인 완료<br>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "Select * from restaurant where restaurant_id = $restaurant_id;";
$result = mysqli_query($conn, $sql);
$output = array(); // 응답값으로 보낼 값

$rate_total;
$rate_count;

if (mysqli_num_rows($result) > 0) { // 쿼리 결과로 1행 이상 존재한다면
    while ($row = mysqli_fetch_assoc($result)) { // 행별로 유저의 정보 output에 넣어주기
        $rate_total = $row['rate_total'];
        $rate_count = $row['rate_count'];
    }
} else { // 쿼리 결과가 없다면 메시지 보내주기
    $output = array('message' => '쿼리 결과 없음');
}

$rate_count++;
$rate_total = $rate + $rate_total;
$rate_avg = 0.0;
$rate_avg = $rate_total/$rate_count;
echo "<br>rate avg : $rate_avg";

$sql = "update restaurant set rate_total='$rate_total' , rate_count='$rate_count' , rate_avg='$rate_avg' where restaurant_id = '$restaurant_id';";
$result = mysqli_query($conn, $sql);



// 연결 종료
mysqli_close($conn);
?>