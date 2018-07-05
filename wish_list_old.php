<?php include('common/_head.php');

$wish_list = array();

if(isset($_SESSION['wishlist'])){
    $ids = array_keys($_SESSION['wishlist']);

    if(! empty($ids)) {
        $qProduct = Doctrine_Query::create()
                    ->from('Product')
                    ->andwhere("is_active = ?", 1)
                    ->whereIn('id', $ids)
                    ->orderby( 'id DESC' );
        $dataProduct = $qProduct->fetchArray();
        $countProduct = $qProduct->Count();



        foreach ($dataProduct as $data){
            $wish_list[$data['id']] = $data;
        }
    }
}
if(isset($user)) {
    $qCollect = Doctrine_Query::create()
        ->from('Collect c')
        ->innerJoin('c.Product p ON p.id = c.product_id')
        ->addWhere('user_id = ?', $user)
        ->addwhere("is_active = ?", 1)
        ->orderby( 'updated_at DESC' );
    $wish_list = $qCollect->fetchArray();
    $countCollect = $qCollect->Count();
}
?>
<!-- 左邊區塊 -->
<?php if(! empty($ids)) { ?>
<div class="contentL">
    <div class="topL">
        <img src="images/wishlist.jpg" alt="">
        <div class="topLtext">
            <h1>Wish List</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores nihil deleniti, ducimus labore ex fuga provident atque perspiciatis, vel, dignissimos
                nulla vero unde accusamus maxime aliquid quas officia quibusdam enim.
            </p>
        </div>
    </div>
    <div class="bottomL">
        <ul class="merchandise">
            <?php foreach ($wish_list as $data) {
            if(isset($user)) {
                $p_id = $data['product_id'];
                $p_name = $data['Product']['name'];
                $p_price = $data['Product']['price'];
            }else{
                $p_id = $data['id'];
                $p_name = $data['name'];
                $p_price = $data['price'];
            }
            $qColorPic = Doctrine_Query::create()
                        ->from('ColorPic')
                        ->andwhere("product_id = ?", $p_id)
                        ->andwhere("is_cover = ?", 1);
            $dataColorPic = $qColorPic->fetchOne();

            ?>
            <li><a href="product.php?id=<?= $p_id ;?>"><img src="<?= 'pic/'.$dataColorPic['small_pic'] ;?>" alt=""></a>
                <ul class="merchandiseSub">
                    <li><a data-id="<?= $p_id ;?>" class="wishList" href="javascript:;"><i class="fa fa-heart"></i></a></li>
                    <li><a href="javascript:;"><i class="fa fa-shopping-cart" data-ori="fa-shopping-cart" data-change="fa-angle-double-right"></i></a></li>
                    <li><h3><?= $p_name ;?></h3></li>
                    <li><?= $p_price ;?> NT</li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php }else{ ?>
<div class="contentL shop">
    <div class="vertical">
        <div class="goshoppcar"><img src="images/wish_icon.jpg" alt=""></div>
        <div class="shoppingtext">
            <h1>YOU HAVE NO ITEMS IN WISH LIST</h1>
        </div>
        <div class="shoppingtext2">
            <h2>CKICK OR TAB THE BUTTON BELOW TO START SHOPPING</h2>
        </div>
        <div class="goshoppingbtn">
            <a href="product_list.php">LET’S GO SHOPPING</a>
        </div>
    </div>
</div>
<?php } ?>
    <!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
    <!-- JS -->
<?php include('common/_footer.php'); ?>


