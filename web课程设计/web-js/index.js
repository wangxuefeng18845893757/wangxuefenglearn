var aNewsSlide=document.getElementsByClassName("news-slide");
var aSlideBox=document.getElementById("slide-box");
var aBtn=document.getElementsByClassName("btn");
var aLi=document.getElementsByClassName("btn-item");
var aA=aSlideBox.getElementsByTagName("a");
var oA1=document.getElementById("prev-btn");
var oA2=document.getElementById("next-btn");
var oNewsSlide=aNewsSlide[0];
var count=0;
var timer;
for (i=0;i<aLi.length;i++){
    aLi[i].index=i;
    aLi[i].onmouseover = function(){
        for (j = 0; j < aLi.length; j++) {
            aLi[j].className = "btn-item";
        }
        this.className = "btn-item selected";
        count=this.index;
        animate(aSlideBox,{left:-this.index * 490});
    }
}

oA2.onclick=function () {
    count++;
    if(count>=aA.length){
        count=0;
    }
    changeImg(count);
    animate(aSlideBox,{left:-count * 490});
}
oA1.onclick=function () {
    count--;
    if(count<0){
        count=aA.length-1;
    }
    changeImg(count);
    animate(aSlideBox,{left:-count * 490});
}
function changeImg(idx) {// 在函数里 this 指向 window
    for (j = 0; j < aLi.length; j++) {
        aLi[j].className = "btn-item";
    }
    aLi[idx].className = "btn-item selected";
}
function run() {
    timer=setInterval(function () {
        oA2.onclick();
    },2000)}
run();
oNewsSlide.onmouseover=function () {
    clearInterval(timer);
}
oNewsSlide.onmouseout=function () {
    run();
}
var oShowList=document.getElementsByClassName("show-list")[0];
var aShowItem=document.getElementsByClassName("show-item");
var speed=-2;
var timer1;
oShowList.innerHTML+=oShowList.innerHTML;
oShowList.style.width=(aShowItem[0].offsetWidth+10)*10+"px";
function run1() {
    timer1 = setInterval(function () {
        oShowList.style.left = oShowList.offsetLeft + speed + "px"
        if (oShowList.offsetLeft <= -oShowList.offsetWidth / 2) {
            oShowList.style.left = 0;
        } else if (oShowList.offsetLeft >= 0) {
            oShowList.style.left = -oShowList.offsetWidth / 2 + "px";
        }
    }, 30)
}
run1();
oShowList.onmouseover=function () {
    clearInterval(timer1);
}
oShowList.onmouseout=function () {
    run1();
}
