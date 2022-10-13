<?php 

/*
    식당 승인 요청 목록 페이지(restaurantapplylist.php)에서 식당이름 클릭시,
    그 식당이 요청 정보를 보여주는 페이지로 이동
    승인 또는 거절을 할수 있다.
 */

// DB 관련 정보
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

// 데이터를 저장할 변수
$restaurant_id = $_GET[restaurant_id];
$crn;
$scode;
$food_img = array();
$restaurant_name;
$email;
$address;
$restaurant_info;
$menu;
$food_category;
$hashtag;

// get으로 받아온 변수를 이용해 식당의 정보를 가져옴
$result = mysqli_query($conn,"select * from restaurant_apply where restaurant_id=$restaurant_id");
while($row = mysqli_fetch_array($result)) {
  $crn = $row['crn'];
  $scode = $row['scode'];
  $restaurant_name = $row['restaurant_name'];
  $email = $row['email'];
  $address = $row['address'];
  $restaurant_info = $row['restaurant_info'];
  $menu = $row['menu'];
  $food_category = $row['food_category'];
  $hashtag = $row['hashtag'];

  $food_img = json_decode($row['food_img']);
}
// 연결 종료
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 신청 정보 보기</title>
    <link rel="stylesheet" href="css/registerpage.css">
</head>
<body>
<div class="topParent">
        <div class="topChild">
            <h2 class="topText"><center>식당 신청 정보 보기</center></h2><br><br>
        </div>
    </div>
    <div class="middle">
    <?php
    echo "<br>사업자 번호<br>";
    echo "<p class = \"middle info\"><br>$crn<br><br></p>";

    echo "학교코드<br>";
    echo "<p class = \"middle info\"><br>$scode<br><br></p>";

    echo "식당명<br>";
    echo "<p class = \"middle info\"><br>$restaurant_name<br><br></p>";

    echo "이메일<br>";
    echo "<p class = \"middle info\"><br>$email<br><br></p>";

    echo "식당 주소<br>";
    echo "<p class = \"middle info\"><br>$address<br><br></p>";

    $restaurant_info_br = nl2br($restaurant_info);
    echo "식당 정보<br>";
    echo "<p class = \"middle info\"><br>$restaurant_info_br<br><br></p>";
    
    $menu_br = nl2br($menu);
    echo "메뉴<br>";
    echo "<p class = \"middle info\"><br>$menu_br<br><br></p>";
   
    echo "음식 카테고리<br>";
    switch ($food_category) {
        case 1:
            echo "<p class = \"middle info\"><br>중식<br><br></p>";
            break;
        case 2:
            echo "<p class = \"middle info\"><br>한식<br><br></p>";
            break;
        case 3:
            echo "<p class = \"middle info\"><br>일식<br><br></p>";
            break;
        case 4:
            echo "<p class = \"middle info\"><br>양식<br><br></p>";
            break;
        default:
            echo "<p class = \"middle info\"><br>기타<br><br></p>";
            break;
    }
    if (count($food_img) != 0) {
        echo "음식사진<br>";
        for ( $i=0 ; $i < count($food_img) ; $i++ ) {
            echo "<p class = \"middle info\"><br><img src='$food_img[$i]'><br><br></p>";
        }
    }
    
   
    echo "해시태그<br>";
    echo "<p class = \"middle info\"><br>$hashtag<br><br></p>";
    ?>
      <div style="text-align:center">
        <input type="button" name="acceptbtn" id="acceptbtn" onclick="location.href='./accept.php?restaurant_id=<?=$restaurant_id?>'" value="승인">
        <input type="button" name="rejectbtn" id="rejectbtn" onclick="location.href='./reject.php?restaurant_id=<?=$restaurant_id?>'" value="거절"><br>
        </div>
    </div>
</body>
</html>