<?php require_once('bootstrap.php');

$email = isset($_GET['email']) ? $_GET['email'] : '';

if($email) {

    $qUser = Doctrine_Query::create()
            ->from('User')
            ->addwhere("email = ?", $email);
    $countUser = $qUser->Count();
    $dataUser = $qUser->fetchOne();

    echo $countUser;
}
