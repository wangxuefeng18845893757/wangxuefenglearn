$(aGrow[4]).addClass('active');
$('.connect-form').on({
    mouseover:function () {
        $(this).css('transform','translateY(200px)');
        $('#form-box').css({
            transform:'translateY(-420px)',
            height:'600px'
        });
        $('.btn').css('opacity',1);
    },
    mouseout:function () {
        $(this).css('transform','translateY(0px)');
        $('#form-box').css({
            transform:'translateY(0px)',
            height:'200px'
        });
        $('.btn').css('opacity',0);
    }
});
$('.connect-icon i').on({
    mouseover:function () {
        $(this).siblings().css('opacity',1)
    },
    mouseout:function () {
        $(this).siblings().css('opacity',0)
    }
});
$('.connect-info').on({
    mouseover:function () {
        $(this).css('opacity',1)
    },
    mouseout:function () {
        $(this).css('opacity',0)
    }
});