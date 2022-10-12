<?php 
/*
    showrestaurantapply.php 에서 거절 버튼을 누르면 이 페이지로 이동
    거절 시 승인 요청했던 데이터를 삭제한다.
    정보 삭제 후 다시 식당 승인 대기 목록 페이지(restaurantapplylist.php)로 이동
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

// 이전 페이지에서 restaurant_id를 받아온다.
$restaurant_id = $_GET[restaurant_id];
// 오류 발생 시 데이터 확인 용
echo "$restaurant_id";

// 쿼리문 실행
$result = mysqli_query($conn,"delete from restaurant_apply where restaurant_id=$restaurant_id");

// 연결 종료
mysqli_close($conn);

//페이지 이동
echo("<script>location.href='./restaurantapplylist.php';</script>");
echo "<script>alert('신청을 거절하였습니다.')</script>";

?>