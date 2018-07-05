<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "color_list";

if(isset($adminaccount)) {
    $color_name = isset($_POST['color_name']);

    if($color_name){

        $dataColor = new Color();
        $dataColor->name                 = $_POST['color_name'];
        $dataColor->smell                = $_POST['smell'];
        $dataColor->color_code           = $_POST['color_code'];
        $dataColor->save();

        echo "<SCRIPT LANGUAGE='javascript'>";
        echo "alert('新增成功');";
        echo "window.location.replace('color_list.php')";
        echo "</SCRIPT>";
    }

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>商品顏色新增</h2>
        <form method="POST" enctype="multipart/form-data" id="form">
            <table>
                <tr>
                    <td>顏色</td>
                    <td>
                        <input type="text" name="color_name" size="50" class="required" />
                    </td>
                </tr>
                <tr>
                    <td>味道</td>
                    <td>
                        <input type="text" name="smell" size="50" class="required" />
                    </td>
                </tr>
                <tr>
                    <td>色碼</td>
                    <td>
                        <input type="text" name="color_code" size="50" class="required" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" title="新增" value="新增" class="button"/></td>
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
