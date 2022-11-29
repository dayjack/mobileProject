<?php
/**
 * retaurant 테이블의 정보를 json으로 보여주는 페이지
 * parameter의 category 변수값으로 보여주는 데이터 결정
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
header("Content-Type:text/html;charset=utf-8");
// db 데이터 문자 인코딩 설정
mysqli_query($db, "set session character_set_connection=utf8;");
mysqli_query($db, "set session character_set_results=utf8;");
mysqli_query($db, "set session character_set_client=utf8;");
mysqli_set_charset($conn,"utf8mb4");

$restaurant_id = $_GET[restaurant_id];
$category = $_GET['category'];
$scode = $_GET['scode'];

if ($scode == 0 or $scode == NULL) {
    if ($restaurant_id == NULL or $restaurant_id == 0) {
        switch($category) {
            case 1:
                $sql = "Select * from restaurant where food_category = '1';";
                break;
            case 2:
                $sql = "Select * from restaurant where food_category = '2';";
                break;
            case 3:
                $sql = "Select * from restaurant where food_category = '3';";
                break;
            case 4:
                $sql = "Select * from restaurant where food_category = '4';";
                break;
            case 5:
                $sql = "Select * from restaurant where food_category = '5';";
                break;
            default:
                $sql = "Select * from restaurant;";
                break;
        }
    } else {
        switch($category) {
            case 1:
                $sql = "Select * from restaurant where food_category = '1' and restaurant_id = '$restaurant_id';";
                break;
            case 2:
                $sql = "Select * from restaurant where food_category = '2' and restaurant_id = '$restaurant_id';";
                break;
            case 3:
                $sql = "Select * from restaurant where food_category = '3' and restaurant_id = '$restaurant_id';";
                break;
            case 4:
                $sql = "Select * from restaurant where food_category = '4' and restaurant_id = '$restaurant_id';";
                break;
            case 5:
                $sql = "Select * from restaurant where food_category = '5' and restaurant_id = '$restaurant_id';";
                break;
            default:
                $sql = "Select * from restaurant where restaurant_id = '$restaurant_id'";
                break;
        }
    }
} else {
    if ($restaurant_id == NULL or $restaurant_id == 0) {
        switch($category) {
            case 1:
                $sql = "Select * from restaurant where food_category = '1' and scode = '$scode';";
                break;
            case 2:
                $sql = "Select * from restaurant where food_category = '2' and scode = '$scode';";
                break;
            case 3:
                $sql = "Select * from restaurant where food_category = '3' and scode = '$scode';";
                break;
            case 4:
                $sql = "Select * from restaurant where food_category = '4' and scode = '$scode';";
                break;
            case 5:
                $sql = "Select * from restaurant where food_category = '5' and scode = '$scode';";
                break;
            default:
                $sql = "Select * from restaurant where scode = '$scode';";
                break;
        }
    } else {
        switch($category) {
            case 1:
                $sql = "Select * from restaurant where food_category = '1' and restaurant_id = '$restaurant_id' and scode = '$scode';";
                break;
            case 2:
                $sql = "Select * from restaurant where food_category = '2' and restaurant_id = '$restaurant_id' and scode = '$scode';";
                break;
            case 3:
                $sql = "Select * from restaurant where food_category = '3' and restaurant_id = '$restaurant_id' and scode = '$scode';";
                break;
            case 4:
                $sql = "Select * from restaurant where food_category = '4' and restaurant_id = '$restaurant_id' and scode = '$scode';";
                break;
            case 5:
                $sql = "Select * from restaurant where food_category = '5' and restaurant_id = '$restaurant_id' and scode = '$scode';";
                break;
            default:
                $sql = "Select * from restaurant where restaurant_id = '$restaurant_id' and scode = '$scode'";
                break;
        }
    }

}







$result = mysqli_query($conn, $sql);
$output = array(); // 응답값으로 보낼 값

if (mysqli_num_rows($result) > 0) { // 쿼리 결과로 1행 이상 존재한다면
    while ($row = mysqli_fetch_assoc($result)) { // 행별로 유저의 정보 output에 넣어주기
        array_push($output,
            array(
                "restaurant_id" => $row['restaurant_id'],
                "crn" => $row['crn'],
                "restaurant_name" => $row['restaurant_name'],
                "email" => $row['email'],
                "address" => $row['address'],
                "restaurant_info" => $row['restaurant_info'],
                "menu" => $row['menu'],
                "food_img" => $row['food_img'],
                "food_category" => $row['food_category'],
                "hashtag" => $row['hashtag'],
                "rate_avg" => $row['rate_avg'],
                "rate_total" => $row['rate_total'],
                "rate_count" => $row['rate_count'],
                "scode" => $row['scode']
            )
        );
    }
} else { // 쿼리 결과가 없다면 메시지 보내주기
    $output = array('message' => '쿼리 결과 없음');
}

// 배열형식의 결과를 json으로 변환 
 echo json_encode($output, JSON_UNESCAPED_UNICODE); // array를 json형태로 변환하여 출력

// DB 접속 종료 
mysqli_close($con); 



?>