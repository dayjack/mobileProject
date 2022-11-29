<?php 
/*
    파라미터로 id와 password를 받아온다
    로그인 성공여부를 json으로 리턴
    로그인 성공 {"login":1}
    로그인 실패 {"login":0}
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
$id = $_GET[id];
$password = $_GET[password];

$password_return;
$output = array(); 

// 쿼리문 실행
$result = mysqli_query($conn,"select * from signup where id ='$id'and password ='$password';");

if (mysqli_num_rows($result) > 0) { // 쿼리 결과로 1행 이상 존재한다면
    while ($row = mysqli_fetch_assoc($result)) { // 행별로 유저의 정보 output에 넣어주기
        array_push($output,
            array(
                "id" => $row['id'],
                "password" => $row['password'],
                "email" => $row['email'],
                "scode" => $row['scode'],
                "nickname" => $row['nickname'],
                "authority" => $row['authority']
            )
        );
    }
} else {
    $output = NULL;
}

echo json_encode($output,JSON_UNESCAPED_UNICODE); // array를 json형태로 변환하여 출력

// 연결 종료
mysqli_close($conn);


?>