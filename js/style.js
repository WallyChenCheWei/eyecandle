$(function() {
    /*arrow & product image move*/
    var $arrow = $('.arrow'),
        $arrowWidth = $arrow.width(),
        now = 0,
        $product = $('.product li'),
        $productCount = $product.length;
    //
    //for(var i=0; i<$productCount; i++){
    //    $('.colorGroup').append('<li><a href="javascript:"></a></li>');
    //}

    var $control = $('.colorGroup li');
    var $controlWidth = $control.width();
    var $arrowFrame = $('.arrowFrame');

    $arrowFrame.css({ width: $productCount* ($controlWidth+2 ) });

    $control.click(function(){
        $product.eq(now).stop(true, false).animate({opacity: '0'}, 800);
        now = $(this).index();
        //Ariel Add
        $control.removeClass('nowColor');
        $(this).addClass('nowColor');
        //
        arrowMove();
        imageMove();
    });

    function arrowMove(){
        $arrow.stop(true, false).animate({left: ( $arrowWidth+2 ) * now}, 500);
    }

    function imageMove(){
        $product.eq(now).stop(true, false).animate({ opacity: '1' }, 800);
    }

    /*infoBoard*/
    var $infoBoard = $('.infoBoard'),
        $infoBtn = $('.infoBtn'),
        $infoBtn2 = $('.infoBtn2'),
        $closeBtn = $('.closeBtn'),
        $forgot = $('.forgot');

    $infoBtn.click(function(){
        $infoBoard.fadeIn();
    });
    $infoBtn2.click(function(){
        me = $(this);   
        me.closest('.r3').prev().fadeIn();
    });

    $forgot.click(function(){
        $infoBoard.fadeIn();
    });

    $closeBtn.click(function(){
        $infoBoard.fadeOut();
    });

    /*kiss*/
    var $kissFrame = $('.product'),
        $addcartBtn = $('.addcartBtn'),
        $likeBtn = $('.likeBtn');

    var $contentWidth = $('.product').width(),
        $contentHeight = $('.product').height();

    var kiss = function(){

        var $kiss = $('<div class="kiss"><img src="images/kiss.png"></div>'),
            mr = parseInt(Math.random()*60),
            mx = parseInt(Math.random()*$contentWidth/10),
            my = parseInt(Math.random()*$contentHeight/10);
        //console.log(mx);
        $kiss.css({right: mx+($contentWidth/10), bottom: my+($contentHeight/5), transform: 'rotateZ('+ mr + 'deg)'});
        $kissFrame.append($kiss);
        $kiss.fadeIn().fadeOut(3000);
        $kissClear = setTimeout(function(){
            $('.product').trigger('mousemove');
        },5000);
    };

    $kissFrame.on('mousemove',function(){
        var $kiss = $('.kiss');
        $kiss.remove();
    });

    $likeBtn.on('click',kiss);

    var calTotal = function calTotal(){
        var total = 0;
        $('.r3c4').each(function(el, idx){
            total += parseInt($(this).find('span').text());
        });
        $('.total').text('NT '+total);
    };

    /*number*/
    var $plusBtn = $('.plusBtn'),
        $minusBtn = $('.minusBtn'),
        $number = $('.number');
    var n,id, price;

    $plusBtn.click(function(){
        var me = $(this);
        id = me.prev().data('id');
        n = me.prev().text();
        price = parseInt( me.parent().next().data('price'));
        n++;
        if(price) {
            $.get('add_to_cart.php', {id: id, qty: n, status: 'final'}, function (data) {

                me.parent().next().html('NT <span>' + price * n+'</span>');
                calTotal();
            }, 'json');
        }

        $(this).prev().text(n);
    });
    $minusBtn.click(function(){
        var me = $(this);
        id = me.next().data('id');
        n = me.next().text();
        price = parseInt( me.parent().next().data('price'));
        if(n<=1){
            n=1;
        }else{
            n--;
        }
        if(price) {
            $.get('add_to_cart.php', {id: id, qty: n, status: 'final'}, function (data) {

                me.parent().next().html('NT <span>' + price * n+'</span>');
                calTotal();
            }, 'json');
        }
        $(this).next().text(n);
    });

    /*custom scroll bar*/
    $(window).load(function(){
        //$("#content-l").mCustomScrollbar();//default
        $(".sliderBar").mCustomScrollbar({theme:"minimal-dark"});
        //$(".bottomL").mCustomScrollbar({theme:"minimal-dark"});
        //$(".bigbox").mCustomScrollbar({theme:"minimal-dark"});
        //$(".newbottomL").mCustomScrollbar({theme:"minimal-dark"});

    });

    //add to cart
    var add_to_cart = function(){
        var me = $(this);
        me.off('click');
        var id = $('.nowColor').data('id');
        var qty = $('.number').text();
        $.get('add_to_cart.php', {id:id, qty:qty}, function(data){
            me.on('click', add_to_cart);
            //me.on('click', kiss);
            me.on('click', alertBuy);
        });
    };
    $('.addcartBtn').on('click', add_to_cart);

    //add to wishlist
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
            me.on('click', kiss);
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

    /*----------------------alert already buy------------------------------------*/
    var $alreadyBuy = $('.alreadyBuy');

    var alertBuy = function(){
        $alreadyBuy.show().fadeOut(5000);
    };

    $('.addcartBtn').on('click', alertBuy);
});