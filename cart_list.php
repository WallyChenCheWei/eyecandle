<?php include('common/_head.php');

$cart_list = array();
$colorpic_list = array();

if(isset($_SESSION['cart'])){
    $ids = array_keys($_SESSION['cart']);

    if(! empty($ids)) {

        $qColorPic = Doctrine_Query::create()
            ->from('ColorPic cp')
            ->innerJoin('cp.Product p ON p.id = cp.product_id')
            ->andwhere("is_active = ?", 1)
            ->whereIn('id', $ids);
        $dataColorPic = $qColorPic->fetchArray();

        foreach ($dataColorPic as $data){
            $data['qty'] = $_SESSION['cart'][$data['id']];
            $cart_list[$data['id']] = $data;
        }
        $count = count($cart_list);
    }
}

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
    .cartIcon{
        width: 90%;
        height: 60px;
        background:url(images/cart.png) 90px 0 no-repeat;
        padding-left: 110px;
        min-width: 535px;
        position: relative;
    }
    .cartIcon p{
        color:#fff;
        font-size:25px;
        font-style:italic;
        font-weight:bold;
        display: inline-block;
        position: absolute;
    }
    .left h2{
        display: inline-block;
        font-size: 2.5rem;
        padding-bottom: 40px;
        font-family: 'cwTeXHei', 微軟正黑體 ;
        padding-left: 50px;
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
    .plusBtn2, .minusBtn2{
        width: 31px;
        height: 31px;
        display:inline-block;
        vertical-align:middle;
        margin: 0;
    }
    .number2{
        font-size: 16px;
        display:inline-block;
        width: 30%;
        text-align: center;
        vertical-align:middle;
        /*height: 16px;*/
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
    .delete{
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
        width: 60%;
        height:100%;
        display:inline-block;
        font-size:14px;
        line-height:200%;
    }
    .r4c2{
        width: 40%;
        height:100%;
        display:inline-block;
        font-size:16px;
        line-height:200%;
        text-align:right;
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
    .prevBtn, .checkBtn{
        width: 50%;
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
    .prevBtn:after, .checkBtn:after{
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
    .prevBtn:hover, .checkBtn:hover{
        background-color: rgba(0,0,0,0.8);
        color: #fff;
    }
    .prevBtn:hover:after, .checkBtn:hover:after{
        opacity: 0;
        transform: scale3d(.8, .8, 1);
    }


    /*---------------------mobile----------------------*/
    @media screen and (max-width: 750px){
        .left{
            padding-bottom:16%;
        }
        .left h2{
            font-size: 2rem;
        }
        .mainForm{
            position: relative;
            width: 90%;
            min-width:90%;
            margin: auto;
        }
        .cartIcon{
            background:url(images/cart.png) 35px 0 no-repeat;
            padding-left: 50px;
        }
        .r1{
            width: 100%;
            height: 7px;
            border-top:solid 3px #000;
            border-bottom:solid 1px #000;
            font-size:0;
        }
        .r1c1{
            width: 0%;
            height:0%;
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
            width: 0%;
            height: 0%;
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
            height:25px;
            display:inline-block;
            padding-left:0;
            margin-top:5%;
            margin-bottom:10%;
            font-size: 1.2rem;
            vertical-align:top;
        }
        .r3c3{
            width: 70%;
            height:auto;
            display:inline-block;
            font-size:0;
            vertical-align:top;
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
            position: relative;
        }
        .delete{
            width: 31px;
            height: 31px;
            /*vertical-align:middle;*/
            /*display:inline-block;*/
            position: absolute;
            left: 500%;
            top: -80px;
        }
        .r4{
            margin-top:0px;
            font-size:0;
            height: 36px;
        }
        .r4c1{
            padding:0;
            width: 60%;
            height:100%;
            display:inline-block;
            font-size:14px;
            line-height:36px;
        }
        .r4c2{
            padding:0;
            width: 40%;
            height:100%;
            display:inline-block;
            font-size:16px;
            line-height:36px;
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
            width: 0%;
            height:0%;
            border-left:solid 0px #000;
            border-right:solid 0px #000;

        }
        .r5c2{
            width: 0%;
            height: 0%;
            border-right:solid 0px #000;

        }
        .btns{
            width: 90%;
            height: 100px;
            margin-top:0;
            font-size:0;
            min-width:100%;
            margin-bottom:60px;
        }
        .prevBtn ,.checkBtn{
            width: 90%;
            height: 45px;
            display:inline-block;
            text-align:center;
            line-height: 45px;
            font-size: 1rem;
            border:transparent;
            margin: 3% 5% 0 5%;
        }
    }

</style>
<?php if(! empty($ids)) { ?>
    <div class="contentL">
        <div class="left sliderBar">

            <!-- 購物車內商品數量示意 -->
            <div class="cartIcon">
                <p><?= $count; ?></p>
                <h2>購物車清單</h2>
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
                    <div class="r2c4">刪除</div>
                </div>
                <!-- 商品資訊 -->
                <?php foreach ($cart_list as $data) { ?>
                    <div class="r3">
                        <div class="r3c1">
                            <img src="pic/<?= $data['small_pic']; ?>" alt="" align="middle">
                        </div><!--照片-->
                        <div class="buyInfo">
                            <div class="r3c2"><p><a href="product.php?id=<?= $data['product_id']; ?>"><?= $data['Product']['name']; ?></a></p></div><!-- 品名 -->
                            <div class="r3c3">
                                <a href="javascript:"
                                <a href="javascript:" class="minusBtn minusBtn2"><img src="images/minusBtn.png" alt=""></a>
                                <div class="number number2" data-id="<?= $data['id'] ;?>" ><?= $data['qty']; ?></div><!-- 數量 -->
                                <a href="javascript:" class="plusBtn plusBtn2"><img src="images/plusBtn.png" alt=""></a>
                            </div>
                            <div class="r3c4" data-price="<?= $data['Product']['price']; ?>">NT <span><?= $data['Product']['price']*$data['qty']; ?></span></div><!-- 單品金額 -->
                            <div class="r3c5">
                                <a href="javascript:" data-id="<?= $data['id'] ;?>"  class="delete"><img src="images/deletBtn.png" alt=""></a>
                            </div>

                        </div>
                    </div>
                <?php } ?>
                <!-- 總計金額 -->
                <div class="r4">
                    <div class="r4c1">總價</div>
                    <div class="r4c2 total"></div>
                </div>
                <div class="r5">
                    <div class="r5c1"></div>
                    <div class="r5c2"></div>
                </div>
            </div>
            <!-- 下方按鈕列 -->
            <div class="btns">
                <a href="product_list.php" class="prevBtn">繼續購物</a>
                <?php if(isset($user)){ ?>
                    <a href="cart_check.php" class="checkBtn">確認結帳</a>
                <?php }else{ ?>
                    <a href="login.php" class="checkBtn">確認結帳</a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div class="contentL shop verticaltable">
        <div class="vertical">
            <div class="goshoppcar"><img src="images/cart_icon.jpg" alt=""></div>
            <div class="shoppingtext">
                <div><h1>YOU HAVE NO ITEMS IN CART</h1></div>
            </div>
            <div class="shoppingtext2">
                <h2>目前沒有商品在購物車中，請點擊下方按鈕查看所有商品</h2>
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
<script>

    //算總額
    calTotal = function calTotal(){
        var total = 0;
        $('.r3c4').each(function(el, idx){
            total += parseInt($(this).find('span').text());
        });
        $('.total').text('NT '+total);
    };

    calTotal();

    //購物車刪除
    $('.delete').click(function(){
        var me = $(this);
        var id = me.data('id');
        $.get('add_to_cart.php', {id:id, qty:0}, function(data){
            location.reload();
        },'json');
    });

</script>