<?php include('common/_head.php'); ?>
<!-- 左邊區塊 -->
<div class="member loginTop logintable">
    <div class="loginvertical userRegister">
        <h2>加入會員?</h2>
        <div class="remindLogin"><a href="javascript:;">會<br>員<br>登<br>入</a></div>
        <p>為了簡化購物流程,您不需要加入會員就可以直接進行購物,請您將商品直接加入購物車,完成訂購後,系統將自動將您升級為會員!</p>
        <div class="btn-1">
            <?php
                if(empty($_SESSION['cart'])){
                    $link = 'product_list.php';
            ?>
            <button class="btn" onclick="javascript:location.href = '<?= $link; ?>'">前往購物</button>
            <?php
                }else{
//                    if($referer==$web.'/cart_list.php'){
                        $link = 'cart_check.php';
//                    }else{
//                        $link = 'cart_list.php';
//                }
            ?>
            <button class="btn" onclick="javascript:location.href = '<?= $link; ?>'">確認結帳</button>
            <?php }?>
            
            
        </div>
    </div>
    <div class="loginvertical userLogin" id="topLogin">
        <h2>會員登入</h2>
        <div class="remindRegister"><a href="javascript:;">加<br>入<br>會<br>員</a></div>
        <form class="" id="form" name="form" method="post">
            <div class="loginmail">
        <!--        <span>E-mail&nbsp&nbsp&nbsp&nbsp</span>-->
                <input class="logininput" type="text" name="email"  id="email" placeholder="E-mail">
                <p class="loginalert">錯誤訊息</p>
            </div>
            <div class="loginpass">
        <!--        <span>Password</span>-->
                <input class="logininput" type="password"  id="password" name="password" placeholder="Password">
                <p class="loginalert">錯誤訊息</p>
            </div>
            <div class="wrapmsg">
                <div class="msg"></div>
            </div>
            <div class="btn-1">
                <button type="submit" class="btn">登入</button>
                <a id="loginBtn" href="javascript:">Facebook登入</a>
            </div>
            <div class="btn-2">     
                <div class="forgot"><a href="javascript:">忘記密碼</a></div>
            </div>
        </form>
    </div>
</div>
<div class="infoBoard">
    <div class="infoContnet">
        <h4>忘記密碼?</h4>
        <form class="" id="form1" name="form1" method="post">
            <div class="forgetrange">
                <input class="logininput" type="text" name="forgot_email"  id="forgot_email" placeholder="E-mail">
                <p class="loginalert">錯誤訊息</p>
            </div>
                <button type="submit" class="btn" style="margin-top: 30px;">送出</button>
        </form>
        <a class="closeBtn" href="javascript:"></a>
        <div class="wrapmsg">
            <div class="msg m1"></div>
        </div>
    </div>
</div>
<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
<script>

    //登入判斷有沒有會員
    $('.loginalert').hide();
    $('.remindLogin a').click(function(){	
        var top = $('#topLogin').offset().top;
        $("html,body").animate({scrollTop:top-50},1000);
        
    });
    $('.remindRegister a').click(function(){	
        $("html,body").animate({scrollTop:0},1000);      
    });

    $('#form').submit(function(){

        $('.loginalert').hide();
        $('.msg').hide();
        $('.logininput').css({'border-bottom':'solid 1px #000000'});
        var email = $('#email').val(),
            password = $('#password').val();

        var isPass = true;

        if(!email) {
            isPass = false;
            $('#email').next().html('<i class="fa fa-times-circle"></i>請輸入Email');
            $('#email').next().show();
            $('#email').css({'border-bottom':'solid 2px #a3120a'});
        }
        if(!password) {
            isPass = false;
            $('#password').next().html('<i class="fa fa-times-circle"></i>請輸入密碼');
            $('#password').next().show();
            $('#password').css({'border-bottom':'solid 2px #a3120a'});
        }

        if(isPass) {
            $.post('login_check.php',{email:email, password:password},
            function(data){
                if(data.success) {
                    if('<?= $referer; ?>'=='<?= $web; ?>/cart_list.php'){
                        location.href = 'cart_check.php';
                    }else if('<?= $referer; ?>'=='<?= $web; ?>/login.php'){
                        location.href = 'index.php';
                    }else{
                        location.href = '<?= $referer; ?>';
                    }
                } else {
                    $('.msg').html('<i class="fa fa-times-circle"></i>'+data.msg);
                    $('.msg').show();
                }
            }, 'json');
        }
        return false;
    });

    //忘記密碼寄驗證信
    $('#form1').submit(function(){

        $('.loginalert').hide();
        $('.m1').hide();
        $('.logininput').css({'border-bottom':'solid 1px #000000'});
        var forgot_email = $('#forgot_email').val();

        var isPass = true;

        if(!forgot_email) {
            isPass = false;
            $('#forgot_email').next().html('<i class="fa fa-times-circle"></i>請輸入Email');
            $('#forgot_email').next().show();
            $('#forgot_email').css({'border-bottom':'solid 2px #a3120a'});
        }

        if(isPass) {
            $('.m1').show();
            $('.m1').html('<i style="font-size: 2rem; color: #333" class="fa fa-spinner fa-spin"></i>');

            setTimeout(function(){
                $.post('password_forgot.php',{forgot_email:forgot_email},
                    function(data){

                        if(data.success) {
                            $('.m1').html('<i class="fa fa-check-circle"></i>'+data.msg);
                            $('.m1').css({'color':'#2aa338'});
                            $('.m1').show();
                        } else {
                            $('.m1').html('<i class="fa fa-times-circle"></i>'+data.msg);
                            $('.m1').show();
                        }
                    }, 'json');
            },1000);


        }
        return false;
    });

    //    FB登入
    function getUserData() {
        FB.api('/me', { locale: 'en_US', fields: 'first_name, last_name, name,  email' }, function(response) {

        var social_id = response.id;
        var email = response.email;
        var name = response.name;

        $.post('login_check.php',{social_id:social_id, email:email, name:name, social:'fb'},
            function(data){
                if('<?= $referer; ?>'=='<?= $web; ?>/cart_list.php'){
                    location.href = 'cart_check.php';
                }else if('<?= $referer; ?>'=='<?= $web; ?>/login.php'){
                    location.href = 'index.php';
                }else{
                    location.href = '<?= $referer; ?>';
                }
            }, 'json');

        });
    }

    window.fbAsyncInit = function() {
        //SDK loaded, initialize it
        FB.init({
            appId      : '396789067112378',
            xfbml      : true,
            version    : 'v2.2'
        });

        //check user session and refresh it
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                //user is authorized
//                getUserData();
            } else {
                //user is not authorized
            }
        });
    };

    //load the JavaScript SDK
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //add event listener to login button
    document.getElementById('loginBtn').addEventListener('click', function() {
        //do the login
        FB.login(function(response) {
            if (response.status === 'connected') {
                //user is authorized
                getUserData();
            }
//            if (response.authResponse) {
//                if(response.status==='connected') {
//                    location.href = 'index.php';
//                }
//                    //user just authorized your app
//                getUserData();
//            }
        }, {scope: 'email,public_profile', return_scopes: true});
    }, false);

    var $loginvertical = $(".loginvertical");
    $loginvertical.hover(function(){
        $(this).toggleClass('userBg');
    });
 
</script>
