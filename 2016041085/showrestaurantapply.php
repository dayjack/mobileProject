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
$crn;
$restaurant_name;
$email;
$address;
$restaurant_info;
$menu;
// $food_img;
$food_category;
$hashtag;



$result = mysqli_query($conn,"select * from restaurant_apply where restaurant_id=$restaurant_id");
while($row = mysqli_fetch_array($result)) {
  //echo $row['restaurant_id'];
  //echo "<br>";
  $crn = $row['crn'];
  $restaurant_name = $row['restaurant_name'];
  $email = $row['email'];
  $address = $row['address'];
  $restaurant_info = $row['restaurant_info'];
  $menu = $row['menu'];
  //$food_img = $row['food_img'];
  $food_category = $row['food_category'];
  $hashtag = $row['hashtag'];
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 신청 정보 보기</title>
</head>
<body>
    <h2><center>식당 신청 정보 보기</center></h2><br><hr><br>
    <?php
    echo "사업자 번호<br><hr><br>$crn<br><hr><br>";
    echo "식당명<br><hr><br>$restaurant_name<br><hr><br>";
    echo "이메일<br><hr><br>$email<br><hr><br>";
    echo "식당주소<br><hr><br>$address<br><hr><br>";

    $restaurant_info_br = nl2br($restaurant_info);
    echo "식당 정보<br><hr><br>$restaurant_info_br<br><hr><br>";
    
    $menu_br = nl2br($menu);
    echo "메뉴<br><hr><br>$menu_br<br><hr><br>";
   
    
    // echo "음식 이미지<br><hr><br>$food_img<br><hr><br>";
    switch ($food_category) {
        case 1:
            echo "음식 카테고리<br><hr><br>중식<br><hr><br>";
            break;
        case 2:
            echo "음식 카테고리<br><hr><br>한식<br><hr><br>";
            break;
        case 3:
            echo "음식 카테고리<br><hr><br>일식<br><hr><br>";
            break;
        case 4:
            echo "음식 카테고리<br><hr><br>양식<br><hr><br>";
            break;
        default:
            echo "음식 카테고리<br><hr><br>기타<br><hr><br>";
            break;

    }
    echo "해시태그<br><hr><br>$hashtag<br><hr><br>";
    ?>
    <div style="text-align:center">
    <input type="button" name="acceptbtn" id="acceptbtn" onclick="location.href='./accept.php?restaurant_id=<?=$restaurant_id?>'" value="승인">
    <input type="button" name="rejectbtn" id="rejectbtn" onclick="location.href='./reject.php?restaurant_id=<?=$restaurant_id?>'" value="거절"><br><hr><br>
    </div>
    
</body>
</html>