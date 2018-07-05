<?php include('common/_head.php'); 

$total = 0;
$user = isset($_SESSION['user']) ? $_SESSION['user'] : '0';

$qUser = Doctrine_Query::create()
        ->from('User')
        ->addwhere("id = ?", $user);
$dataUser = $qUser->fetchOne();
$countUser = $qUser->Count();

?>
<!-- 左邊區塊 -->
<div class="member registertable">
    <div class="registervertical">
        <h2>確認送貨資訊</h2>
        <form class="" id="form" name="form" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
            <div class="membertext">
                <?php if(empty($user)){ ?>
                    <div class="membertip1">如果此為您第一次購買eye candle 商品，完成訂購程序後立即成為 eye candle 會員!</div>
                    <div class="mail">
                        <input class="inputstyle" type="text"  name="email" id="email" maxlength="30" placeholder="E-mail">
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
                <?php } ?>
                <div class="membertip2">送貨資訊</div>
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
                    <button class="inputsub" onclick="javascript:location.href = 'cart_list.php'" type="button">返回</button>

                    <?php
                    if(isset($_SESSION['cart'])){
                        $ids = array_keys($_SESSION['cart']);
                        if(! empty($ids)) {

                            $qColorPic = Doctrine_Query::create()
                                ->from('ColorPic cp')
                                ->innerJoin('cp.Product p ON p.id = cp.product_id')
                                ->andwhere("is_active = ?", 1)
                                ->whereIn('id', $ids);
                            $dataColorPic = $qColorPic->fetchArray();
                            $countColorPic = $qColorPic->Count();

                            foreach ($dataColorPic as $data) {
                                $data['qty'] = $_SESSION['cart'][$data['id']];
                                $cart_list[$data['id']] = $data;

                                $total += $data['qty'] * $data['Product']['price'];
                                $cart_list[$data['id']] = $data;
                            }
                        }
                    }

                    ?>
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="heyimariel-facilitator@gmail.com">
                    <?php $i= 1;

                    foreach ($cart_list as $data){

                        $qColor = Doctrine_Query::create()
                                ->from('Color')
                                ->andwhere("id = ?", $data['color_id']);
                        $dataColor = $qColor->fetchOne();
                        $countColor = $qColor->Count();

                        ?>
                    <input type="hidden" name="item_name_<?= $i; ?>" value="<?= $data['Product']['name'].' ('.$dataColor['name'].')'; ?>">
                    <input type="hidden" name="item_number_<?= $i; ?>" value="<?= $data['id']; ?>">
                    <input type="hidden" name="quantity_<?= $i; ?>" value="<?= $data['qty']; ?>">
                    <input type="hidden" name="amount_<?= $i; ?>" value="<?= $data['Product']['price']; ?>">

                    <?php $i++; } ?>


                    <input type="hidden" name="on0" value="phone">
                    <input type="hidden" name="os0" value="1">
                    <input type="hidden" name="on1" value="password">
                    <input type="hidden" name="os1" value="1">

                    <input type="hidden" name="first_name" value="1">
                    <input type="hidden" name="address1" value="1">
                    <input type="hidden" name="email" value="1">

                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="no_note" value="1">
                    <input type="hidden" name="charset" value="utf-8">
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="notify_url" value="<?= $web.'/cart_check_paypal_pay.php'; ?>">
                    <input type="hidden" name="return" value="<?= $web.'/cart_result.php'; ?>">
                    <input type="hidden" name="cancel_return" value="<?= $web.'/cart_list.php'; ?>">
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
    var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    $('.registeralert').hide();
    var isPass = true;

    var email_check = function(){
        var email = $('#email').val();
        $('#email').next().css({'color':'#a3120a'});
        $('#email').css({'border-bottom':'solid 1px #000'});

        if(! pattern.test( email ) ) {
            isPass = false;
            $('#email').next().html('<i class="fa fa-times-circle"></i>請輸入正確的Email 格式');
            $('#email').next().show();
            $('#email').css({'border-bottom':'solid 2px #a3120a'});
            return false;
        }

        $.get('email_check.php', {email: email}, function(data){
            if(data=='1'){
                isPass = false;
                $('#email').next().html('<i class="fa fa-times-circle"></i>Email 已被註冊過');
                $('#email').next().show();
                $('#email').css({'border-bottom':'solid 2px #a3120a'});
            }else{
                $('#email').next().html('<i class="fa fa-check-circle"></i>Email 驗證成功');
                $('#email').next().css({'color':'#2aa338'});
                $('#email').next().show();
            }
        });
    };

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

    $('#email').on('change', email_check);
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
            
            email_check();
            password_check();
            // console.log(email_check());
            
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
            var email = $('#email').val();
            $.get('email_check.php', {email: email}, function(data){
                if(data!='1'){
                    document.form.submit();
                }
            });

        }

        return false;
    });

</script>