<?php 
/*
    파라미터로 회원가입 정보를 받아옴
    회원가입시 정보 insert 하는 페이지
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

// 이전 페이지에서 회원가입 정보를 받아온다.
$id = $_GET[id];
$password = $_GET[password];
$email = $_GET[email];
$scode = $_GET[scode];
$nickname = $_GET[nickname];
$authority = $_GET[authority];

// 쿼리문 실행
$result = mysqli_query($conn,"insert into signup(id, password, email, scode, nickname, authority) values('$id','$password','$email','$scode','$nickname', '$authority');");

// 연결 종료
mysqli_close($conn);


?>