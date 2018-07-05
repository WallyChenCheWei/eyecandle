<?php require_once('bootstrap.php');

$code = isset($_GET['code']) ? $_GET['code'] : '';

if($code) {

    $qForgotPassword = Doctrine_Query::create()
                      ->from('ForgotPassword')
                      ->addwhere("code = ?", $code);
    $dataForgotPassword = $qForgotPassword->fetchOne();
    $countForgotPassword = $qForgotPassword->count();
    
    $id = $dataForgotPassword->id;
    $is_active = $dataForgotPassword->is_active;

    if($is_active == 1){
        header('location:password_edit.php?id='.$id);
        exit();
    }else{
        echo "<SCRIPT LANGUAGE='javascript'>";
        echo "alert('網址已失效，請重新到登入畫面點擊“忘記密碼”');";
        echo "window.location.replace('login.php')";
        echo "</SCRIPT>";
        exit;
    }
}

