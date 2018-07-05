<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "color_list";

if(isset($adminaccount)) {

    $id = $_GET['id'];

    $qColor = Doctrine_Query::create()
                    ->from('Color')
                    ->andwhere("id = ?", $id);
    $dataColor = $qColor->fetchOne();

    $color_name = isset($_POST['color_name']);

    if(isset($_POST['id'])){

        $dataColor = Doctrine::getTable('Color')->find($_POST['id']);
        $dataColor->name                 = $_POST['color_name'];
        $dataColor->smell                = $_POST['smell'];
        $dataColor->color_code           = $_POST['color_code'];
        $dataColor->save();

        echo "<SCRIPT LANGUAGE='javascript'>";
        echo "alert('修改成功');";
        echo "window.location.replace('color_list.php')";
        echo "</SCRIPT>";
    }

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>商品顏色修改</h2>
        <form method="POST" id="form">
            <table>
                <tr>
                    <td>顏色</td>
                    <td>
                        <input type="text" name="color_name" size="50" value="<?php echo $dataColor['name']; ?>" class="required" />
                    </td>
                </tr>
                <tr>
                    <td>味道</td>
                    <td>
                        <input type="text" name="smell" size="50" value="<?php echo $dataColor['smell']; ?>" class="required" />
                    </td>
                </tr>
                <tr>
                    <td>色碼</td>
                    <td>
                        <input type="text" name="color_code" size="50" value="<?php echo $dataColor['color_code']; ?>" class="required" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="hidden" name="id" value="<?php echo $dataColor['id']; ?>" /><input type="submit" title="修改" value="修改" class="button"/></td>
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
