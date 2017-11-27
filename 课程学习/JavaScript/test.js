var a='haha';
var b='hehe';
document.write(a);
console.log(b);
/*
var num = prompt("请输入XXX的成绩");
num1 = num*1;
if(num1 == 0){
    num1=parseInt(num);
}
if(isNaN(num1)){
    alert("您输入的不是一个数字！");
}
else{
    if(num<=100&&num>=90){
        alert("Excellent");
    }
    else{
        if(num<90&&num>=80){
            alert("Good")
        }
        else{
            if(num<80&&num>=70){
                alert("So so")
            }
            else  {
                    if(num<70&&num>=60){
                        alert("Be careful")
                    }
                    else{
                        if(num<60&&num>=0){
                            alert("Oh no")
                        }
                    }
                }
            }
        }
    }
*/
/*var arr = new Array(2);
arr[0]=1
arr[1]=2
// console.log(arr);
function show() {
    console.log(arr);
}
show();
*/
var dog={
    name:"bai",
    age:"3",
    jiao:function () {
        console.log('wang wang');
    }
}
dog.jiao();