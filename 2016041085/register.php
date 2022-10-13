<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>식당 정보 등록 페이지</title>
    <style>
        input[type="text"] {
            width: 500px;
        }
    </style>
</head>


<body>
    <center><br><h2>식당 정보 등록 페이지</h2></br></center>
    <form method="post" action="./registeraccept.php" enctype="multipart/form-data">
        사업자 등록번호 입력 : 
        <input type="text" name="crn" placeholder="- 없이 입력하세요"><br>
        인접 학교 코드 :
        <input type="text" name="scode" placeholder="- 없이 입력하세요"><br>
        <a href='http://jubsoo2.bscu.ac.kr/src_gogocode/src_gogocode.asp' target='_blank'>학교 코드 검색해보기</a>
        <br>

        식당 이름 입력 :
        <input type="text" name="restaurant_name" placeholder="ex) 맥도날드 목동사거리점"><br>
        이메일 :
        <input type="text" name="email" placeholder="xxxxxxxx@gmail.com"><br>
        주소 :
        <input type="text" name="address"><br>

        <label for="restaurant_info">식당 정보 입력</label><br>
        <textarea name="restaurant_info" id="restaurant_info" cols="40" rows="30" placeholder="ex) 운영시간: 매일 -오전 10:10 ~ 오후 9:45
        휴무일: 연중 무휴
        전화번호 : 1111-2222"></textarea><br>
        
        <label for="menu">메뉴 정보 입력</label><br>
        <textarea name="menu" id="menu" cols="40" rows="30" placeholder="ex) 김치찌개 - 7000
        라면 - 5000"></textarea><br>

        음식 카테고리 :
        <select name="food_category" id="food_category">
            <option value="none">===선택===</option>
            <option value="1">중식</option>
            <option value="2">한식</option>
            <option value="3">일식</option>
            <option value="4">양식</option>
            <option value="5">기타</option>
        </select><br>

        해시태그 : 
        <input type="text" name="hashtag" placeholder="ex) #ᄋᄋᄋ#ᄂᄂᄂ#ᄃᄃᄃ 와 같이 띄어쓰기 혹은 , 없이 입력해주세요"><br>
        이미지업로드: <input type="file" name="img[]" accept="image/*" multiple /><br>

        <input type="submit" value="등록하기">

        

    </form>

    
</body>
</html>