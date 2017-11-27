var oSlide=document.getElementsByClassName("slide")[0];
var oImgBox=document.getElementsByClassName("img-box")[0];
var aImgSlide=oImgBox.getElementsByTagName("a");
var oBtns=document.getElementsByClassName("btns")[0];
var aLi=oBtns.getElementsByTagName("li");
var oPrevBtn=document.getElementsByClassName("prev-btn")[0];
var oNextBtn=document.getElementsByClassName("next-btn")[0];
var count=0;
var timer;
for (i=0;i<aLi.length;i++){
    aLi[i].index=i;
    aLi[i].onclick=function () {
        count=this.index;
        changeImg(this.index);
    }
}
oNextBtn.onclick=function () {
    count++;
    if(count>=aImgSlide.length){
        count=0;
    }
    changeImg(count);
}
oPrevBtn.onclick=function () {
    count--;
    if(count<0){
        count=aImgSlide.length-1;
    }
    changeImg(count);
}
function changeImg(idx) {// 在函数里 this 指向 window
    for (j = 0; j < aLi.length; j++) {
        aLi[j].className = "";
        aImgSlide[j].className="";
    }
    aLi[idx].className = "selected";
    aImgSlide[idx].className="img-active";
}
function run() {
    timer=setInterval(function () {
        oNextBtn.onclick();
    },3000)}
run();
oSlide.onmouseover=function () {
    clearInterval(timer);
}
oSlide.onmouseout=function () {
    run();
}