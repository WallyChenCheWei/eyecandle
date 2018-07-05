<?php require_once('bootstrap.php');



$req = 'cmd=_notify-validate';



foreach ($_POST as $key => $value) {
  $value = urlencode(stripslashes($value));
  $req .= "&$key=$value";
}

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);    

/* 以上是 paypal 在消費者付款當下，呼叫這支 IPN 程式，然後 IPN 程式要回覆 PAYPAL 說收到了 */ 
/* 以下是 PAYPAL 傳來的訂單資訊 */ 

// assign posted variables to local variables 
$payment_status     =   $_POST['payment_status'] ; 
$payment_amount     =   $_POST['mc_gross'] ; 
$payment_currency   =   $_POST['mc_currency'] ; 
$txn_id             =   $_POST['txn_id'] ; 
$receipt_id         =   $_POST['receipt_id'] ; 
$receiver_email     =   $_POST['receiver_email'] ; 
$payer_email        =   $_POST['payer_email'] ; 
$fee                =   $_POST['payment_fee'] ; 
$custom             =   $_POST['custom'] ; 
$total = 0;

$customs = explode(', ',$custom);

if (($payment_status == 'Completed') && ($payment_currency == "USD")){
    if(isset($_SESSION['cart'])){

        if($customs[0] and $customs[1] and empty($user)){

            $dataUser = new User();
            $dataUser->email                = $customs[0];
            $dataUser->password             = md5($customs[1]);
            $dataUser->social               = 'website';
            $dataUser->save();

            $_SESSION['user'] = $dataUser->id;
            $user = $_SESSION['user'];
        }

        $ids = array_keys($_SESSION['cart']);

        if(! empty($ids)) {

            $qColorPic = Doctrine_Query::create()
                ->from('ColorPic cp')
                ->innerJoin('cp.Product p ON p.id = cp.product_id')
                ->andwhere("is_active = ?", 1)
                ->whereIn('id', $ids);
            $dataColorPic = $qColorPic->fetchArray();
            $countColorPic = $qColorPic->Count();

            foreach ($dataColorPic as $data){

                $data['qty'] = $_SESSION['cart'][$data['id']];
                $cart_list[$data['id']] = $data;

                $total += $data['qty'] * $data['Product']['price'];
                $cart_list[$data['id']] = $data;
            }

            if($user){

                $data = Doctrine::getTable('User')->find($user);
                $data->name         = $customs[2];
                $data->address      = $customs[3];
                $data->tel          = $customs[4];           
                $data->save();
            }

            do {
                $order_num = uniqid();
                $qCart = Doctrine_Query::create()
                    ->from('Cart')
                    ->andwhere("order_name = ?", $order_num);
                $countCart = $qCart->Count();
            }while($countCart = 0);

            $dataCart = new Cart();
            $dataCart->user_id            = $user;
            $dataCart->order_name         = $order_num;
            $dataCart->total              = $total;
            $dataCart->name               = $customs[2];
            $dataCart->send_option        = 'address';
            $dataCart->address            = $customs[3];
            $dataCart->tel                = $customs[4];
            $dataCart->status             = 'paid';
            $dataCart->save();

            foreach ($cart_list as $data){

                $dataCartList = new CartList();
                $dataCartList->cart_id            = $dataCart['id'];
                $dataCartList->product_id         = $data['product_id'];
                $dataCartList->color_id           = $data['color_id'];
                $dataCartList->num                = $data['qty'];
                $dataCartList->total              = $data['Product']['price']*$data['qty'];
                $dataCartList->save();
            }

            unset( $_SESSION['cart'] );

            header('location:cart_result.php');
            exit();
        }
    }
}

if (!$fp) {	// HTTP ERROR
}
else {
    fputs($fp, $header . $req) ;
    while(!feof($fp)) {
        $res = fgets ($fp, 1024);
        if(strcmp ($res, "VERIFIED") == 0) {
            // check the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your Primary PayPal email
            // check that payment_amount/payment_currency are correct
            // process payment
            if($payment_status == 'Completed') {
                /* 確定訂單ＯＫ了，就看你想作什麼事 */
   
//                for ($i = 1; $i <= $_POST['num_cart_items']; $i++) {
//                    
//                    $name = $_POST['item_name' . $i];
//                    $number = $_POST['item_number' . $i];
//                    $quantity = $_POST['quantity' . $i];
//
//                    $query = "INSERT INTO payments (product_name, product_id, product_quantity)
//                              VALUES ('" . mysql_real_escape_string($name) . "', '" . mysql_real_escape_string($number) . "', '" . mysql_real_escape_string($quantity) . "')";
//                    mysql_query($query);
//                 }
                 echo 'Success';
            }
        }
        else if (strcmp ($res, "INVALID") == 0) {
            // log for manual investigation
        }
    }
    fclose($fp) ;
}

?>