<?php require_once('bootstrap.php');

$result = array(
    'success' => 0,
    'msg' => '沒給參數'
);


if(isset($_POST['email']) and isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qUser = Doctrine_Query::create()
            ->from('User')
            ->addwhere("email = ?", $email)
            ->addwhere("password = ?", md5($password))
            ->addwhere("social = ?", 'website')
            ->addwhere("is_active = ?", 1);
    $countUser = $qUser->Count();
    $dataUser = $qUser->fetchOne();

    if ($countUser > 0) {
        $_SESSION['user'] = $dataUser->id;
        $result['success'] = 1;
        $result['msg'] = '登入成功';

        wish_list();
        
    } else {
        $result['msg'] = '帳號或密碼錯誤';
    }
    
//    php5.4
//    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    echo json_encode($result);
    exit;

} else if(isset($_POST['social_id']) and isset($_POST['email']) and isset($_POST['name']) and isset($_POST['social'])) {
    
    $social_id = $_POST['social_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $social = $_POST['social'];

    $qUser = Doctrine_Query::create()
                    ->from('User')
                    ->addwhere("social_id = ?", $social_id);
    $dataUser = $qUser->fetchOne();
    $countUser = $qUser->Count();


    if ($countUser > 0) {
        if($dataUser->is_active==0){
            $data = Doctrine::getTable('User')->find($dataUser->id);
            $data->is_active      = 1;
            $data->save();
        }

    } else {
        $dataUser = new User();
        $dataUser->name                 = $name;
        $dataUser->email                = $email;
        $dataUser->social               = $social;
        $dataUser->social_id            = $social_id;
        $dataUser->save();
    }

    $_SESSION['user'] = $dataUser->id;
    $result['success'] = 1;

    wish_list();

//    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    echo json_encode($result);
    exit;
}

function wish_list(){
    if(isset($_SESSION['wishlist'])){
        $ids = array_keys($_SESSION['wishlist']);

        if(! empty($ids)) {

            $qCollect = Doctrine_Query::create()
                ->from('Collect')
                ->addWhere('user_id = ?', $_SESSION['user'])
                ->addWhere('is_active = ?', 1);
            $dataCollect = $qCollect->fetchArray();

            foreach ($dataCollect as $data){

                $dataC = Doctrine::getTable('Collect')->find($data['id']);
                $dataC->is_active      = 0;
                $dataC->save();

            }

            foreach ($ids as $id){

                $qCollect = Doctrine_Query::create()
                    ->from('Collect')
                    ->addWhere('user_id = ?', $_SESSION['user'])
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
                    $dataCollect->user_id            = $_SESSION['user'];
                    $dataCollect->product_id         = $id;
                    $dataCollect->save();
                }
            }
        }
    }

}

