let del_url = '';

function showDelModal(url,modal_id)
{
    del_url = url;
    $(modal_id).modal('show');
}

function sureDel(modal_id)
{
    $(modal_id).modal('hide');
    get(del_url);
}

/**
 *
 * @param url
 * @param data
 * @param isReturn
 * @param callback
 */
function post(url, data, isReturn = false, callback) {
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(res){
            if (isReturn) {
                callback(res);
                return;
            }
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
    });
}

function get(url, isReturn = false, callback) {
    $.ajax({
        type: 'POST',
        url: url,
        success: function (res) {
            if (isReturn) {
                callback(res);
                return;
            }
            if (res > 0) {
                toastr.warning(res.msg);
            } else {
                toastr.success(res.msg);
                reSetTimeOut(500, location.href);
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