<?php 
$host = "43.206.19.165"; // 서버 주소
$username = "root"; // DB 사용자 이름
$password = "Yujin0822!"; // DB 비밀번호
$dbname = "mydb"; // DB 이름

$conn = mysqli_connect($host, $username, $password, $dbname); // DB 연결
if (!($conn)) {
    echo "db 연결 실패: " . mysqli_connect_error();
}
mysqli_query($db, "set session character_set_connection=utf8;");
mysqli_query($db, "set session character_set_results=utf8;");
mysqli_query($db, "set session character_set_client=utf8;");
mysqli_set_charset($conn,"utf8mb4");

$restaurant_id = $_GET[restaurant_id];
echo "$restaurant_id";

$result = mysqli_query($conn,"delete from restaurant_apply where restaurant_id=$restaurant_id");
mysqli_close($conn);
echo("<script>location.href='./restaurantapplylist.php';</script>");
echo "<script>alert('신청을 거절하였습니다.')</script>";

?>