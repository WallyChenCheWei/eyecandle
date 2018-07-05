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
<div class="contentL">
    <div class="topL">
        <img src="images/<?= $banner; ?>" alt="">
        <div class="topLtext">
            <h1><?= $type_name; ?></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores nihil deleniti, ducimus labore ex fuga provident atque perspiciatis, vel, dignissimos
                nulla vero unde accusamus maxime aliquid quas officia quibusdam enim.
            </p>
        </div>
    </div>
    <div class="bottomL sliderBar">
        <ul class="merchandise">
            <?php
            foreach ($dataProduct as $data) {
                $qColorPic = Doctrine_Query::create()
                        ->from('ColorPic')
                        ->andwhere("product_id = ?", $data['id'])
                        ->andwhere("is_cover = ?", 1);
                $dataColorPic = $qColorPic->fetchOne();
                ?>
                <li><a href="product.php?id=<?= $data['id']; ?>"><img src="<?= 'pic/' . $dataColorPic['small_pic']; ?>" alt=""></a>
                    <ul class="merchandiseSub">
                        <li><a data-id="<?= $data['id']; ?>" class="wishList" href="javascript:;">
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
                            </a></li>
                        <li><a href="javascript:;"><i class="fa fa-shopping-cart" ></i></a></li>
                        <li><h3><?= $data['name']; ?></h3></li>
                        <li><?= $data['price']; ?> NT</li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>



