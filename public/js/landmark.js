"use strict"
/* Create Modal */
function addInfoModal(){
    
}
/* Create Thumnail */
function createThumbnail(url){
    var thumnail = document.getElementById("thumnail");
    removeThumbnail();
    var imgThumnail = document.createElement("IMG");
    imgThumnail.setAttribute("src",url);
    imgThumnail.setAttribute("width","100%");
    var overlayThumnail = document.createElement("DIV");
    overlayThumnail.classList.add("vh-display-topright","vh-display-hover","vh-text-white","vh-padding-small");
    var btnRemove = document.createElement("SPAN");
    btnRemove.classList.add("fa","fa-remove");
    btnRemove.addEventListener("click",removeImg);
    overlayThumnail.insertAdjacentElement("afterbegin",btnRemove);
    thumnail.insertAdjacentElement("afterbegin",imgThumnail);
    thumnail.insertAdjacentElement("afterbegin",overlayThumnail);
}
function removeThumbnail(){
    while(thumnail.childNodes.length > 0){
        thumnail.removeChild(thumnail.childNodes[0]);
    }
}
function removeImg(){
    removeThumbnail();
    var inputImg = document.getElementById("file");
    inputImg.defaultValue = "";
    inputImg.value = "";
}