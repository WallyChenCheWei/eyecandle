<?php
require_once('bootstrap.php');

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$status = isset($_GET['status']) ? intval($_GET['status']) : 0;

if($id) {

    if ($status <= 0) {
        if(isset($user)) {

            $qCollect = Doctrine_Query::create()
                ->from('Collect')
                ->addWhere('user_id = ?', $user)
                ->addWhere('product_id = ?', $id);
            $dataCollect = $qCollect->fetchOne();
            $countCollect = $qCollect->Count();


            if($countCollect > 0){
                if($dataCollect->is_active==1){
                    $data = Doctrine::getTable('Collect')->find($dataCollect->id);
                    $data->is_active      = 0;
                    $data->save();
                }
            }
        }
        unset($_SESSION['wishlist'][$id]);

    } else {
        if(isset($user)) {
            $qCollect = Doctrine_Query::create()
                ->from('Collect')
                ->addWhere('user_id = ?', $user)
                ->addWhere('product_id = ?', $id);
            $dataCollect = $qCollect->fetchOne();

            $countCollect = $qCollect->Count();
            if($countCollect > 0){
                if($dataCollect->is_active==0){
                    $data = Doctrine::getTable('Collect')->find($dataCollect->id);
                    $data->is_active      = 1;
                    $data->save();
                }
            }else{
                $dataCollect = new Collect();
                $dataCollect->user_id            = $user;
                $dataCollect->product_id         = $id;
                $dataCollect->save();
            }
        }
        $_SESSION['wishlist'][$id] = 1;
    }
}
echo json_encode( $_SESSION['wishlist'] );




