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

echo "";
$array_id = [];
$array_name = [];
$count;
$result = mysqli_query($conn,"select * from restaurant_apply");
while($row = mysqli_fetch_array($result)) {
  //echo $row['restaurant_id'];
  //echo "<br>";
  array_push($array_id,$row['restaurant_id']);
  array_push($array_name,$row['restaurant_name']);
}
mysqli_close($conn);
$count = count($array_id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 승인 페이지</title>
</head>
<body>
    <h2><center>식당 승인 페이지</center></h2><hr>
    <?php
    // echo "$count <br>";
    for ($i=0 ; $i < $count ; $i++) {
        // echo "$array_id[$i]  :  $array_name[$i] <br>";
        echo "<a href='./showrestaurantapply.php?restaurant_id=$array_id[$i]'> $array_name[$i] </a><hr>";    
    }
    ?>
    
</body>
</html>

