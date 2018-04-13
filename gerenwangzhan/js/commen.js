var aGrow=$('.nav-grow');
$(aGrow).on('click',function () {
    $(this).addClass('active').siblings().removeClass('active');
});
$('.nav-content').on({
    mouseover:function () {
        $(this).addClass('over');
    },
    mouseout:function () {
        $(this).removeClass('over');
    }

});