<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "product_list";

if(isset($adminaccount)) {
    
    $id = $_GET['id'];
    $qProduct = Doctrine_Query::create()
                ->from('Product')
                ->addwhere("id = ?", $id)
                ->addwhere("is_active = ?", 1);
    $dataProduct = $qProduct->fetchOne();
    
    $qType = Doctrine_Query::create()
                ->from('Type')
                ->addwhere('id=?',$dataProduct->type_id)
                ->addwhere("is_active = ?", 1);
    $dataType = $qType->fetchOne();
    
    $qColorPic = Doctrine_Query::create()
                ->from('ColorPic')
                ->addwhere('product_id=?',$dataProduct->id)
                ->addwhere("is_active = ?", 1);
    $dataColorPic = $qColorPic->fetchArray();

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>商品介紹</h2>
        <h3><a href="javascript:;" onclick="history.back()" class="btn">上一頁</a></h3>
        <table>
            <tr>
                <td style="width: 150px;">商品名稱</td>
                <td><?php echo $dataProduct['name']; ?></td>
            </tr>
            <tr>
                <td>商品類型</td>
                <td><?php echo $dataType['name']; ?></td>
            </tr>
            <tr>
                <td>商品貼紙</td>
                <td><img src="../pic/<?php echo $dataProduct['cover_sticker']; ?>"></td>
            </tr>
            <tr>
                <td>商品內頁貼紙</td>
                <td><img src="../pic/<?php echo $dataProduct['sticker']; ?>"></td>
            </tr>
            <?php foreach($dataColorPic as $data) { 
                $qColor = Doctrine_Query::create()
                            ->from('Color')
                            ->addwhere('id=?',$data['color_id'])
                            ->addwhere("is_active = ?", 1);
                $dataColor = $qColor->fetchOne();
            ?>
            <tr>
                <td><div style="background: <?php echo '#'.$dataColor['color_code']; ?>" class="color"></div>
                    <a href="productpic_del.php?id=<?php echo $data['id']; ?>&type=<?php echo $dataProduct->type_id; ?>&back=product_detail.php?id=<?php echo $id; ?>" class="delete" ><i class="fa fa-trash-o del"></i></a>
                </td>
                <td>
                    <img src="../pic/<?php echo $data['small_pic']; ?>">
                    <img src="../pic/<?php echo $data['big_pic']; ?>">
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td>價錢</td>
                <td><?php echo $dataProduct['price']; ?></td>
            </tr>
            <tr>
                <td>重量</td>
                <td><?php echo $dataProduct['weight']; ?></td>
            </tr>
            <tr>
                <td>尺寸</td>
                <td><?php echo $dataProduct['size']; ?></td>
            </tr>
            <tr>
                <td>燃燒時間</td>
                <td><?php echo $dataProduct['burning']; ?></td>
            </tr>
            <tr>
                <td>材質</td>
                <td><?php echo $dataProduct['material']; ?></td>
            </tr>
            <tr>
                <td>商品說明</td>
                <td><?php echo $dataProduct['detail']; ?></td>
            </tr>
            <tr>
                <td>使用方法</td>
                <td><?php echo $dataProduct['method']; ?></td>
            </tr>
        </table>
    </div>
</div
</body>
</html>
<?php 
} else {
    header('location:index_logout.php');
    exit();
} 
?>
