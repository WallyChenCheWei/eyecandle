<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $id = (int) $_GET['id'];
    $type_id = (int) $_GET['type'];

    $data = Doctrine::getTable('ColorPic')->find($id);
    $data->is_active      = 0;
    $data->save();
    
    $fileS =  "./pic/".$data->small_pic;
    $fileB =  "./pic/".$data->big_pic;
    @unlink($fileS);
    @unlink($fileB);

    if(isset($_GET['back'])){
        header("location:".$_GET['back']);
    }else{
        header("location:product_list.php?type=$type_id");
    }


} else {
    header('location:index_logout.php');
    exit();
} 
?>