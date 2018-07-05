<?php include('common/_head.php'); ?>
<!-- 左邊區塊 -->
<style>
    *{
        margin: 0px;
        padding: 0px;
        list-style: none;
    }
    /*banner區*/
    .contentLL{
        position: absolute;
        padding-right: 140px;
        width: 100%;
        height: 100%;

    }

    .topL {
            width:100%;
            height:30%;
            position:relative;

    }
    .topL img{
        width: 100%;
        height: auto;

    }


    /*展場資訊選單*/
    .bigbox{
             overflow: auto;
             width: 100%;
             height: 70%;
             position: relative;
            }
    .ex , .ex3, .ex2, .ex4{
           float: left;
           width: 25%;
           height:600px;
           background-color:#fff;
           border: solid 1px #A9A9A9;
           position: relative;

    }

    .pic1 ,.pic2 , .pic4 , .pic3 {
        width:100% ;
        height:50%;
        padding:1%;
        padding-bottom:2%;
        overflow: hidden;

    }
    .pic1 img ,.pic2 img, .pic4 img , .pic3 img{
        width: 100%;
        height:auto;


    }
    .obox{
        width: 100%;
        height: 50%;
        padding-top: 5%;
        line-height:1.2rem;
        position: relative;
    }
    .box{
        width:95%;
        height:10%;
        border-bottom: 1px solid #000000;
        margin: auto;
        text-align:left;
       }
    .box h2{
        font-size: 2rem;
        font-weight: bold;
        color: #221816;
    }
    .bigbox p{
        padding-top: 3%;
        padding-right:3%;
        padding-left: 3%;
        line-height:1.3rem;
        font-size: 0.6rem;

    }
    .time{
        position:absolute;
        bottom:9%;
        right: 2%;
        font-size:0.6rem;
        letter-spacing:2px;
        font-weight: bold;
    }
    .add{
        position:absolute;
        bottom:2%;
        right: 2%;
        font-size:0.6rem;
        letter-spacing:2px;
        font-weight: bold;
    }
    .topLtittle{
        width: 90%;
        height: 80%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        position: absolute;
    }
    .topLtittle h1{
        text-align: center;
        font-size: 8rem;
        color:#fff;
        padding-bottom: 3rem;
    }
    .topLtittle p{
        text-align: center;
        font-size: 1rem;
        line-height: 1.5rem;
        color:#fff;
        padding: 0 10%;
    }

    @media only screen and (min-width: 768px) and (max-width:1200px) {

        .ex , .ex3, .ex2, .ex4 {

            width: 50%;
            height: 33rem;
            background-color: #fff;
            border: solid 1px #A9A9A9;
        }
        .pic1 ,.pic2, .pic4, .pic3{
            width:98% ;
            height:50%;
            padding:3px;
        }
        .box h2{
            font-size: 1.5rem;}

    }
    @media screen and (max-width: 767px) {
        .contentLL{
            padding-top:50px;
            padding-right:0;
            width: 100%;
            height: 100%;
            position: absolute;
        }
        .topL{
            display: none;
        }
        .topLtittle{
            display: none;
        }
        .bigbox{
            width: 100%;
            height: 100%;
        }
        .ex , .ex3, .ex2, .ex4{

            width: 100%;
            height:550px;
            background-color:#fff;
            border: solid 1px #A9A9A9;
            overflow: hidden;
        }
        .pic1 img ,.pic2 img , .pic4 img , .pic3 img{
            width:100% ;
            height:auto;
            padding:2%;

        }
        .box h2{
            font-size:1.5rem;
            text-align:center;
        }
        .bigbox p{
            line-height: 1.2rem;
        }


    }


</style>
<!--左邊區塊-->
<div class="contentLL">
<!--    banner區-->
        <div class="topL"><img src="images/1540x350-07.jpg" alt=""></div>
        <div class="topLtittle">

            <h1>Exhibition</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores nihil deleniti, ducimus labore ex fuga provident atque perspiciatis, vel, dignissimos
            nulla vero unde accusamus maxime aliquid quas officia quibusdam enim.
            </p>
            </div>
<!--    展覽資訊-->
    <div class="bigbox sliderBar">
        <div class="ex">

            <div class="pic1"><img src="images/IMG_3435.jpg" alt=""></div>
            <div class="obox">
                <div class="box"><h2>Interior lifestyle Tokyo</h2></div>
                <p><日本最大且最具專業性指標的國際生活用品商展，以「設計」導向的室內家居生活為其主題，展出內容均來自全世界高水平與精美產品。
                    <br><br>這是我們EYE CANDLE往亞洲時尚之都邁出的第一步，在此展會中可見到各方業界齊聚一堂，不僅是廠商及買家尋求合作的重要平臺，並且同時在此掌握市場脈動及流行趨勢。
                    JAPAN WE HERE !!
                </p>
                <div class="time">2014/6/4- 6/6</div>
                <div class="add">Tokyo Big Sight West Hall</div>
            </div>

        </div>
        <div class="ex2">
            <div class="obox">
                <div class="box"><h2>Interior Lifestyle CHINA</h2></div>
                <p>這是全球知名的家居及生活用品品牌都已在上海展上相繼登場，歷年海外品牌参展比例超過70%，而眾多海內外企業與設計師也一致認為此展會是樹立品牌、推出新品、拓展通路之最佳交流平台。
                    <br><br>十分榮幸受邀參加此次展覽，可以讓更多的朋友們可以感受我們EYE CANDLE 小動物們療育的魅力，讓更多人可以支持我們，我們首次登陸上海展覽，有空的朋友們希望可以到場支持。
                </p>
                <div class="time">2014/9/18-9/20</div>
                <div class="add">上海國際展覽中心</div>
            </div>
            <div class="pic2"><img src="images/SH2.jpg" alt=""></div>

        </div>
        <div class="ex3">
            <div class="pic3"><img src="images/shsl.jpg" alt=""></div>
            <div class="obox">
                <div class="box"><h2>SH urban simplelife</h2></div>
                <p>首次進駐內地市場，2014上海簡單生活節的舞臺規模上要超過以往，包，純淨市場、果實小巷、私房生活、夢想工坊等迷人的展區，呈現完整的簡單生活節面貌。此次破天荒天后張惠妹極少出現在內地音樂節的陣容，是為簡單生活節首次移植內地土壤添上濃重一筆，
                    <br>eye candle在上海！
                    <br>簡單生活節，我們不見不散！
                </p>
                <div class="time">2014/10/4-10/6</div>
                <div class="add">上海世博公園</div>
            </div>

        </div>
        <div class="ex4">
            <div class="obox">
                <div class="box"><h2>PR01.TRADESHOW</h2></div>
                <p>由roomsLINK進化延伸，於2014年正式邁入第三屆的「PR01.TRADESHOW TAIPEI presents roomsLINK」，是從東京出發、結合台北與首爾三地，每年向世界發信的大型合同展示會。
                    <br><br>&nbsp這場亞洲品牌饗宴當然今年我們EYE CANDLE也不會缺席，我們與合作品牌BE CANDLE一同展出，不彷假日可以約個伴來逛逛吧。
                </p>
                <div class="time">2014/11/6-11/9</div>
                <div class="add">台北 松山文創園區</div>
            </div>
            <div class="pic4"><img src="images/pr010022.jpg" alt=""></div>

        </div>
        <div class="ex">
            <div class="pic1"><img src="images/IMG_3435.jpg" alt=""></div>
            <div class="obox">
                <div class="box"><h2>Interior lifestyle Tokyo</h2></div>
                <p><日本最大且最具專業性指標的國際生活用品商展，以「設計」導向的室內家居生活為其主題，展出內容均來自全世界高水平與精美產品。
                    <br><br>這是我們EYE CANDLE往亞洲時尚之都邁出的第一步，在此展會中可見到各方業界齊聚一堂，不僅是廠商及買家尋求合作的重要平臺，並且同時在此掌握市場脈動及流行趨勢。
                    JAPAN WE HERE !!
                </p>
                <div class="time">2014/6/4- 6/6</div>
                <div class="add">Tokyo Big Sight West Hall</div>
            </div>
        </div>
        <div class="ex2">
            <div class="obox">
                <div class="box"><h2>Interior Lifestyle CHINA</h2></div>
                <p>這是全球知名的家居及生活用品品牌都已在上海展上相繼登場，歷年海外品牌参展比例超過70%，而眾多海內外企業與設計師也一致認為此展會是樹立品牌、推出新品、拓展通路之最佳交流平台。
                    <br><br>十分榮幸受邀參加此次展覽，可以讓更多的朋友們可以感受我們EYE CANDLE 小動物們療育的魅力，讓更多人可以支持我們，我們首次登陸上海展覽，有空的朋友們希望可以到場支持。
                </p>
                <div class="time">2014/9/18-9/20</div>
                <div class="add">上海國際展覽中心</div>
            </div>
            <div class="pic2"><img src="images/SH2.jpg" alt=""></div>

        </div>
        <div class="ex3">
            <div class="pic3"><img src="images/shsl.jpg" alt=""></div>
            <div class="obox">
                <div class="box"><h2>SH urban simplelife</h2></div>
                <p>首次進駐內地市場，2014上海簡單生活節的舞臺規模上要超過以往，包，純淨市場、果實小巷、私房生活、夢想工坊等迷人的展區，呈現完整的簡單生活節面貌。此次破天荒天后張惠妹極少出現在內地音樂節的陣容，是為簡單生活節首次移植內地土壤添上濃重一筆，
                    <br>eye candle在上海！
                    <br>簡單生活節，我們不見不散！
                </p>
                <div class="time">2014/10/4-10/6</div>
                <div class="add">上海世博公園</div>
            </div>
        </div>
        <div class="ex4">
            <div class="obox">
                <div class="box"><h2>PR01.TRADESHOW</h2></div>
                <p>由roomsLINK進化延伸，於2014年正式邁入第三屆的「PR01.TRADESHOW TAIPEI presents roomsLINK」，是從東京出發、結合台北與首爾三地，每年向世界發信的大型合同展示會。
                    <br><br>&nbsp這場亞洲品牌饗宴當然今年我們EYE CANDLE也不會缺席，我們與合作品牌BE CANDLE一同展出，不彷假日可以約個伴來逛逛吧。
                </p>
                <div class="time">2014/11/6-11/9</div>
                <div class="add">台北 松山文創園區</div>
            </div>
            <div class="pic4"><img src="images/pr010022.jpg" alt=""></div>

        </div>




</div>

<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
