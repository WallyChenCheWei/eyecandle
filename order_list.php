<?php include('common/_head.php'); 

if($user) {

    $qCart = Doctrine_Query::create()
                ->from('Cart')
                ->andwhere("is_active = ?", 1)       
                ->andwhere("user_id = ?", $user)
                ->orderby( 'id DESC' );
    $dataCart = $qCart->fetchArray();
    $countCart = $qCart->Count();

?>

<style>
*{
        margin: 0;
        padding: 0;
        text-decoration:none;
        list-style-type:none;
        box-sizing:border-box;
}

.left{
        width:100%;
        height:100%;
        padding:5% 0;
        margin: auto;
}

.orderID{
        margin:20px 0 5px 5%;
        width: 80%;
        line-height: 30px;
}
.mainForm{
        position: relative;
        width: 90%;
        min-width:535px;
        margin: auto;
}
.r1{
        width: 100%;
        height: 30px;
        border-top:solid 5px #000;
        font-size:0;
}
.r1c1{
        width: 50%;
        height:100%;
        border-left:solid 1px #000;
        border-right:solid 1px #000;
        display:inline-block;
}
.r1c2{
        width: 25%;
        height:100%;
        border-right:solid 1px #000;
        display:inline-block;
}
.r1c3{
        width: 15%;
        height: 100%;
        border-right:solid 1px #000;
        display:inline-block;
}
.r1c4{
        width: 10%;
        height: 100%;
        border-right:solid 1px #000;
        display:inline-block;
}
.r2{
        font-size:0;
        height: 36px;
}
.r2c1{
        width: 50%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:200%;
        border-bottom:solid 1px #000;
}
.r2c2{
        width: 25%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:200%;
        border-bottom:solid 1px #000;
}
.r2c3{
        width: 15%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:200%;
        border-bottom:solid 1px #000;
}
.r2c4{
        width: 10%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:200%;
        border-bottom:solid 1px #000;
}
.r3{
        font-size:0;
        width: 100%;
        height:auto;
        border-bottom:solid 1px #000;
        padding:6px 0 6px 0;

}
.r3c1{
        width: 12%;
        height:auto;
        min-height:50px;
        display:inline-block;
}
.r3c1 > img{
        width: 86%;
        height: auto;
        vertical-align:middle;
}
.buyInfo{
        display:inline-block;
        width: 88%;
        padding-left:6%;
}
.r3c2{
        width: 38%;
        height:auto;
        display:inline-block;
        font-size: 1.5rem;
        vertical-align:middle;
}
.r3c3{
        width: 31.5%;
        height:auto;
        display:inline-block;
        font-size:0;
        vertical-align:middle;
}
.plus{
        width: 31px;
        height: 31px;
        display:inline-block;
        vertical-align:middle;
}
.minus{
        width: 31px;
        height: 31px;
        vertical-align:middle;
        display:inline-block;
}
.Qt{
        font-size: 16px;
        display:inline-block;
        margin:0 10% 0 10%;
        vertical-align:middle;
}
.r3c4{
        width: 17%;
        height:auto;
        display:inline-block;
        font-size:16px;
        vertical-align:middle;
}
.r3c5{
        width: 10%;
        height:auto;
        display:inline-block;
        vertical-align:middle;
}
.infoBtn2{
        width: 31px;
        height: 31px;
        vertical-align:middle;
        display:inline-block;
}
.r4{
        margin-top:10px;
        font-size:0;
        height: 36px;
}
.r4c1{
        width: 75%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:200%;
}
.r4c2{
        width: 25%;
        height:100%;
        display:inline-block;
        font-size:16px;
        line-height:200%;
}
.r5{
        width: 100%;
        height: 30px;
        border-bottom:solid 5px #000;
        font-size:0;
}
.r5c1{
        width: 75%;
        height:100%;
        border-left:solid 1px #000;
        border-right:solid 1px #000;
        display:inline-block;
}
.r5c2{
        width: 25%;
        height: 100%;
        border-right:solid 1px #000;
        display:inline-block;
}
.btns{
        width: 90%;
        height: 75px;
        margin: 1% auto;
        font-size:0;
        min-width:535px;
}
.prevBtn{
        width: 100%;
        height: 75px;
        display:inline-block;
        text-align:center;
        line-height: 75px;
        font-size: 1.5rem;
        color: rgba(0,0,0,1);
        position: relative;
        transition: all .6s;
        box-sizing: border-box;
}
.prevBtn:after{
        content: '';
        width: 100%;
        height: inherit;
        border:solid 1px #000;
        position: absolute;
        left: 0;
        top: 0;
        transform: scale3d(1, 1, 1);
        transition: all .6s;
}
.prevBtn:hover{
        background-color: rgba(0,0,0,0.8);
        color: #fff;
}
.prevBtn:hover:after{
        opacity: 0;
        transform: scale3d(.8, .8, 1);
}
.left h2{
        font-size: 2.5rem;
        padding: 0 0 0 5%;
        font-family: 'cwTeXHei', 微軟正黑體 ;
}


/*---------------------mobile----------------------*/
@media screen and (max-width: 750px){
*{
        margin: 0;
        padding: 0;
        text-decoration:none;
        list-style-type:none;
        box-sizing:border-box;
}
.left{
        padding-bottom:16%;
}
.left h2{
        font-size: 2rem;
}
.orderID{
        margin:30px 0 5px 5%;
        width: 90%;
        font-size:0;
}
.orderID p{
        display:inline-block;
        width: 70%;
        font-size:16px;
}
.orderID .date{
        display:inline-block;
        width: 30%;
        font-size:16px;
        text-align:right;
}
.mainForm{
        position: relative;
        width: 90%;
        min-width:90%;
        margin: auto;
}
.r1{
        width: 100%;
        height: 7px;
        border-top:solid 3px #000;
        border-bottom:solid 1px #000;
        font-size:0;
}
.r1c1{
        width: 26%;
        height:5px;
        border-left:solid 0px #000;
        border-right:solid 0px #000;
}
.r1c2{
        width: 0%;
        height:0%;
        border-right:solid 0px #000;
}
.r1c3{
        width: 0%;
        height: 0%;
        border-right:solid 0px #000;

}
.r1c4{
        width: 74%;
        height: 5px;
        border-right:solid 0px #000;
}
.r2{
        font-size:0;
        height: 0px;
}
.r2c1{
        width: 0%;
        height:0%;
        display:inline-block;
        font-size:0;
        line-height:200%;
        border-bottom:solid 0px #000;
}
.r2c2{
        width: 0%;
        height:0%;
        display:inline-block;
        font-size:0;
        line-height:200%;
        border-bottom:solid 0px #000;
}
.r2c3{
        width: 0%;
        height:0%;
        display:inline-block;
        font-size:0;
        line-height:200%;
        border-bottom:solid 0px #000;
}
.r2c4{
        width: 0%;
        height:0%;
        display:inline-block;
        font-size:0;
        line-height:200%;
        border-bottom:solid 0px #000;
}
.r3{
        font-size:0;
        width: 100%;
        height:auto;
        border-bottom:solid 1px #000;
        padding:6px 0 6px 0;

}
.r3c1{
        width: 30%;
        height:auto;
        min-height:50px;
        display:inline-block;
}
.r3c1 > img{
        width: 86%;
        height: auto;
        vertical-align:middle;
}
.buyInfo{
        display:inline-block;
        width: 70%;
        padding-right:0%;
        vertical-align:middle;
}
.r3c2{
        width: 100%;
        height: 1.5rem;
        display:inline-block;
        padding-left:0;
        margin-top:5%;
        margin-bottom:10%;
        font-size: 25px;
        vertical-align:top;
}
.r3c3{
        width: 44%;
        height:auto;
        display:inline-block;
        font-size:0;
        vertical-align:top;
}
.plus{
        width: 31px;
        height: 31px;
        display:inline-block;
        vertical-align:middle;
}
.minus{
        width: 31px;
        height: 31px;
        vertical-align:middle;
        display:inline-block;
}
.Qt{
        font-size: 16px;
        display:inline-block;
        margin:0 10% 0 10%;
        vertical-align:middle;
}
.r3c4{
        width: 26%;
        height:auto;
        display:inline-block;
        font-size:16px;
        vertical-align:middle;
}
.r3c5{
        width: 31px;
        height:auto;
        display:inline-block;
        vertical-align:middle;
}
.r4{
        margin-top:0px;
        font-size:0;
        height: 36px;
}
.r4c1{
        padding:0;
        width: 70%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:30px;
}
.r4c2{
        padding:0;
        width: 30%;
        height:100%;
        display:inline-block;
        font-size:16px;
        line-height:30px;
        text-align:right;
}
.r5{
        width: 100%;
        height: 7px;
        border-bottom:solid 3px #000;
        border-top:solid 1px #000;
        font-size:0;
}
.r5c1{
        width: 88%;
        height:7px;
        border-left:solid 0px #000;
        border-right:solid 0px #000;
}
.r5c2{
        width: 0%;
        height: 0%;
        border-right:solid 0px #000;

}
.btns{
        width: 100%;
        height: 120px;
        margin-top:0;
        font-size:0;
        min-width:100%;
        margin-bottom:15px;
}
.prevBtn{
        width: 90%;
        height: 45px;
        display:inline-block;
        text-align:center;
        line-height:45px;
        font-size: 1rem;
        border:transparent;
        margin: 3% 5% 0 5%;
}

/*--------------infoBoard---------------------*/
        .infoContnet{
                width: 100%;
                height: 100%;
        }
}

</style>

<div class="contentL">
<div class="left sliderBar">
<h2>購物紀錄</h2>
<?php foreach ($dataCart as $datac) {
        
    $qCartList = Doctrine_Query::create()
                ->from('CartList cl')
                ->innerJoin('cl.Product p ON p.id = cl.product_id')
                ->innerJoin('cl.Color co ON co.id = cl.color_id')
                ->andwhere("cart_id = ?", $datac['id'])
                ->andwhere("is_active = ?", 1);
    $dataCartList = $qCartList->fetchArray(); 
?>
    
<!-- 歷史訂單編號 日期 -->
    <div class="orderID">
        <p>訂單編號 <?= $datac['order_name'] ?></p>
        <div class="date"><?= date("Y/m/d H:i",strtotime($datac['created_at'])) ?></div>
    </div>
<!-- 主表格內容 -->
    <div class="mainForm">
        <div class="r1">
            <div class="r1c1"></div>
            <div class="r1c2"></div>
            <div class="r1c3"></div>
            <div class="r1c4"></div>
        </div>
        <div class="r2">
            <div class="r2c1">商品</div>
            <div class="r2c2">數量</div>
            <div class="r2c3">價格</div>
            <div class="r2c4">資訊</div>
        </div>
        <div class="infoBoard">
            <div class="infoContnet">
                <h4>訂購資訊</h4>
                <table>
                    <tr>
                        <td>姓名</td>
                        <td><?= $datac['name'] ?></td>
                    </tr>
                    <tr>
                        <td>電話</td>
                        <td><?= $datac['tel'] ?></td>
                    </tr>
                    <tr>
                        <td>地址</td>
                        <td><?= $datac['address'] ?></td>
                    </tr>
                    <tr>
                        <td>付款資訊</td>
                        <td>
                        <?php

                        if($datac['status']=='paid'){
                                $status = '確認付款';
                        }else if($datac['status']=='send'){
                                $status = '已出貨';
                        }
                        echo $status; ?>

                        </td>
                    </tr>
                </table>
                <a style="top: 60px" class="closeBtn" href="javascript:"></a>
            </div>
        </div>
<!-- 商品資訊 -->
        <?php $i=0; foreach ($dataCartList as $data) {



            $qColorPic = Doctrine_Query::create()
                        ->from('ColorPic')
                        ->andwhere("product_id = ?", $data['product_id'])
                        ->andwhere("color_id = ?", $data['color_id'])
                        ->andwhere("is_active = ?", 1);
            $dataColorPic = $qColorPic->fetchOne();  

        ?>
        <div class="r3">
            <div class="r3c1">
            <img src="pic/<?= $dataColorPic['small_pic']; ?>" alt="" align="middle">
            </div><!--照片-->
            <div class="buyInfo">
                <div class="r3c2"><p><a href="product.php?id=<?= $dataColorPic['product_id']; ?>"><?= $data['Product']['name'] ?></a></p></div><!-- 品名 -->
            <div class="r3c3">
                    <div class="plus"></div>
                    <div class="Qt"><?= $data['num'] ?></div><!-- 數量 -->
                    <div class="minus"></div>
            </div>
            <div class="r3c4">NT <?= $data['total'] ?></div><!-- 單品金額 -->
            <?php if($i==0){ ?>
            <div class="r3c5">
                    <a href="javascript:" class="infoBtn2"><img src="images/infoBtn.png" alt=""></a>
            </div>
            <?php } ?>
            </div>

        </div>
        <?php $i++; }  ?>
<!-- 總計金額 -->
        <div class="r4">
                <div class="r4c1">總價</div>
                <div class="r4c2">NT <?= $datac['total'] ?></div>
        </div>
        <div class="r5">
                <div class="r5c1"></div>
                <div class="r5c2"></div>
        </div>
    </div>
<?php }?>
<!-- 下方按鈕列 -->
    <div class="btns">
        <a href="product_list.php" class="prevBtn">繼續購物</a>
    </div>
</div>
</div>
    <!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
    <!-- JS -->
<?php include('common/_footer.php'); ?>
<?php 
} else {
    header('location:login.php');
    exit();
} 
?>
