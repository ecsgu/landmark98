"use strict"
/* Modal */
function addInfoModal(id_topic){
    var modal = document.getElementById("image-info");
    var img = modal.getElementsByTagName("IMG");
    img.src = "https://www.w3schools.com/jsref/compman.gif";
    openModal("image-info");
}
/* Thumnail */
function createThumbnail(){
    var formData = new FormData();
    formData.append('image', document.querySelector('#file').files[0]);
    formData.append('csrfmiddlewaretoken', $('input[name=_token]'));
    $.ajax({
        type: 'post',
        url: 'tmpfile',
        data: formData,
        processData: false,
        contentType: false,
        success : function(image) {
            var thumnail = document.getElementById("thumnail");
            removeThumbnail();
            var imgThumnail = document.createElement("IMG");
            imgThumnail.setAttribute("src",image);
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
    });

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
/* Post */
function TestPost(id_post){
    var post = document.getElementById(id_post);
    if(post.value == "") {
        post.attributes["placeholder"].value = "Bạn phải nhập gì đó!!!";
        return false;
    }
    return true;
}
/* Comment */
function ShowMore(id_post){
    var btn = document.getElementById("btn_"+id_post);
    var post = document.getElementById(id_post);
    if(btn.innerText === "Xem thêm") {
        post.classList.remove("vh-hide");
        btn.innerText = "Ẩn bớt";
    }
    else {
        post.classList.add("vh-hide");
        btn.innerText = "Xem thêm";
    }
}
function keydown_Comment(id_post,event){
    var txt = document.getElementById("txt_"+id_post);
    if(event.keyCode == 13){
        if(!event.shiftKey){
            if(txt.value != ""){
                // Truyen ajax
                txt.value = "";
                var notification = document.createElement("DIV");
                notification.classList.add("vh-tiny","vh-text-gray");
                notification.innerText = "Bình luận đã được thêm";
                txt.insertAdjacentElement("afterend",notification);
            }
            event.preventDefault();
        }
    } else {
        var parent = txt.parentElement;
        parent.removeChild(txt.nextSibling);
    }
}
/* Change avatar */
function ChangeAvatar(){
    var formData = new FormData();
    formData.append('image', document.querySelector('#file2').files[0]);
    formData.append('csrfmiddlewaretoken', $('input[name=_token]'));

    $.ajax({
        type: 'post',
        url: 'tmpfile',
        data: formData,
        processData: false,
        contentType: false,
        success : function(image) {
            var a=$('#change-avatar');
            a[0].childNodes[1].childNodes[3].src=image;
        }
    });
    openModal('change-avatar');
}
function duyetbai(id)
{
    var formData = new FormData();
    formData.append('id', id);
    $.ajax({
        type: 'post',
        url: 'duyetbai',
        data: formData,
        processData: false,
        contentType: false,
        success : function(image) {
            location.href="";
        }
    });
}
function xoabai(id)
{
    var formData = new FormData();
    formData.append('id', id);
    $.ajax({
        type: 'post',
        url: 'xoabai',
        data: formData,
        processData: false,
        contentType: false,
        success : function(image) {
            location.href="";
        }
    });
}