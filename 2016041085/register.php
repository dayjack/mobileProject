<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 정보 등록 페이지</title>
    <link rel="stylesheet" href="css/registerpage.css">
</head>
<body>

    <div class="topParent">
        <div class="topChild">
            <h2 class="topText">식당 정보 등록 페이지</h2>
        </div>
    </div>
    <div class="middle">
    <form method="post" action="./registeraccept.php" enctype="multipart/form-data">
        <br>사업자 등록번호 입력<br><br>
        <input type="text" name="crn" placeholder="- 없이 입력하세요"><br>
        <br>인접 학교 코드 <br><br>
        <a href='http://jubsoo2.bscu.ac.kr/src_gogocode/src_gogocode.asp' target='_blank' class="mya">학교 코드 검색해보기</a><br><br>
        <input type="text" name="scode" placeholder="- 없이 입력하세요"><br>

        <br>식당 이름 입력 <br><br>
        <input type="text" name="restaurant_name" placeholder="ex) 맥도날드 목동사거리점"><br>
        <br>이메일 <br><br>
        <input type="text" name="email" placeholder="xxxxxxxx@gmail.com"><br>
        <br>주소 <br><br>
        <input type="text" name="address" placeholder="여기에 주소 입력"><br><br>

        <label for="restaurant_info">식당 정보 & 이벤트 입력</label><br><br>
        <textarea name="restaurant_info" id="restaurant_info" cols="40" rows="30" placeholder="ex) 운영시간: 매일 -오전 10:10 ~ 오후 9:45
        휴무일: 연중 무휴
        전화번호 : 1111-2222
        이벤트 진행중  : 리뷰 작성 인증시  재방문시 음료 무료 쿠폰 증정"></textarea><br><br>
        
        <label for="menu">메뉴 정보 입력</label><br><br>
        <textarea name="menu" id="menu" cols="40" rows="30" placeholder="ex) 김치찌개 - 7000
        라면 - 5000"></textarea><br>

        <br>음식 카테고리 <br><br>
        <select name="food_category" id="food_category">
            <option value="none">===선택===</option>
            <option value="1">중식</option>
            <option value="2">한식</option>
            <option value="3">일식</option>
            <option value="4">양식</option>
            <option value="5">기타</option>
        </select><br><hr>

        <br>해시태그 <br><br> 
        <input type="text" name="hashtag" placeholder="ex) #ᄋᄋᄋ#ᄂᄂᄂ#ᄃᄃᄃ 와 같이 띄어쓰기 혹은 , 없이 입력해주세요"><br>
        <br>이미지업로드 <br><br>
        <input type="file" name="img[]" accept="image/*" multiple /><br>
        <center><input type="submit" value="등록하기"></center>
    </form>
    </div>
</body>
</html>