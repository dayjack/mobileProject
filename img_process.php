<?php

    /*
        이미지 업로드 예제 
     */
    $uploadDir = "images/";
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
        <img src="<?=$uploadDir?><?=$fileName[$i]?>">
<?php 
        }
    }
    
    echo "<br>";
    echo json_encode($file_json);
?>

   
