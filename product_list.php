<?php
include('common/_head.php');

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $sql = 'type_id = ' . $_GET['type'];

    $qType = Doctrine_Query::create()
        ->from('Type')
        ->andwhere("id = ?", $type);
    $dataType = $qType->fetchOne();
    $type_name = $dataType->name;
    $banner = $dataType->banner;
} else {
    $type = '0';
    $type_name = 'All';
    $banner = 'all.jpg';
    $sql = 'is_active = 1';
}

$qProduct = Doctrine_Query::create()
    ->from('Product')
    ->andwhere("is_active = ?", 1)
    ->andwhere($sql)
//        ->orderby('RAND()')
    ->orderby('is_soldout ASC');
$dataProduct = $qProduct->fetchArray();
$countProduct = $qProduct->Count();

if (isset($_SESSION['wishlist'])) {
    $ids = array_keys($_SESSION['wishlist']);
}else{
    $ids = array();
}
?>
    <!-- 左邊區塊 -->
<div class="newcontentL">
    <h2 class="newtopL">Product Series / <?= $type_name; ?></h2>
    <div class="outerFrame"></div>
    <div class="newbottomL sliderBar">
        <ul class="newmerchandise">
            <?php
            foreach ($dataProduct as $data) {
            $qColorPic = Doctrine_Query::create()
                ->from('ColorPic')
                ->andwhere("product_id = ?", $data['id'])
                ->andwhere("is_cover = ?", 1);
            $dataColorPic = $qColorPic->fetchOne();
            ?>
            <li><a href="product.php?id=<?= $data['id']; ?>"><img src="<?= 'pic/' . $dataColorPic['small_pic']; ?>" alt=""></a>
                <div class="wish_link">
                    <a data-id="<?= $data['id']; ?>" class="wishList" href="javascript:;">
                        <?php
                        $status = 'fa-heart-o';
                        foreach ($ids as $id) {
                            if ($id==$data['id']){
                                $status = 'fa-heart';
                                break;
                            }
                        }
                        ?>
                        <i class="fa <?php echo $status; ?>"></i>
                    </a>
                </div>
                <div class="NT">$ <?= $data['price']; ?></div>
                <div class="newmerchandisesub">
                    <div class="sss"><img src="<?= 'pic/' . $data['cover_sticker']; ?>" alt=""></div>
                </div>
                <div class="imgtopline"></div>
                <div class="imgbottomlone"></div>
                <div class="imgleftline"></div>
                <div class="imgrightline"></div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
    <!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
    <!-- JS -->
<?php include('common/_footer.php'); ?>
<script src="./js/bgMove.js"></script>
