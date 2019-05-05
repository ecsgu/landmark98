"use strict"
/* Modal */
function addInfoModal(id_topic){
    $.ajax({
        type: 'post',
        url: 'Topic/'+id_topic,
        processData: false,
        contentType: false,
        success : function(success) {
            var topic = success.topic;
            var customer = success.customer;
            var comments = success.comment;
            var cmtcustomers = success.cmtcustomer;
            // Truyền hình
            document.getElementById("modal-image").src = topic.image;
            // Truyền avatar
            document.getElementById("modal-avatar").src = customer.image;
            // Truyền user
            var user = document.getElementById("modal-user");
            user.setAttribute("href","./Customer/" + customer.id);
            user.innerText = customer.name;
            // Truyền ngày tạo
            document.getElementById("modal-created").innerText = topic.updated_at;
            // Truyền caption
            document.getElementById("modal-caption").innerText = topic.caption;
            // Truyền Comment
            var cmts = document.getElementById("modal-comments");
            while(cmts.hasChildNodes()){
                cmts.removeChild(cmts.firstChild);
            }
            for (let index = 0; index < comments.length; index++) {
                cmts.insertAdjacentElement("beforeend",createComment(comments[index],cmtcustomers[index]));
            }
            // Truyền id bài viết
            document.getElementById("txt_modal").setAttribute("onkeydown","keydown_Comment('"+topic.id+"',true,event)")
            openSidebar("modal-info");
        }
    });
}
function createComment(comment,cmtcustomer){
    var image = document.createElement("IMG");
    image.classList.add("vh-circle");
    image.setAttribute("src",cmtcustomer.image);
    image.setAttribute("width","40px");

    var link = document.createElement("A");
    link.setAttribute("href",'./Customer/' + comment.username);
    link.insertAdjacentElement("afterbegin",image);

    var col1 = document.createElement("DIV");
    col1.classList.add("vh-col","l2","m1","s2");
    col1.insertAdjacentElement("afterbegin",link);



    var name = document.createElement("A");
    name.setAttribute("href",'./Customer/' + cmtcustomer.id);
    name.innerText = cmtcustomer.name;

    var created = document.createElement("DIV");
    created.classList.add("vh-small","vh-text-gray");
    created.innerText = comment.created_at;

    var col2 = document.createElement("DIV");
    col2.classList.add("vh-col","l10","m11","s10");
    col2.insertAdjacentElement("beforeend",name);
    col2.insertAdjacentText("beforeend"," "+comment.caption);
    col2.insertAdjacentElement("beforeend",created);

    var cmt = document.createElement("DIV");
    cmt.classList.add("vh-row","vh-margin-top");
    cmt.insertAdjacentElement("beforeend",col1);
    cmt.insertAdjacentElement("beforeend",col2);
    
    return cmt;
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
function keydown_Comment(id_post,Ismodal,event){
    var txt;
    if(Ismodal === true) txt =document.getElementById("txt_modal");
    else txt = document.getElementById("txt_"+id_post);
    if(event.keyCode == 13){
        if(!event.shiftKey){
            if(txt.value != ""){
                var formData = new FormData();
                formData.append('id', id_post);
                formData.append('caption', txt.value);
                formData.append('csrfmiddlewaretoken', $('input[name=_token]'));
                $.ajax({
                    type: 'post',
                    url: 'Comment',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success : function(success) {
                        txt.value = "";
                        var notification = document.createElement("DIV");
                        notification.classList.add("vh-tiny","vh-text-gray");
                        notification.innerText = "Bình luận đã được thêm";
                        txt.insertAdjacentElement("afterend",notification);
                    }
                });
            }
            event.preventDefault();
        }
    } else {
        if(txt.nextSibling != null) {
            var parent = txt.parentElement;
            parent.removeChild(txt.nextSibling);
        }
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