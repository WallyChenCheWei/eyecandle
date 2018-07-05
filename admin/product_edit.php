<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "product_list";

if(isset($adminaccount)) {

$id = $_GET['id'];

$qProduct = Doctrine_Query::create()
                ->from('Product')
                ->andwhere("id = ?", $id);
$dataProduct = $qProduct->fetchOne();

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>商品修改</h2>
        <form action="product_edit_check.php" method="POST" enctype="multipart/form-data" id="form">
            <table>
                <tr>
                    <td>商品名稱</td>
                    <td><input type="text" name="name" size="50" value="<?php echo $dataProduct['name']; ?>" class="required" /></td>
                </tr>
                <tr>
                    <td>商品類型</td>
                    <td>
                        <select name="type_id" class="required">
                        <?php
                        $qType = Doctrine_Query::create()
                                        ->from('Type')
                                        ->andwhere("is_active = ?", 1);
                        $dataType = $qType->fetchArray();
                        foreach($dataType as $data){
                        ?>
                        <option value="<?php echo $data['id']; ?>"
                        <?php
                        if($data['id']==$dataProduct['type_id']){
                            echo 'selected';
                        }
                        ?>
                        >
                        <?php echo $data['name']; ?></option>
                        <?php } ?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>商品貼紙</td>
                    <td><img src="../pic/<?php echo $dataProduct['cover_sticker']; ?>"><input type="file" name="cover_sticker[]" /></td>
                </tr>
                <tr>
                    <td>商品內頁貼紙</td>
                    <td><img src="../pic/<?php echo $dataProduct['sticker']; ?>"><input type="file" name="sticker[]" class="required"/></td>
                </tr>
                <tr>
                    <td>商品顏色</td>
                    <td id="upload_list" >
                        <?php

                        $qColorPic = Doctrine_Query::create()
                                        ->from('ColorPic')
                                        ->andwhere("product_id = ?", $dataProduct->id)
                                        ->andwhere("is_active = ?", 1);
                        $dataColorPic = $qColorPic->fetchArray();

                        foreach($dataColorPic as $datas) {
                            $qColor = Doctrine_Query::create()
                                            ->from('Color')
                                            ->andwhere("id = ?", $datas['color_id']);
                            $dataColor = $qColor->fetchOne();

                            $colorpic_id[] = $datas['color_id'];
                            echo '<p>'.$dataColor['name'].'<a href="productpic_del.php?id='.$datas['id'].'&type='.$dataProduct->type_id.'&back=product_edit.php?id='.$datas['product_id'].' class="delete" ><i class="fa fa-trash-o del"></i></a></p>';
                            echo '<br><img src="../pic/'.$datas['small_pic'].'">
                            <img src="../pic/'.$datas['big_pic'].'">
                            <br>';
                        }

                        ?>
                    </td>
                </tr>
                <tr id="more" class="more_c">
                    <td></td>
                    <td>
                        <select name="color_id[]" class="required">
                        <?php

                        if($colorpic_id){
                            $sql = 'id NOT IN ('.implode(',', $colorpic_id).')';
                        }else{
                            $sql = "is_active = 1 ";
                        }

                        $qColor = Doctrine_Query::create()
                                        ->from('Color')
                                        ->where($sql)
                                        ->andwhere("is_active = ?", 1);
                        $dataColor = $qColor->fetchArray();

                        foreach($dataColor as $data){
                        ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                        <?php } ?>
                        </select>
                        <input type="file" name="small_pic[]" class="required"/>
                        <input type="file" name="big_pic[]" class="required"/>
                        <a class="upload_more" class="button" href="javascript:">+</a>
                    </td>
                </tr>
                <tr>
                    <td>價錢</td>
                    <td><input type="text" name="price" size="50" value="<?php echo $dataProduct['price']; ?>"  class="required"/></td>
                </tr>
                <tr>
                    <td>重量</td>
                    <td><input type="text" name="weight" size="50" value="<?php echo $dataProduct['weight']; ?>"  class="required"/></td>
                </tr>
                <tr>
                    <td>尺寸</td>
                    <td><input type="text" name="size" size="50"  value="<?php echo $dataProduct['size']; ?>" class="required"/></td>
                </tr>
                <tr>
                    <td>燃燒時間</td>
                    <td><input type="text" name="burning" size="50" value="<?php echo $dataProduct['burning']; ?>"  class="required"/></td>
                </tr>
                <tr>
                    <td>材質</td>
                    <td><input type="text" name="material" size="50" value="<?php echo $dataProduct['material']; ?>"  class="required"/></td>
                </tr>

                <tr>
                    <td>商品說明</td>
                    <td><textarea name="detail" rows="6" cols="50"  class="required"><?php echo strip_tags($dataProduct['detail']); ?></textarea></td>
                </tr>
                <tr>
                    <td>使用方法</td>
                    <td><textarea name="method" rows="6" cols="50"  class="required"><?php echo strip_tags($dataProduct['method']); ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $dataProduct['id']; ?>" />
                        <input type="submit" title="修改" value="修改" class="button" />
                    </td>
                </tr>

            </table>
        </form>
        <p></p>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('.upload_more').click(function() {
            var more = $('#more').clone();
            more.find('.upload_more').css({'display':'none'});
            $('.more_c').last().after(more);
        });

    });
</script>
</body>
</html>
<?php 
} else {
    header('location:index_logout.php');
    exit();
} 
?>
