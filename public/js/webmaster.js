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
function xoacmt(id,quyen)
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
function phanquyen(user,quyen)
{
    // quyen là vị trí bit cần thay đổi theo thứ tự từ 0 -> 6
    // Thành công làm việc này
    a = document.createElement("input").value= user;
    b = document.createElement("input").value= Math.pow(2,quyen);
    var formData = new FormData();
    formData.append('user', a);
    formData.append('role', b);
    $.ajax({
        type: 'post',
        url: 'phanquyen',
        data: formData,
        processData: false,
        contentType: false,
        success : function(success) {
            if(success=="true")
                document.getElementById(user).getElementsByTagName("IMG")[quyen].classList.toggle("vh-grayscale-max");
        }
    });
    
}
function xoatb(id)
{

    a = document.createElement("id").value= id;
    var formData = new FormData();
    formData.append('id', a);
    $.ajax({
        type: 'post',
        url: 'deletenotification',
        data: formData,
        processData: false,
        contentType: false,
        success : function(success) {
            if(success=="true")
                location.href="";
        }
    });
}
function duyetadvertise(id)
{
    a = document.createElement("id").value= id;
    var formData = new FormData();
    formData.append('id', a);
    $.ajax({
        type: 'post',
        url: 'duyetadvertise',
        data: formData,
        processData: false,
        contentType: false,
        success : function(success) {
            if(success=="true")
                location.href="";
            else
                alert("Bạn không có quyền này");
        }
    });
}