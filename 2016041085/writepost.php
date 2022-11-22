<?php 

/*
   게시글 등록하는 페이지
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
$nickname = $_POST[nickname];
$ptitle = $_POST[ptitle];
$pcontent = $_POST[pcontent];
$scode = $_POST[scode];




// post를 작성한다. parameter로 값을 받아온다. 
$sql = "insert into post(nickname, ptitle, pcontent, scode) values('$nickname', '$ptitle', '$pcontent', '$scode');";

if ($conn->query($sql) === TRUE) {
    echo "승인 완료<br>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 연결 종료
mysqli_close($conn);
?>