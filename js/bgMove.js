$(function() {
    /*otherpage*/
    var $newcontentL = $('.newcontentL'),
        $outerFrame = $('.outerFrame'),
        $left = $newcontentL.position().left,
        $top = $newcontentL.position().top;


    $(window).on('mousemove',function(event) {
        var mx = event.pageX;
        var my = event.pageY;
        var disX = Math.floor((mx-$left)*0.01);
        var disY = Math.floor((my-$top)*0.01);
        //console.log(disX);
        $outerFrame.stop(false, true).animate({
            left: disX*-1,
            top: disY*-1
        },400);
    });
});
