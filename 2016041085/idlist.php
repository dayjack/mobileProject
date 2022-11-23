<?php
/**
 * 아이디 중복 체크용 페이지
 * 중복 여부를 json으로 return
 * 중복일시 {"id":1}
 * 중복 아닐시 {"id":0}
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
mysqli_query($db, "set session character_set_connection=utf8;");
mysqli_query($db, "set session character_set_results=utf8;");
mysqli_query($db, "set session character_set_client=utf8;");
mysqli_set_charset($conn,"utf8mb4");

// 변수
$id = $_GET[id];

$sql = "Select id from signup where id='$id';";
$result = mysqli_query($conn, $sql);
$output = array(); // 응답값으로 보낼 값

if (mysqli_num_rows($result) > 0) { // 쿼리 결과로 1행 이상 존재한다면
    $overlap = array("id"=>1);
    echo json_encode($overlap);
} else { // 쿼리 결과가 없다면 메시지 보내주기
    $overlap = array("id"=>0);
    echo json_encode($overlap);
}
mysqli_close($con); 

?>