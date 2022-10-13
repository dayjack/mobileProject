<?php 

/*
    showrestaurantapply.php 에서 승인 버튼을 누르면 이 페이지로 이동
    restaurant_apply의 정보들을 restaurant 테이블로 이동시킨다.
    정보 이동 후 다시 식당 승인 대기 목록 페이지(restaurantapplylist.php)로 이동
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
$restaurant_id = $_GET[restaurant_id];
$crn;
$scode;
$restaurant_name;
$email;
$address;
$restaurant_info;
$menu;
$food_img = array();
$food_category;
$hashtag;
echo "$restaurant_id<br>";

// 쿼리 실행 
$result = mysqli_query($conn,"select * from restaurant_apply where restaurant_id=$restaurant_id");
// 배열로 받아온 데이터를 변수를 데이터에 저장
while($row = mysqli_fetch_array($result)) {
  $crn = $row['crn'];
  $scode = $row['scode'];
  $restaurant_name = $row['restaurant_name'];
  $email = $row['email'];
  $address = $row['address'];
  $restaurant_info = $row['restaurant_info'];
  $menu = $row['menu'];
  $food_img = $row['food_img'];
  $food_category = $row['food_category'];
  $hashtag = $row['hashtag'];
}
// 페이지 이동 실패시에 화면에 출력 후 데이터 확인하는 용도
echo "crn :  $crn <br>"; 
echo "scode : $scode<br>";
echo "restaurant_name :  $restaurant_name <br>";
echo "email :  $email <br>";
echo "address :  $address <br>";
echo "restaurant_info :  $restaurant_info <br>";
echo "menu :  $menu <br>";
echo "food_category :  $food_category <br>";
echo "hashtag :  $hashtag <br>";
echo "food_img :  $food_img <br>";


// 데이터를 restaurant 테이블로 이동시킨다. 
$sql = "insert into restaurant(crn,restaurant_name,email,address,restaurant_info,menu,food_category,
hashtag,rate_avg,rate_total,rate_count, food_img , scode) values('$crn','$restaurant_name','$email','$address','$restaurant_info','$menu','$food_category','$hashtag','0','0','0' , '$food_img', '$scode')";
if ($conn->query($sql) === TRUE) {
    echo "승인 완료<br>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 승인 완료 했으므로 restaurant_apply 테이블에서는 삭제
$result = mysqli_query($conn,"delete from restaurant_apply where restaurant_id=$restaurant_id");
// 연결 종료
mysqli_close($conn);
// 페이지 이동
echo ("<script>location.href='./restaurantapplylist.php';</script>");
echo "<script>alert('신청을 승인하였습니다.')</script>";
?>