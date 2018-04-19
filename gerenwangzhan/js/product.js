$(aGrow[3]).addClass('active');
var aSlide =  $('.slide');
var aSlideitem = $('.slide-item');
var flag = false;
$idx=0;
$('.slide8').on('click',function () {
/*    if(flag == false){
        $(aSlide[0]).css('transform','rotate(-80deg)');
        $(aSlide[1]).css('transform','rotate(-60deg)');
        $(aSlide[2]).css('transform','rotate(-40deg)');
        $(aSlide[3]).css('transform','rotate(-20deg)');
        $(aSlide[4]).css('transform','rotate(0deg)');
        $(aSlide[5]).css('transform','rotate(20deg)');
        $(aSlide[6]).css('transform','rotate(40deg)');
        $(aSlide[7]).css('transform','rotate(60deg)');
        $(this).css('transform','rotate(80deg)');
    }else {
        $(aSlide).css('transform','rotate(0deg)');
        $(this).css('transform','rotate(0deg)');
    }
    flag=!flag;*/
    /* $(this).css('transform','rotate(80deg)')*/
    $('.product-slide').animate({
        left:'50%'
    },1000);
    $('.slide-list').animate({
        opacity:0,
        left:'50%'
    },600);
    $(aSlideitem[$idx]).animate({
        opacity:0,
    },600);
    $('.btn').animate({
        opacity:0
    },600);
    if(flag==false){
        for(i=0;i<$(aSlide).length;i++){
            if(i==4){var c='0deg';}
            else if(i<4)
            {
                var count = (i+1)*20-100;
                var c = count+'deg';
            }
            else
            {
                var count = (i-4)*20;
                var c = count+'deg';
            }
            $deg='rotate('+c+')';
            $(aSlide[i]).css('transform',$deg);
        }
        $(this).css('transform','rotate(80deg)')
    }else {
        $(aSlide).css('transform','rotate(0deg)');
        $(this).css('transform','rotate(0deg)');
    }
    flag=!flag;
});
$(aSlide).on('click',function () {
    $idx=$(this).index();
    console.log($idx);
    flag=false;
    $(aSlide).css('transform','rotate(0deg)');
    $('.slide8').css('transform','rotate(0deg)');
    $('.product-slide').animate({
       left:'125px'
    },1000);
    $('.slide-list').animate({
        opacity:1,
        left:'310px'
    },1000);
    $(aSlideitem[$idx]).animate({
        opacity:1

    },2000).css('z-index',10).siblings().css('z-index',0);
    $('.btn').animate({
        opacity:1
    },2000);

});
$('.prev-btn').on('click',function () {
    $(aSlideitem[$idx]).animate({
        opacity:0

    },1000).css('z-index',10).siblings().css('z-index',0);
    if($idx==0){
        $idx=  $(aSlideitem).length-1;
        $(aSlideitem[$idx]).animate({
            opacity:1

        },1000).css('z-index',10).siblings().css('z-index',0);
    }else {
        $(aSlideitem[$idx-1]).animate({
            opacity:1

        },1000).css('z-index',10).siblings().css('z-index',0);
        $idx-=1;
    }
});
$('.next-btn').on('click',function () {
    $(aSlideitem[$idx]).animate({
        opacity:0

    },1000).css('z-index',10).siblings().css('z-index',0);
    if($idx==$(aSlideitem).length-1){
        $idx= 0;
        $(aSlideitem[$idx]).animate({
            opacity:1

        },1000).css('z-index',10).siblings().css('z-index',0);
    }else {
        $(aSlideitem[$idx+1]).animate({
            opacity:1

        },1000).css('z-index',10).siblings().css('z-index',0);
        $idx+=1;
    }
});

