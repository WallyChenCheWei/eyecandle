<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $id = (int) $_GET['id'];
    $all = (int) $_GET['all'];

    $dataProduct = Doctrine::getTable('Product')->find($id);
    $dataProduct->is_active      = 0;
    $dataProduct->save();

    $qColorPic = Doctrine_Query::create()
                ->from('ColorPic')
                ->andwhere("product_id = ?", $dataProduct->id)
                ->andwhere("is_active = ?", 1);
    $dataColorPic = $qColorPic->fetchArray();

    foreach($dataColorPic as $datas){

        $data = Doctrine::getTable('ColorPic')->find($datas['id']);
        $data->is_active      = 0;
        $data->save();

        $fileS =  "./pic/".$datas['small_pic'];
        $fileB =  "./pic/".$datas['big_pic'];
        @unlink($fileS);
        @unlink($fileB);
    }
    if($all==1){
        header("location:product_list.php");
    }else{
        header("location:product_list.php?type=$dataProduct->type_id");      
    }

} else {
    header('location:index_logout.php');
    exit();
} 
?>