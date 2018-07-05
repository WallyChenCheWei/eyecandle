<?php include('common/_head.php'); ?>
<!-- 左邊區塊 -->
<style>
    .kitchenc1{
        margin-left: 1.9%;
        margin-right: 3.5%;
        padding: 20px 20px 20px 20px;
        border: 1px solid #ccc;
    }
    .kitchenc2{
        margin: 5% 1%;
        padding: 5%;
        background-color: rgba(255, 255, 255, .6);
    }
    .kitchenc2 h2{
        font-size: 2rem;
        font-weight: bold;
        font-family: "微軟正黑體";
        line-height: 2.5rem;
    }
    .kitchenc2 p{
        padding-top: 2%;
        font-size: 1rem;
        font-weight: bold;
        font-family: "微軟正黑體";
        line-height: 1.5rem;
    }
    .kitchenphoto{
        margin-left: 3.5%;
        margin-right: 5%;
    }
    .kp1{
         margin-right: 5%;
         width: 30%;
         height: 20%;
         float: left;
     }
    .kp2{
        width: 30%;
        height: 20%;
        float: left;
    }
    .kp1, .kp2{
        border: 1px solid #ccc;
        padding: 5px;
    }
    .kclear{
        clear: both;
    }
    .kp2 img{
        width:100%;
        height: auto;
    }
    .kp1 img{
        width:100%;
        height: auto;
    }
    .kitchenc3{
        font-size: 16px;
        font-weight: bold;
        font-family: "微軟正黑體";
        line-height: 24px;
        color: #ff7a0a;
        list-style: disc;
        padding: 30px;
        margin: 10px 1%;
        background-color: rgba(255, 255, 255, .6);
    }
    .kitchenc3 ul{
        margin-left: 2%;
        list-style: disc;
    }
    .kitchenc3 li{
        padding-top: 2%;
    }
    .btnkc{
       position: relative;
    }
    .kchenbtn{
        width:91%;
        margin-left:3.6%;
    }
    .kcbtn{
        margin-top: 40px;
        border: solid 1px #080808;
        margin-left: 40px;
        margin-right: 45px;
        background-color: #fff;
        width: 1100px;
        height: 100px;
        font-size:30px;
        font-family: "微軟正黑體";
    }
    .embed-container { position: relative; padding-bottom: 45.25%;  overflow: hidden; max-width: 100%; height: 80%;}
    .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
    @media only screen and (min-width: 768px) and (max-width:1200px){
        .kitchenc3 ul{
            margin-left: 2%;
            list-style: disc;
        }
    }
    @media screen and (max-width: 767px){
        .embed-container { position: relative; padding-bottom: 70%;  overflow: hidden; max-width: 100%;}
        .kitchenc1{
            padding: 10px 5px;
            border-width: 0;
        }
        .kitchenc3 ul{
            margin-left: 2%;
            list-style: none;
        }
        .kitchenc2{
            padding-bottom: 30px;

        }
        .kitchenc2 h2{
            font-size: 1.2rem;
            font-weight: bold;
            font-family: "微軟正黑體";
            line-height: 2.4rem;
        }
        .kitchenc2 p{
            padding-top: 2%;
            font-size: .8rem;
            font-weight: bold;
            font-family: "微軟正黑體";
            line-height: 1.5rem;
        }
        .kp1{
            width: 100%;
            height: 100%;
            float:none;
            margin: 10px 0;
        }
        .kp2{
            width: 100%;
            height: 100%;
            float:none;
        }
        .kitchenc3 ul{
            list-style: disc;
            font-size: .8rem;
        }

    }

    /*<iframe width="1122" height="631" src="https://www.youtube.com/embed/p6ah0C9ZYs8" frameborder="0" allowfullscreen></iframe>*/
</style>
<div class="newcontentL">
    <h1 class="newtopL">Eye Kitchen / Mini Candle DIY</h1>
    <div class="outerFrame"></div>
    <div class="newbottomL sliderBar">
        <div class="kitchenc1"><div class='embed-container'><iframe src='https://www.youtube.com/embed/p6ah0C9ZYs8'  frameborder='0' allowfullscreen></iframe></div></div>
            <div class="kitchenc2">
                <h2>Eye Candle Studio 迷你小籠包造型蠟燭DIY</h2>
                <p>小籠包台灣最受歡迎的小點之一，甚至可以說是巴黎的馬卡龍一樣受大家的喜愛，eye kitchen首發蠟燭料理，邀請您親自體驗動手做出另類的香氛蠟燭小點。當日參加課程者可獨享誠品生活松菸店eye candle 商品9折優惠(僅限8/14)。</p>
            </div>
            <div class="kitchenphoto">
                <div class="kp1"><img src="images/kc1.jpg" alt=""></div>
                <div class="kp1"><img src="images/kc2.jpg" alt=""></div>
                <div class="kp2"><img src="images/kc3.jpg" alt=""></div>
                <div class="kclear"></div>
            </div>
            <div class="kitchenc3">
                <ul>
                    <li>精油由松菸店2F香草舖子專櫃提供。</li>
                    <li>課程費用:399元(包含材料、包裝、飲品乙杯，小籠包約4-5個視大小而定)</li>
                    <li>時間: 共分三個梯次，19:30-20:00、20:00-20:30、20:30-21:00，每梯次限額6名</li>
                </ul>
                <p></p>
                <p></p>
                <p></p>
            </div>
            <div class="kchenbtn">
            <button type="submit" class="btn btnkc">點我報名</button>
            </div>
        </div>
    </div>

<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
<script src="./js/bgMove.js"></script>
