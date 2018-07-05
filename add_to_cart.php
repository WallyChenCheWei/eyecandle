<?php
require_once('bootstrap.php');

if (!isset($_SESSION['cart'])) {
    
    $_SESSION['cart'] = array();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;
$status = isset($_GET['status']) ? $_GET['status'] : '';

if($id) {
    
    if ($qty <= 0) {
        unset($_SESSION['cart'][$id]);
    } else {
        if($status=='final'){
            $_SESSION['cart'][$id] = $qty;
        }else{
            $_SESSION['cart'][$id] += $qty;
        }

    }
}
echo json_encode( $status );




