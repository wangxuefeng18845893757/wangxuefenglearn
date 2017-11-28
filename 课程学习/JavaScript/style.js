var oSearchText=document.getElementsByClassName("search-text")[0];
var oCommendSearch=document.getElementsByClassName("commend-search")[0];
var oSearch=document.getElementsByClassName("search")[0];
var oContant=document.getElementsByClassName("contant")[0];
var aA=oContant.getElementsByTagName("a");
oSearch.onmouseover=function () {
    oSearch.className="search search-active";
    oSearchText.className="search-text search-text-active";
}
oSearch.onmouseout=function () {
    oSearch.className="search";
    oSearchText.className="search-text";
}
oSearch.onclick=function () {
    oSearch.className="search search-click";
    oSearchText.className="search-text search-text-click";
    oSearch.onmouseout="none";
    oSearch.onmouseover="none";
    for (i=0;i<aA.length;i++){
        aA[i].innerHTML="";
    }
    oCommendSearch.style.display="block";
}
document.onclick=function () {
    oSearch.onclick=null;
}