let del_url = '';

function showDelModal(url,modal_id)
{
    del_url = url;
    $(modal_id).modal('show');
}

function sureDel(modal_id)
{
    $(modal_id).modal('hide');
    $.ajax({
        type:"GET",
        url:del_url,
        dataType:"json",
        success:function(res){
            if(res>0){
                toastr.warning(res.msg);
            }else{
                toastr.success(res.msg);
                reSetTimeOut(500,location.href);
            }
        },
        error:function (err) {
            toastr.error('服务器错误，请稍后重试');
        }
    })
}

//重写setTimeOut
function reSetTimeOut(time, url) {
    setTimeout(function () {
        window.location.href = url;
    }, time);
}