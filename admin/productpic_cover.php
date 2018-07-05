<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $id = (int) $_GET['id'];
    $product_id = (int) $_GET['product_id'];

    $qColorPic = Doctrine_Query::create()
                ->from('ColorPic')
                ->andwhere("product_id = ?", $product_id);
    $dataColorPic = $qColorPic->fetchArray();

    foreach($dataColorPic as $datas){

        $data = Doctrine::getTable('ColorPic')->find($datas['id']);
        $data->is_cover      = 0;
        $data->save();
    }

    $data = Doctrine::getTable('ColorPic')->find($id);
    $data->is_cover      = 1;
    $data->save();

    header("location:product_list.php");

} else {
    header('location:index_logout.php');
    exit();
} 
?>