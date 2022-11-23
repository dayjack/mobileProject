<?php

require("/var/www/mail.php");
require_once("class.phpmailer.php");

$from_id="frostjanna12@naver.com";
$to_id=$_GET['email'];
$num = $_GET['num'];
$smtp="smtp.naver.com"; 
$title="인증번호를 확인하세요";
$article="인증 번호는 $num 입니다.";


$mail=new PHPMailer(true); 
$mail->IsSMTP();
    
try{ 
  $mail->Host=$smtp; 
  $mail->SMTPAuth=true; 
  $mail->Port=465; 
  $mail->SMTPSecure="ssl"; 
  $mail->Username=$from_id; 
  $mail->Password=$password; 
  $mail->CharSet = "UTF-8"; 
  $mail->SetFrom($from_id); 
  $mail->AddAddress($to_id); 
  $mail->Subject=$title; 
  $mail->MsgHTML($article); 
  $mail->Send(); 
} catch (phpmailerException $e){ 
  echo $e->errorMessage(); 
} catch (Exception $e){ 
  echo $e->getMessage(); 
}
echo "메일이 발송되었습니다";
?>