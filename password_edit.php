<?php include('common/_head.php'); 

$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id){

$password = isset($_POST['password']) ? $_POST['password'] : '';

if($id and $password) {

    $dataForgotPassword = Doctrine::getTable('ForgotPassword')->find($id);
    $dataForgotPassword->is_active            = '0';
    $dataForgotPassword->save();

    $dataUser = Doctrine::getTable('User')->find($dataForgotPassword->user_id);
    $dataUser->password              = md5($password);
    $dataUser->save();
    
    echo "<SCRIPT LANGUAGE='javascript'>";
    echo "alert('修改成功');";
    echo "window.location.replace('index.php')";
    echo "</SCRIPT>";
}
?>
<!-- 左邊區塊 -->
<div class="member loginTop logintable">
    <div class="loginvertical">
        <h2>密碼修改</h2>
        <form class="" id="form" name="form" method="post">
            <div class="loginpass">
        <!--        <span>Password</span>-->
                <input class="logininput" type="password"  id="password" name="password" placeholder="Password">
                <p class="loginalert"></p>
            </div>
            <div class="loginpass">
                <input class="inputstyle" type="password"  id="confirmpassword" name="password" maxlength="12" placeholder="Confirm Password">
                <p class="loginalert"></p>
            </div>
            <div class="wrapmsg">
                <div class="msg"></div>
            </div>
            <div class="btn-1">
                <button type="submit" class="btn">送出</button>
            </div>
        </form>
    </div>
</div>
<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
<script>

    //忘記密碼修改密碼
    $('.loginalert').hide();
    $('#form').submit(function(){
        $('.loginalert').hide();
        $('.msg').hide();
        $('.logininput').css({'border-bottom':'solid 2px #000000'});
        var password = $('#password').val(),
            confirmpassword = $('#confirmpassword').val();

        var isPass = true;

        if(password != confirmpassword) {
            isPass = false;
            $('#confirmpassword').next().html('<i class="fa fa-times-circle"></i>密碼和密碼確認欄內容不符');
            $('#confirmpassword').next().show();
            $('#confirmpassword').css({'border-bottom':'solid 2px #a3120a'});
        }

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

