<?php include('common/_head.php');
if($user) {
?>
    <!-- 左邊區塊 -->
    <div class="contentL shop  verticaltable">
        <div class="vertical">
            <div class="goshoppcar"><img src="images/member_icon.png" alt=""></div>
            <div class="shoppingtext">
                <h1>WELCOME BACK</h1>
            </div>
            <div class="shoppingtext2">
                <p>請選擇下方按鈕</p>
            </div>
            <div class="goshoppingbtn">
                <a href="user_edit.php">修改資訊</a>
            </div>
            <div class="goshoppingbtn welcomeBackbtn">
                <a href="order_list.php">購物紀錄</a>
            </div>
        </div>
    </div>
    <!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
    <!-- JS -->
<?php include('common/_footer.php'); ?>
<?php
} else {
    header('location:login.php');
    exit();
}
?>

