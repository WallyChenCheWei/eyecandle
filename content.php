<?php include('common/_head.php'); ?>
<!-- 左邊區塊 -->
<style>
    *{
        margin: 0px;
        padding: 0px;
        list-style: none;
    }
    /*banner區*/
    .topL{
        width:100%;

        outline: 2px solid #ffff00;
        position:fixed;
        margin-right:160px;
        z-index: 2;
        right:0px;
        top:0;
        box-sizing: border-box;
    }
    .topL img{
            width:100%;
            height:100%;
    }

    /*展場資訊選單*/
    .bigbox{
             padding-top:25%;
             position: absolute;
            }
    .ex , .ex3, .ex2, .ex4{
           float: left;
           width: 25%;
           height:600px;
           background-color:#fff;
           border: solid 1px #A9A9A9;
           /*box-sizing: border-box;*/
    }

    .pic1 img ,.pic2 img , .pic4 img , .pic3 img{
        width:100% ;
        height:300px;
        padding:3px;
    }
    .box{
        width: 350px;
        height: 45px;
        border-bottom: 3px solid #000000;
        text-align:center;
        font-size: 2rem;
       }
    .text{
          width:350px;
          height:300px;
          font-size: 1rem;

          }

    h2{
        font-size:2.5rem;
    }
    .obox{padding:1%; }
    @media screen and (max-width: 768px) {
        .topL{
            top:60px;
            padding: 0;
            /*outline: 2px solid #ffff00;*/
            position:fixed;
            width:100%;

        }
        .topL img{
            width:200%;

        }

        .bigbox{
            padding-top:46%;
            position: absolute;
        }
        .ex , .ex3, .ex2, .ex4{

            width: 100%;
            height:33rem;
            background-color:#fff;
            border: solid 1px #A9A9A9;
            /*box-sizing: border-box;*/
        }

    }
</style>
<div class="contentL">
    <div class="topL"><img src="images/ex_banner.png" alt=""></div>
        <div class="bigbox">
        <div class="ex">
            <div class="pic1"><img src="images/pic1.jpg" alt=""></div>
                <div class="obox">
                <div class="box"><h2>Tokyo 2015 WGE</h2></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dignissimos distinctio in maxime nostrum numquam provident rem reprehenderit velit voluptate.</p>
                </div>
        </div>
        <div class="ex2">
            <div class="obox">
           <div class="text"> <div class="box"><h2>Tokyo 2015 WGE</h2></div></div>
            </div>
            <div class="pic2"><img src="images/pic1.jpg" alt=""></div>

        </div>
        <div class="ex3">
            <div class="pic3"><img src="images/pic1.jpg" alt=""></div>
            <div class="box"><h2>Tokyo 2015 WGE</h2></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis est nemo quis quo saepe sint voluptatum. Delectus dolorem odit veniam!</p>
        </div>
        <div class="ex4">
            <div class="text"> <div class="box"><h2>Tokyo 2015 WGE</h2></div></div>
            <div class="pic4"><img src="images/pic1.jpg" alt=""></div>

        </div>
            <div class="ex">
                <div class="pic1"><img src="images/pic1.jpg" alt=""></div>
                <div class="obox">
                    <div class="box"><h2>Tokyo 2015 WGE</h2></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dignissimos distinctio in maxime nostrum numquam provident rem reprehenderit velit voluptate.</p>
                </div>
            </div>
            <div class="ex2">
                <div class="text"> <div class="box"><h2>Tokyo 2015 WGE</h2></div></div>
                <div class="pic2"><img src="images/pic1.jpg" alt=""></div>

            </div>
            <div class="ex3">
                <div class="pic3"><img src="images/pic1.jpg" alt=""></div>
                <div class="box"><h2>Tokyo 2015 WGE</h2></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis est nemo quis quo saepe sint voluptatum. Delectus dolorem odit veniam!</p>
            </div>
            <div class="ex4">
                <div class="text"> <div class="box"><h2>Tokyo 2015 WGE</h2></div></div>
                <div class="pic4"><img src="images/pic1.jpg" alt=""></div>

            </div>
        </div>

</div>
<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
