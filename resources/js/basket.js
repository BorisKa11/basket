(function(basket, $, undefined) {
    "use strict";
    basket.helper = basket.helper || {
        update: function (data) {

        },
        remove: function(data) {
            if (data.status == 1) {
                $('#row_item_' + data.id).find('.remove_confirm').remove();
                $('#row_item_' + data.id).addClass('removable').slideUp(250, function() {
                    $(this).remove();
                });
                helper.helper.alert(data.message, 'success');
            } else {
                helper.helper.alert(data.message, 'error');
            }
        },
        remove_confirm: function($link) {
            $link.parents('basket_row_color').find('.remove_confirm').remove();
            $link.parents('.basket_row_color').append(
                '<div class="remove_confirm"><span>Точно удалить запись?</span>' +
                '<a href="javascript:;" class="btn_yes">Да</a>' +
                '<a href="javascript:;" class="btn_no">Нет</a>' +
                '</div>'
            ).find('.remove_confirm:first').css({filter: 'opacity(1)', zIndex: 2});
            $('body').on('click', '.btn_no', function(e) {
                e.preventDefault();
                $(this).parent().fadeOut(250, function() {
                    $(this).remove();
                });
            });
            $('body').on('click', '.btn_yes', function(e) {
                e.preventDefault();
                basket.controller.remove($(this).parent().parent().find('.remove_basket:first'));
            });
        },
        changeCount: function(data) {
            $('#row_item_' + data.id).find('.count_product:first').text(data.count);
            helper.helper.alert(data.message, data.status==1 ? 'success' : 'error');
        },
    };
    basket.controller = basket.controller || {
        remove: function($link) {
            var datas = new FormData();
            datas.append('id', $link.data('id'));
            helper.controller.sendAjax(
                datas,
                $link.data('route'),
                basket.helper.remove
            );
        },
        changeCount: function($link) {
            var datas = new FormData();
            datas.append('id', $link.data('id'));
            helper.controller.sendAjax(
                datas,
                $link.data('route'),
                basket.helper.changeCount
            );
        },
    };
    basket.view = basket.view || {
        init: function() {
            $('body').on('click', '.remove_basket', function(e) {
                e.preventDefault();
                basket.helper.remove_confirm($(this));
            });

            $('body').on('click', '.count_basket', function(e) {
                e.preventDefault();
                basket.controller.changeCount($(this));
            });
        },
    };
    $(document).ready(function() {
        if ($('div').is('#basket_rows_list')) {
            basket.view.init();
        }
    });
})(window.basket = window.basket || {}, jQuery);