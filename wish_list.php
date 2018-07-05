<?php
include('common/_head.php');

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
<link rel="stylesheet" href="css/wishSVG.css">
    <!-- 左邊區塊 -->
<?php if(! empty($ids)) { ?>
<div class="newcontentL">
    <h2 class="newtopL">Wish List</h2>
    <div class="outerFrame"></div>
    <div class="newbottomL sliderBar">
        <ul class="newmerchandise">
            <?php foreach ($wish_list as $data) {
                if(isset($user)) {
                    $p_id = $data['product_id'];
                    $p_name = $data['Product']['name'];
                    $p_price = $data['Product']['price'];
                    $cover_sticker = $data['Product']['cover_sticker'];
                }else{
                    $p_id = $data['id'];
                    $p_name = $data['name'];
                    $p_price = $data['price'];
                    $cover_sticker = $data['cover_sticker'];
                }
                $qColorPic = Doctrine_Query::create()
                    ->from('ColorPic')
                    ->andwhere("product_id = ?", $p_id)
                    ->andwhere("is_cover = ?", 1);
                $dataColorPic = $qColorPic->fetchOne();

                ?>
            <li><a href="product.php?id=<?= $p_id ;?>"><img src="<?= 'pic/' . $dataColorPic['small_pic']; ?>" alt=""></a>
                <div class="wish_link"><a data-id="<?= $p_id ;?>" class="wishList" href="javascript:;">
                        <i class="fa fa-heart"></i></a>
                </div>
                <div class="NT">$500</div>
                <div class="newmerchandisesub">
                    <div class="sss"><img src="<?= 'pic/' . $cover_sticker; ?>" alt=""></div>
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
<?php }else{ ?>
    <div class="contentL shop  verticaltable">
        <div class="vertical">
            <div class="goshoppcar"><img src="images/wish_icon.jpg" alt=""></div>
            <div class="shoppingtext">
                <h1>YOU HAVE NO ITEMS IN WISH LIST</h1>
            </div>
            <div class="shoppingtext2">
                <p>目前沒有商品在收藏清單中，請點擊下方按鈕查看所有商品</p>
            </div>
            <div class="goshoppingbtn">
                <a href="product_list.php">前往購物</a>
            </div>
        </div>
    </div>
<?php } ?>
    <!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
    <!-- JS -->
<?php include('common/_footer.php'); ?>
<script src="./js/bgMove.js"></script>