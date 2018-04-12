var left=$('.background-left');
var right=$('.background-right');
$(aGrow[2]).addClass('active');
$('.dir_line').height('100%');
var ht=$(document).height();
$('.con-directors').height(ht-50);
setTimeout(function () {

   left.width('54%');
   right.width('53%');

}, 1000);
$('.dir-catgory-left').on({
    mouseover:function () {
       left.width(0);
},
    mouseout:function () {
        left.width('54%');
}});
$('.dir-catgory-right').on({
    mouseover:function () {
       right.width(0);
},
    mouseout:function () {
       right.width('53%');
}});




