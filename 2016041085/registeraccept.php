
<?php
// DB 관련 정보
require("/var/www/db/dbset.php");

$conn = mysqli_connect($host, $username, $password, $dbname); // DB 연결
if (!($conn)) {
    echo "db 연결 실패: " . mysqli_connect_error();
}
mysqli_query($db, "set session character_set_connection=utf8;");
mysqli_query($db, "set session character_set_results=utf8;");
mysqli_query($db, "set session character_set_client=utf8;");
mysqli_set_charset($conn,"utf8mb4");

$crn = $_POST[crn];
$restaurant_name = $_POST[restaurant_name];
$email = $_POST[email];
$address = $_POST[address];
$restaurant_info = $_POST[restaurant_info];
$menu = $_POST[menu];
// $food_img = $_POST[food_img];
$food_category = $_POST[food_category];
$hashtag = $_POST[hashtag];


echo "crn :  $crn <br>"; 
echo "restaurant_name :  $restaurant_name <br>";
echo "email :  $email <br>";
echo "address :  $address <br>";
echo "restaurant_info :  $restaurant_info <br>";
echo "menu :  $menu <br>";
echo "food_category :  $food_category <br>";
echo "hashtag :  $hashtag <br>";

$sql = "insert into restaurant_apply(crn,restaurant_name,email,address,restaurant_info,menu,food_category,hashtag)
value('$crn','$restaurant_name','$email','$address','$restaurant_info','$menu','$food_category','$hashtag')";


if ($conn->query($sql) === TRUE) {
    echo "등록완료"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysql_close; 

?>

    

