<?php require_once('../bootstrap.php');

$username = $_POST['username'];
$password = $_POST['password'];

$qAdmin = Doctrine_Query::create()
                ->from('Admin')
                ->addwhere("username = ?", $username)
                ->addwhere("password = ?", $password);
$countAdmin = $qAdmin->Count();
$dataAdmin = $qAdmin->fetchOne();

if($countAdmin > 0) {
    $_SESSION['adminaccount'] = $dataAdmin->username;
}

$adminaccount = $_SESSION['adminaccount'];

if(isset($adminaccount)) {
    header("location:user_list.php");
} else {
    header('location:index.php');
    exit();
}
?>