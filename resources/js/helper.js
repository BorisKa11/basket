(function(helper, $, undefined) {
    "use strict";
    helper.helper = helper.helper || {
        alert: function (text, a_class) {
            $('#errorsShow').stop().remove();
            $('body').append('<div id="errorsShow">' + text + '</div>');
            $('#errorsShow').addClass(a_class).fadeIn(150).delay(3500).fadeOut(150, function () {
                $(this).remove();
            });
        },
    };
    helper.controller = helper.controller || {
        sendAjax: function(datas, url, callback) {
            $.ajax({
                type: "post",
                url: url,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                crossDomain: true,
                data: datas,
                beforeSend: function(request) {
                    return request.setRequestHeader('X-CSRF-TOKEN', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(data) {
                    if (data.redirect !== undefined) {
                        location.href = data.redirect;
                    }

                    if (callback)
                        callback(data);
                    else
                        helper.helper.alert(data.message, 'success');
                },
                error: function (response) {
                    if (response.status == 401) {
                        helper.helper.alert('Необходима авторизация', 'error');
                        return;
                    }
                    let error = [];
                    if (response.responseJSON !== undefined) {
                        for (var e in response.responseJSON.errors) {
                            response.responseJSON.errors[e].forEach(item => {
                                error.push('<div>' + item + '</div>');
                            });
                        }
                        helper.helper.alert(error.join(''), 'error')
                    }
                },
            });
        },
    };

})(window.helper = window.helper || {}, jQuery);