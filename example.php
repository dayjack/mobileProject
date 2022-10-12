<?php
// datebase 로그인 정보는 다른 파일로 분리
require("/var/www/db/dbset.php");

header('Content-Type: application/json; charset=UTF-8'); // JSON 형태로 데이터 출력


$conn = mysqli_connect($host, $username, $password, $dbname); // DB 연결
if (!($conn)) {
    echo "db 연결 실패: " . mysqli_connect_error();
}

$sql = "Select * from temp;";
$result = mysqli_query($conn, $sql);
$output = array(); // 응답값으로 보낼 값

if (mysqli_num_rows($result) > 0) { // 쿼리 결과로 1행 이상 존재한다면
    while ($row = mysqli_fetch_assoc($result)) { // 행별로 유저의 정보 output에 넣어주기
        array_push($output,
            array('key' => $row['key']
            )
        );
    }
} else { // 쿼리 결과가 없다면 메시지 보내주기
    $output = array('message' => '쿼리 결과 없음');
}

echo json_encode($output); // array를 json형태로 변환하여 출력