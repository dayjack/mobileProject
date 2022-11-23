<?php
/**
 * retaurant 테이블의 food_img 정보를 json으로 보여주는 페이지
 * parameter의 category 변수값으로 보여주는 데이터 결정
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
header("Content-Type:text/html;charset=utf-8");
// db 데이터 문자 인코딩 설정
mysqli_query($db, "set session character_set_connection=utf8;");
mysqli_query($db, "set session character_set_results=utf8;");
mysqli_query($db, "set session character_set_client=utf8;");
mysqli_set_charset($conn,"utf8mb4");

$restaurant_id = $_GET[restaurant_id];

$sql = "Select food_img from restaurant where restaurant_id = '$restaurant_id';";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { // 쿼리 결과로 1행 이상 존재한다면

    while ($row = mysqli_fetch_assoc($result)) { // 행별로 유저의 정보 output에 넣어주기
        $output = $row['food_img'];   
    }
} else { // 쿼리 결과가 없다면 메시지 보내주기
    $output = array('message' => '쿼리 결과 없음');
}

// son으로 변환 
 echo $output;

// DB 접속 종료 
mysqli_close($con); 

?>