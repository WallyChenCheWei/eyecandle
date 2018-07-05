<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');

if(isset($adminaccount)) {

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>修改密碼</h2>
        <form action="admin_passedit_check.php" method="post" id="form">
            <table>
                <tr>
                    <td>舊密碼</td>
                    <td><input id="oldpassword" type="password" name="oldpassword" /></td>
                </tr>
                <tr>
                    <td>新密碼</td>
                    <td><input id="password" type="password" name="password" /></td>
                </tr>
                <tr>
                    <td>確認新密碼</td>
                    <td><input id="password2" type="password" name="password2" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="儲存" /></td>
                </tr>
            </table>
	    </form>
    </div>
</div>
</body>
</html>
<?php 
} else {
    header('location:index_logout.php');
    exit();
} 
?>
