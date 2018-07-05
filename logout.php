<?php require_once('bootstrap.php');

$_SESSION['user']=NULL;
unset($_SESSION['user']);

if($referer==$web.'/cart_check.php'){
    $link = 'index.php';
}else{
    $link = $referer;
}

header("location: ".$link);
exit();
?>