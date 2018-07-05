<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $id = (int) $_GET['id'];

    $data = Doctrine::getTable('Type')->find($id);
    $data->is_active      = 0;
    $data->save();

    header("location:type_list.php");
} else {
    header('location:index_logout.php');
    exit();
} 
?>