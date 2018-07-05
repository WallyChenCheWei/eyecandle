<?php
require_once('bootstrap.php');

$custom = isset($_GET['custom']) ? $_GET['custom'] : '';

if($custom) {
    $_SESSION['custom'] = $custom;
    echo 1;
}else{
    echo 0;
}





