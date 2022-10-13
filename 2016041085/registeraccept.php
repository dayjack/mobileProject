
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
$scode = $_POST[scode];
$restaurant_name = $_POST[restaurant_name];
$email = $_POST[email];
$address = $_POST[address];
$restaurant_info = $_POST[restaurant_info];
$menu = $_POST[menu];
$food_category = $_POST[food_category];
$hashtag = $_POST[hashtag];

// 이미지 처리

$uploadDir = "../images/";
$file = $_FILES['img'];
$fileName = $file['name'];
$tmpName = $file['tmp_name'];
$fileNames = array();
$file_json = array();


for ( $i = 0 ; $i < count($fileName)  ; $i++ ) {
    // 업로드된 파일을 내가 지정한 위치에 지정한 파일명으로 파일을 이동
    // move_uploaded_file(현재위치, 이동할위치)
    $result = move_uploaded_file($tmpName[$i],$uploadDir.$fileName[$i]);
    array_push($fileNames,$fileName[$i]);
    if($result) {
        array_push($file_json,$uploadDir.$fileName[$i]);
?>
    <hr>
    file name : <?=$fileName[$i]?>
    <hr>
<?php 
    }
}

echo "<br>";
$food_img = json_encode($file_json);

// 오류 발생시에 데이터 확인용
echo "crn :  $crn <br>"; 
echo "scode : $scode <br>";
echo "restaurant_name :  $restaurant_name <br>";
echo "email :  $email <br>";
echo "address :  $address <br>";
echo "restaurant_info :  $restaurant_info <br>";
echo "menu :  $menu <br>";
echo "food_category :  $food_category <br>";
echo "hashtag :  $hashtag <br>";
echo "food_img : $food_img";

// 실행할 sql문
$sql = "insert into restaurant_apply(crn,restaurant_name,email,address,restaurant_info,menu,food_category,hashtag, food_img,scode)
value('$crn','$restaurant_name','$email','$address','$restaurant_info','$menu','$food_category','$hashtag', '$food_img','$scode')";

// sql문 실행
if ($conn->query($sql) === TRUE) {
    echo "등록완료"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// 연결 종료
mysqli_close($conn);
// 페이지 이동
echo ("<script>location.href='./register.php';</script>");
echo "<script>alert('신청을 승인하였습니다.')</script>";

?>

    

