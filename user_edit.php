<?php include('common/_head.php');

if($user) {

    $total = 0;
    $message = '';

    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : '0';

    $qUser = Doctrine_Query::create()
            ->from('User')
            ->addwhere("id = ?", $user);
    $dataUser = $qUser->fetchOne();
    $countUser = $qUser->Count();

    if($countUser>0){
        if($password or $name or $address or $phone) {

            $data = Doctrine::getTable('User')->find($user);
            if($password){
                $data->password         = md5($password);
            }
            $data->name             = $name;
            $data->tel              = $phone;
            $data->address          = $address;
            $data->save();

            $message = '成功更新一筆資料';

        }
    }

?>
<!-- 左邊區塊 -->
<style>
    .flash_message{
        
    }   
    
</style>
<div class="member registertable">
    <div class="registervertical">
        <h2>修改資訊</h2>
        <?php if ($message) { ?>
            <a href="javascript:;" class="close_message">
                <div class="flash_message">
                    <div><?= $message; ?>
                    <i class="fa fa-check"></i></div>
                </div>
            </a>
        <?php } $massage=NULL; ?>
        <form class="" id="form" name="form" method="post">
            <div class="membertext">
                <div class="membertip1">修改會員資料</div>
                <div class="mail">
                    <input class="inputstyle" type="text"  name="email" id="email" maxlength="30" placeholder="E-mail" value="<?= $dataUser['email']; ?>" readonly>
                    <p class="registeralert"></p>
                </div>
                <div class="pass">
                    <input class="inputstyle" type="password"  id="password" name="password" maxlength="12" placeholder="Password">
                    <p class="registeralert"></p>
                </div>
                <div class="Confirmpass">
                    <input class="inputstyle" type="password"  id="confirmpassword" name="password" maxlength="12" placeholder="Confirm Password">
                    <p class="registeralert"></p>
                </div>
                <div class="membertip2">修改送貨資訊</div>
                <div class="name">
                    <input class="inputstyle" type="text"  name="name" id="name" maxlength="10" placeholder="Name" value="<?= $dataUser['name']; ?>">
                    <p class="registeralert">錯誤訊息</p>
                </div>
    <!--            <div class="radio">-->
    <!--                <div><input class="selectcircle" type="radio"  name="place" value="xxx"><span>指定地點</span></div>-->
    <!--                <div><input class="selectcircle" type="radio"  name="place" value="xxx"><span>商店取貨</span></div>-->
    <!--            </div>-->
                <div class="address">
                    <input class="inputstyle" type="text"  name="address" id="address" maxlength="50" placeholder="Address" value="<?= $dataUser['address']; ?>">
                    <p class="registeralert">錯誤訊息</p>
                </div>
                <div class="phone">
                    <input class="inputstyle" type="text"   name="phone" id="phone" maxlength="50"placeholder="Phone" value="<?= $dataUser['tel']; ?>">
                    <p class="registeralert">錯誤訊息</p>
                </div>
                <div class="registerwrapmsg"><div class="msg"></div></div>
                <div class="memberbtn">
                    <button class="inputsub" onclick="javascript:location.href = 'user.php'" type="button">返回</button>
                    <button class="inputsub" type="submit">送出</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
<script>
    
    $('.close_message').click(function(){
        $('.flash_message').fadeOut();
    });

    $('.registeralert').hide();
    var isPass = true;

    var password_check = function(){
        var password = $('#password').val(),
            confirmpassword = $('#confirmpassword').val();

        if(password != confirmpassword) {
            isPass = false;
            $('#confirmpassword').next().html('<i class="fa fa-times-circle"></i>密碼和密碼確認欄內容不符');
            $('#confirmpassword').next().show();
            $('#confirmpassword').css({'border-bottom':'solid 2px #a3120a'});
        }else{
            $('#confirmpassword').next().hide();
            $('#confirmpassword').css({'border-bottom':'solid 1px #000'});
        }
    };

    $('#password').on('change', password_check);
    $('#confirmpassword').on('change', password_check);

    $('#form').submit(function(){
        isPass = true;
        $('.registeralert').hide();
        $('.msg').hide();

        var password = $('#password').val(),
            confirmpassword = $('#confirmpassword').val(),
            name = $('#name').val(),
            phone = $('#phone').val(),
            address = $('#address').val();
            
        if(<?= $user; ?>==0){
            
            password_check();
            
            if(!password) {
                isPass = false;
                $('#password').next().html('<i class="fa fa-times-circle"></i>請輸入密碼');
                $('#password').next().show();
                $('#password').css({'border-bottom':'solid 2px #a3120a'});
            }

            if(!confirmpassword) {
                isPass = false;
                $('#confirmpassword').next().html('<i class="fa fa-times-circle"></i>請確認密碼');
                $('#confirmpassword').next().show();
                $('#confirmpassword').css({'border-bottom':'solid 2px #a3120a'});
            }
        }    

        if(!name) {
            isPass = false;
            $('#name').next().html('<i class="fa fa-times-circle"></i>請輸入姓名');
            $('#name').next().show();
            $('#name').css({'border-bottom':'solid 2px #a3120a'});
        }

        if(!phone) {
            isPass = false;
            $('#phone').next().html('<i class="fa fa-times-circle"></i>請輸入電話');
            $('#phone').next().show();
            $('#phone').css({'border-bottom':'solid 2px #a3120a'});
        }

        if(!address) {
            isPass = false;
            $('#address').next().html('<i class="fa fa-times-circle"></i>請輸入送貨地址');
            $('#address').next().show();
            $('#address').css({'border-bottom':'solid 2px #a3120a'});
        }

        if(isPass) {
            document.form.submit();
        }

        return false;
    });

</script>
<?php
} else {
    header('location:login.php');
    exit();
}
?>
