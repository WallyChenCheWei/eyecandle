<!-- 右邊區塊 -->
<div class="contentR">
    <!-- 主選單 -->
    <div class="menuR">
        <a href="index.php"><div class="logo"></div></a>
        <ul>
            <li data-menu="menu" data-status="0"><a href="#">
                    <i class="fa fa-bars" data-ori="fa-bars" data-change="fa-angle-double-right"></i></a>
            </li>
            <li data-menu="like" data-status="0"><a href="wish_list.php">
                    <i class="fa fa-heart-o" data-ori="fa-heart-o" data-change="fa-angle-double-right"></i></a>
            </li>
            <li data-menu="cart" data-status="0"><a href="cart_list.php">
                    <i class="fa fa-shopping-cart" data-ori="fa-shopping-cart" data-change="fa-angle-double-right"></i></a>
            </li>
            <li data-menu="search" data-status="0"><a href="#">
                    <i class="fa fa-search" data-ori="fa-search" data-change="fa-angle-double-right"></i></a>
            </li>
            <li data-menu="" data-status="0"><a href="order_list.php">
                    <i class="fa fa-user" data-ori="fa-search" data-change="fa-angle-double-right"></i></a>
            </li>
            <?php if(isset($user)){ ?>
            <li data-menu="" data-status="0"><a href="logout.php">
                    <i class="fa fa-sign-out" data-ori="fa-search" data-change="fa-angle-double-right"></i></a>
            </li>
            <?php } ?>
        </ul>
        <ul class="social">
            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>
    <!-- 次選單Menu-->
    <div class="menuSub menu">
        <ul>
            <li><a href="#">商品</a>
                <ul>
                    <li><a href="product_list.php">All</a></li>
                    <?php 
                    $qType = Doctrine_Query::create()
                                ->from('Type')
                                ->andwhere("is_active = ?", 1);
                    $dataType = $qType->fetchArray();
                    foreach ($dataType as $data) {
                    ?>
                    <li><a href="product_list.php?type=<?= $data['id'] ?>"><?= $data['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="content.php">關於我們</a></li>
            <li><a href="#">活動</a>
                <ul>
                    <li><a href="eyekitchen.php">Eye Kitchen</a></li>
                    <li><a href="exhibition.php">展覽</a></li>
                </ul>

            </li>
            <li><a href="#">會員</a>
                <ul>
                    <li><a href="#">修改資料</a></li>
                    <li><a href="order_list.php">訂單查詢</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- 次選單Like-->
<!--    <div class="menuSub like">

    </div>-->
    <!-- 次選單Cart-->
<!--    <div class="menuSub cart">

    </div>-->
    <!-- 次選單Search-->
<!--    <div class="menuSub search">

    </div>-->
</div>