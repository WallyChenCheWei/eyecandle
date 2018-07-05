<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "product_list";

if(isset($adminaccount)) {

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>商品新增</h2>
        <form action="product_add_check.php" method="POST" enctype="multipart/form-data" id="form">
            <table>
                <tr>
                    <td>商品名稱</td>
                    <td><input type="text" name="name" size="50" class="required name" /><span class="alert"></span></td>
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
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                        <?php } ?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>商品貼紙</td>
                    <td><input type="file" name="cover_sticker[]" /></td>
                </tr>
                <tr>
                    <td>商品內頁貼紙</td>
                    <td><input type="file" name="sticker[]" /></td>
                </tr>
                <tr id="more" class="more_c">
                    <td>商品顏色</td>
                    <td id="upload_list">
                        <select name="color_id[]" class="required">
                        <?php
                        $qColor = Doctrine_Query::create()
                                        ->from('Color')
                                        ->andwhere("is_active = ?", 1);
                        $dataColor = $qColor->fetchArray();
                        //                                      $jsoncolor = json_encode($dataColor);
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
                    <td><input type="text" name="price" size="50" class="required price"/><span class="alert"></span></td>
                </tr>
                <tr>
                    <td>重量</td>
                    <td><input type="text" name="weight" size="50" class="required weight"/><span class="alert"></span></td>
                </tr>
                <tr>
                    <td>尺寸</td>
                    <td><input type="text" name="size" size="50" class="required size"/><span class="alert"></span></td>
                </tr>
                <tr>
                    <td>燃燒時間</td>
                    <td><input type="text" name="burning" size="50" class="required burning"/><span class="alert"></span></td>
                </tr>
                <tr>
                    <td>材質</td>
                    <td><input type="text" name="material" size="50" class="required material"/><span class="alert"></span></td>
                </tr>

                <tr>
                    <td>商品說明</td>
                    <td><textarea name="detail" rows="6" cols="50" class="required detail"></textarea><span class="alert"></span></td>
                </tr>
                <tr>
                    <td>使用方法</td>
                    <td><textarea name="method" rows="6" cols="50" class="required method"></textarea><span class="alert"></span></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" title="新增" value="新增" class="button" /></td>
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
            more.find('td').first().text('');
            $('.more_c').last().after(more);

        });

//        $('.required').blur(function(){
//            if($(this).val().length <= 0) {
//                $(this).next().html('必填');
//                $(this).next().show();
//            }else{
//                $(this).next().hide();
//            }
//        });


        $('#form').submit(function(){
//            $('.alert').hide();
//
//            var name = $('.required');
//
//            $('.required').each( function(){
//                if($(this).val().length <= 0) {
//                    console.log($(this).val());
//                    $(this).next().html('必填');
//                    $(this).next().show();
//                }
//            });
//
//
//            return false;
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
