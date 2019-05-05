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
function duyetcmt(id)
{
    var formData = new FormData();
    formData.append('id', id);
    $.ajax({
        type: 'post',
        url: 'duyetcmt',
        data: formData,
        processData: false,
        contentType: false,
        success : function(image) {
            location.href="";
        }
    });
}
function xoacmt(id)
{
    var formData = new FormData();
    formData.append('id', id);
    $.ajax({
        type: 'post',
        url: 'xoacmt',
        data: formData,
        processData: false,
        contentType: false,
        success : function(image) {
            location.href="";
        }
    });
}