
<?php

/*
    register.php 에서 보낸 정보들을 restaurant_apply 테이블에 저장시키는 페이지
 */
// DB 관련 정보
require("/var/www/db/dbset.php");
// DB 연결
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

// 받아온 데이터들을 변수에 저장
$crn = $_POST[crn];
$restaurant_name = $_POST[restaurant_name];
$email = $_POST[email];
$address = $_POST[address];
$restaurant_info = $_POST[restaurant_info];
$menu = $_POST[menu];
// $food_img = $_POST[food_img];
$food_category = $_POST[food_category];
$hashtag = $_POST[hashtag];

// 오류 발생시에 데이터 확인용
echo "crn :  $crn <br>"; 
echo "restaurant_name :  $restaurant_name <br>";
echo "email :  $email <br>";
echo "address :  $address <br>";
echo "restaurant_info :  $restaurant_info <br>";
echo "menu :  $menu <br>";
echo "food_category :  $food_category <br>";
echo "hashtag :  $hashtag <br>";

// 실행할 sql문
$sql = "insert into restaurant_apply(crn,restaurant_name,email,address,restaurant_info,menu,food_category,hashtag)
value('$crn','$restaurant_name','$email','$address','$restaurant_info','$menu','$food_category','$hashtag')";

// sql문 실행
if ($conn->query($sql) === TRUE) {
    echo "등록완료"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// 연결 종료
mysqli_close($conn);

?>

    

