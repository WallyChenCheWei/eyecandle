<?php require_once('bootstrap.php'); ?>
<!--Right Coentent-->
<!--Main menu-->
    <div class="menu">
        <a href="index.php"><div class="logo"></div></a>
        <div class="sandwitch">
            <div class="barTop"></div>
            <div class="bar"></div>
            <div class="barBottom"></div>
        </div>
        <div class="block"></div>
<!--Sub menu-->
        <ul class="subMenu">
            <li class="list">
                <a class="btnMain" href="product_list.php">ALL
                    <div class="btnTopLine"></div>
                    <div class="btnRightLine"></div>
                    <div class="btnBottomLine"></div>
                    <div class="btnLeftLine"></div>
                </a>
            </li>
            <?php
            $qType = Doctrine_Query::create()
                ->from('Type')
                ->andwhere("is_active = ?", 1);
            $dataType = $qType->fetchArray();
            foreach ($dataType as $data) {
            ?>
            <li class="list">
                <a class="btnMain" href="product_list.php?type=<?= $data['id'] ?>"><?= $data['name'] ?>
                    <div class="btnTopLine"></div>
                    <div class="btnRightLine"></div>
                    <div class="btnBottomLine"></div>
                    <div class="btnLeftLine"></div>
                </a>
            </li>
            <?php } ?>
            <li class="list">
                <a class="btnMain" href="aboutus.php">About
                    <div class="btnTopLine"></div>
                    <div class="btnRightLine"></div>
                    <div class="btnBottomLine"></div>
                    <div class="btnLeftLine"></div>
                </a>
            </li>
            <li class="list">
                <a class="btnMain" href="eyekitchen.php">Eye kitchen
                    <div class="btnTopLine"></div>
                    <div class="btnRightLine"></div>
                    <div class="btnBottomLine"></div>
                    <div class="btnLeftLine"></div>
                </a>
            </li>
            <li class="list">
                <a class="btnMain" href="exhibition.php">Exhibition
                    <div class="btnTopLine"></div>
                    <div class="btnRightLine"></div>
                    <div class="btnBottomLine"></div>
                    <div class="btnLeftLine"></div>
                </a>
            </li>
        </ul>
        <ul class="social">
            <li><a href="https://www.facebook.com/eyecandle" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="http://www.pinterest.com/eyecandle/eye-candle" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
            <li><a href="https://instagram.com/eyecandletw" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-behance-square"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
        </ul>
    </div>
    <ul class="subMenuUser">
        <div class="alreadyBuy">已將商品加入購物車</div>
        <li class="userBtn">
            <a href="cart_list.php"><i class="fa fa-shopping-cart"></i></a>
        </li>
        <li class="userBtn">
            <a href="wish_list.php"><i class="fa fa-heart-o"></i></a>
        </li>
        <li class="userBtn">
            <a href="user.php" <?php if($user){ echo 'class="UserBtnActive"'; }else{ echo '';} ?>><i class="fa fa-user"></i></a>
        </li>
        <li class="userBtn">
            <a href="logout.php" <?php if(!$user){ echo 'class="menuBtnActive"'; }else{ echo '';} ?>><i class="fa fa-sign-out"></i></a>
        </li>
    </ul>