<?php
header('Content-type: text/html; charset=utf-8'); 
session_start();
ob_start();
if(isset($_SESSION['adminaccount'])){
    $adminaccount = $_SESSION['adminaccount'];
}
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}else{
    $user = NULL;
}

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';

chdir(dirname(__FILE__));
require_once('lib/Doctrine.php');
require_once('lib/phpmailer/class.phpmailer.php');

spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine', 'modelsAutoload'));
$manager = Doctrine_Manager::getInstance();

// Database Connection
require_once('sys_database.php');


// Doctrine Setup
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
$manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine_Core::VALIDATE_ALL);

Doctrine_Core::loadModels('models/generated');
Doctrine_Core::loadModels('models');

$host = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
$web = "http://".$host."/eyecandle";

//email忘記唯一碼
function emailPassword() {
    $password_len = 32;
    $password = '';
    $word = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    $len = strlen($word);
    for ($i = 0; $i < $password_len; $i++) {
        $password .= $word[rand() % $len];
    }
    return $password;
}

//判斷有無openssl
//echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";

//phpmailer Gmail
function send_mail($subject,$content,$rcv_mail){

    $mail = new PHPMailer;
    $mail->isSMTP();
//        $mail->SMTPDebug = 2;
    $mail->IsHTML(true); //設定郵件內容為HTML
//                $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "heyimarieltest@gmail.com";
    $mail->Password = "heyimariel";
    $mail->CharSet = "utf8"; //設定郵件編碼
    $mail->From = "heyimarieltest@gmail.com"; //設定寄件者信箱
    $mail->FromName = "Eye Candle Service"; //設定寄件者姓名
    $mail->Subject = $subject;
    $mail->Body = $content;
    $mail->AddAddress($rcv_mail); //設定收件者郵件及名稱
    $mail->AddBCC("heyimariel@gmail.com");

    if (!$mail->send()) {
//            echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
//            echo "Message sent!";
    }
}



?>
