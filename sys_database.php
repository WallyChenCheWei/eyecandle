<?php
$conn = Doctrine_Manager::connection('mysql://root:1q2w3e4r@localhost/eyecandle', 'doctrine');
//$conn = Doctrine_Manager::connection('mysql://a2546362_candle:mmmh42@mysql5.000webhost.com/a2546362_candle', 'doctrine');

$conn->setCharset('UTF8');
date_default_timezone_set("Asia/Taipei");
?>
