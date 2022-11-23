<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        파일 전송시 form태그에 밑 속성 추가하기
        enctype="multipart/form-data" 
    -->
    <form action="img_process.php" method="post" 
    enctype="multipart/form-data">
    이미지업로드: <input type="file" name="img[]" accept="image/*" multiple /><br>
    <button type="submit">확인</button>
    </form>
</body>
</html>