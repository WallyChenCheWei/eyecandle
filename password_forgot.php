<?php
require_once('bootstrap.php');

$result = array(
    'success' => 0,
    'msg' => '沒給參數'
);

$forgot_email = isset($_POST['forgot_email']) ? $_POST['forgot_email'] : '';

if($forgot_email) {
    $qUser = Doctrine_Query::create()
            ->from('User')
            ->addwhere("email = ?", $forgot_email)
            ->addwhere("social = ?", 'website')
            ->andwhere("is_active = ?", 1);
    $dataUser = $qUser->fetchOne();
    $countUser = $qUser->count();
    
    if ($countUser > 0) {

        $name = $dataUser->name;
        $email = $dataUser->email;

        do {
            $randomcode = emailPassword();
            $qForgotPassword = Doctrine_Query::create()
                        ->from('ForgotPassword')                    
                        ->andwhere("code = ?", $randomcode);
            $countForgotPassword = $qForgotPassword->Count();
        }while($countForgotPassword = 0);
        
        $qForgotPassword = Doctrine_Query::create()
                            ->from('ForgotPassword')
                            ->addwhere("user_id = ?", $dataUser->id)
                            ->andwhere("is_active = ?", 1);      
        $ForgotPassword = $qForgotPassword->fetchArray();
     
        foreach ($ForgotPassword as $value) {
            $data = Doctrine::getTable('ForgotPassword')->find($value['id']);
            $data->is_active      = 0;
            $data->save();
        }
        
        $dataForgotPassword = new ForgotPassword();
        $dataForgotPassword->user_id            = $dataUser->id;
        $dataForgotPassword->code               = $randomcode;
        $dataForgotPassword->save();
        
        $link = $web."/password_check.php?code=".$randomcode;
        
        $subject = "Eye Candle Service Center"; //設定郵件標題
        $content =
              '<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="content" style="height:auto;width: 800px;border:solid 1px #333;box-sizing:border-box; padding:10px 30px 30px 30px" >
		<div class="logo" ><img src="http://eyecandle.comuf.com/eyecandle/images/LetterLogo.png"></div>
		<div class="title" style="font-size:30px; font-family:微軟正黑體; font-weight:bold; border-bottom:solid 1px #333; padding:10px 0 10px 0; color:#333 " >請驗證您的電子郵件地址</div>
		<div class="subtitle" style="font-size:14px; font-family:微軟正黑體; padding:10px 0 18px 0;color:#777">請點擊下方按鈕或複製貼上以下連結，驗證此電子郵件地址：</div>
		<a href="'.$link.'" style="display:inline-block; margin-bottom:20px; text-decoration:none; font-size:18px" >'.$link.'</a>
		<div class="btn" style="width: 300px;height:40px; border:solid 1px #333;background:#333;text-align:center;"><a href="'.$link.'" style="text-decoration:none;line-height:40px; color:#fff; font-family:微軟正黑體">立即驗證</a></div>
	</div>
</body>
</html>';

        send_mail($subject,$content,$email);
       
        $result = array(
            'success' => 1,
            'msg' => '密碼已經寄到信箱'
        );
        
    } else {
        $result['msg'] = '找不到這個Email';
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
   
}

$result['msg'] = '發生錯誤, 請洽開發人員';
echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit;


