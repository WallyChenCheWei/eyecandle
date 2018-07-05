<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $id = (int) $_GET['id'];
    $is_soldout = (int) $_GET['is_soldout'];

    if($is_soldout==0){
        $soldout = 1;
    }else{
        $soldout = 0;
    }

    $data = Doctrine::getTable('Product')->find($id);
    $data->is_soldout      = $soldout;
    $data->save();

    header("location:product_list.php");

} else {
    header('location:index_logout.php');
    exit();
} 
?>