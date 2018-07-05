<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $id = (int) $_GET['id'];

    $data = Doctrine::getTable('Cart')->find($id);
    $data->status      = 'send';
    $data->save();

    header("location:cart_list.php");
} else {
    header('location:index_logout.php');
    exit();
} 
?>