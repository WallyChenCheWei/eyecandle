$(function() {
    //New menu
    var $sandwitch = $('.sandwitch'),
        $menu = $('.menu'),
        $subMenu = $('.subMenu'),
        $social = $('.social'),
        $logo = $('.logo');

    $sandwitch.click(function(){
        $sandwitch.children().eq(0).toggleClass('barTurnDown');
        $sandwitch.children().eq(1).toggleClass('barTransparent');
        $sandwitch.children().eq(2).toggleClass('barTurnUp');
        $logo.toggleClass('logoMove');
        $menu.toggleClass('menuMove');
        $subMenu.toggleClass('subMenuShow');
        $social.toggleClass('socialShow');
    });

});