$(function() {
    //背景圖滿版
    $('#slides').superslides({
        hashchange: false
    });

    var menuSub,menuStatus,menuOri,menuChange,menuOriS,menuChangeS;

    //次選單先隱藏
    $('.menu ul li ul').hide();


    //主選單滑出不同畫面
    $('.menuR ul li').on("click", function(){
        console.log('click');
        menuSub = $(this).attr('data-menu');
        menuStatus = $(this).attr('data-status');
        menuOri = $(this).find('i').attr('data-ori');
        menuChange = $(this).find('i').attr('data-change');

        if(menuStatus==0){
            $(this).siblings().find('i').each(function(){
                menuOriS = $(this).attr('data-ori');
                menuChangeS = $(this).attr('data-change');
                $(this).removeClass(menuChangeS);
                $(this).addClass(menuOriS);
            });

            $(this).find('i').removeClass(menuOri);
            $(this).find('i').addClass(menuChange);
            $('.menuSub').hide();
            $('.menuR ul li').attr('data-status',0);
            $('.'+menuSub).animate({right:'0'},300).css({'display':'block'});
            $('.menuSub').siblings('.menuSub').css({'right':'-100%'});
            $(this).attr('data-status',1);
            $('.contentL').animate({'opacity': '0.5'});

        }else{
            $(this).find('i').removeClass(menuChange);
            $(this).find('i').addClass(menuOri);
            $('.'+menuSub).animate({opacity:'-100%',right:'-100%'},300);
            $(this).attr('data-status',0);
            $('.contentL').animate({'opacity': '1'});
            $('.menuSub').hide();
        }
    });

    //次選單效果
    $('.menuSub ul li a').on("click", function(){
        $('.contentL').css({'opacity': '0.5'});
        $(this).parent('li').siblings().find('ul').slideUp();
        $(this).siblings('ul').slideToggle();
    });

    //點擊其他地方次選單消失
    $(document).mousedown(function (e){
        var container = $('.menuR');

        if (!container.is(e.target)&&
            $('.menuSub').has(e.target).length === 0){

            $('.menuSub').animate({right:'-100%'},300);

            $('.menuR ul li').find('i').each(function(){
                menuOriS = $(this).attr('data-ori');
                menuChangeS = $(this).attr('data-change');
                $(this).removeClass(menuChangeS);
                $(this).addClass(menuOriS);
            });
            $('.contentL').animate({'opacity': '1'});
            $('.menuSub').hide();
        }

    });

    影片可控制暫停
    var video = document.getElementById("my-video");
    video.play();
    $('#my-video').on('click', function () {
        if (video.paused) {
            video.play();
            console.log('play');
        }
        else {
            video.pause();
            console.log('pause');
        }
    });

    //加入願望清單
    var add_to_wishlist = function(){
        var me = $(this);
        me.off('click');
        if(me.find('i').hasClass('fa-heart-o')){
            var status = 1;
        }else{
            var status = 0;
        }

        var id = me.data('id');
        $.get('add_to_wishlist.php', {id:id, status:status}, function(data){
            me.on('click', add_to_wishlist);
            if(data[id]){
                me.find('i').removeClass('fa-heart-o');
                me.find('i').addClass('fa-heart');
            }else{
                me.find('i').removeClass('fa-heart');
                me.find('i').addClass('fa-heart-o');
                if(location.pathname==="/eyecandle/wish_list.php"){
                    location.reload();
                }
            }
        },'json');
    };

    $('.wishList').on('click', add_to_wishlist);

    //加入購物車
    var add_to_cart = function(){
        var me = $(this);
        me.off('click');
        var id = $('.nowColor').data('id');
        var qty = $('.number').text();
        $.get('add_to_cart.php', {id:id, qty:qty}, function(data){
            me.on('click', add_to_cart);
        });
    };

    $('.addcartBtn').on('click', add_to_cart);

    var calTotal = function(){
        var total = 0;
        $('.r3c4').each(function(el, idx){
            total += parseInt($(this).find('span').text());
        });
        $('.total').text('NT '+total);
    };



});