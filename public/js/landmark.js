"use strict"
/* Create Modal */
function addInfoModal(){
    
}
/* Create Thumnail */
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
                  //upload tmp file
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