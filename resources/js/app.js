require('./helper');
require('./basket');

$('body').on('click', '.add_basket', function(e) {
    e.preventDefault();
    var datas = new FormData();
    datas.append('id', $(this).data('id'));
    helper.controller.sendAjax(
        datas,
        $(this).data('route')
    );
});