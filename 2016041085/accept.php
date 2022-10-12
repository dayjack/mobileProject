<?php 


require("/var/www/db/dbset.php");

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
echo "$restaurant_id<br>";

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
echo "crn :  $crn <br>"; 
echo "restaurant_name :  $restaurant_name <br>";
echo "email :  $email <br>";
echo "address :  $address <br>";
echo "restaurant_info :  $restaurant_info <br>";
echo "menu :  $menu <br>";
echo "food_category :  $food_category <br>";
echo "hashtag :  $hashtag <br>";
//$result = mysqli_query($conn,"insert into restaurant(crn,retaurant_name,email,address,restaurant_info,menu,food_img,food_category,
//hashtag,rate_avg,rate_total,rate_count) values($crn,$restaurant_name,$email,$address,$restaurant_info,$menu,$food_img,$food_category,$hashtag,0,0,0)");
//$result = mysqli_query($conn,"insert into restaurant(crn,restaurant_name,email,address,restaurant_info,menu,food_category,
//hashtag,rate_avg,rate_total,rate_count) values($crn,$restaurant_name,$email,$address,$restaurant_info,$menu,$food_category,$hashtag,0,0,0)");
$sql = "insert into restaurant(crn,restaurant_name,email,address,restaurant_info,menu,food_category,
hashtag,rate_avg,rate_total,rate_count) values('$crn','$restaurant_name','$email','$address','$restaurant_info','$menu','$food_category','$hashtag','0','0','0')";
if ($conn->query($sql) === TRUE) {
    echo "승인 완료<br>"; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$result = mysqli_query($conn,"delete from restaurant_apply where restaurant_id=$restaurant_id");
mysqli_close($conn);
echo ("<script>location.href='./restaurantapplylist.php';</script>");
echo "<script>alert('신청을 승인하였습니다.')</script>";
?>