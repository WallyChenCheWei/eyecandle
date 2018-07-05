<?php require_once('../bootstrap.php');
$_SESSION['adminaccount']=NULL;
unset($_SESSION['adminaccount']);

header("location: index.php");
exit();
?>