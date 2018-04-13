var left=$('.left-container');
var right=$('.right-container');
$(aGrow[0]).addClass('active');
var flag = false;
var ht=$(document).height();
 $('.container').height(ht-50);
setTimeout(function () {

    left.css('left','-50%');
    right.css('right','-50%');

}, 500);
//$('.my-info').hide();
$('.l-btn').on('click',function () {


    if(flag == false){
        left.css('left','0px');
        right.css('right','-100%');
        $('.my-info').animate({
            width:'50%',
            height:'80%',
            opacity:1
        },2000);
        $(this).css('transform','rotateY(180deg)');
        //$('.my-info').show();

    }else{
        left.css('left','-50%');
        right.css('right','-50%');
        $('.my-info').animate({
            width:0,
            height:0,
            opacity:0
        },2000)
        $(this).css('transform','rotateY(0deg)');
        //$('.my-info').hide();
    }
    flag=!flag;

});
$('.r-btn').on('click',function () {
    if(flag == false){
        left.css('left','-100%');
        right.css('right','0px');
        $('.my-do').animate({
            width:'50%',
            height:'80%',
            opacity:1
        },2000);
        $(this).css('transform','rotateY(180deg)');
    }else{
        left.css('left','-50%');
        right.css('right','-50%');
        $('.my-do').animate({
            width:'0px',
            height:'0px',
            opacity:0
        },2000);
        $(this).css('transform','rotateY(0deg)');
    }
    flag=!flag;

});
left.hover(
    function () {
        $('.l-btn').css('right','30%');
    },
    function () {
        $('.l-btn').css('right','25%');
    }
);
right.hover(
    function () {
        $('.r-btn').css('left','30%');
    },
    function () {
        $('.r-btn').css('left','25%');
    }
);

