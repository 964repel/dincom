
$('.delete').click(function () {
    var res = confirm('Подтвердите удаление');
    if (!res)return false;
});

$('.sidebar-menu a').each(function () {
    var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if(link == location2){
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});

/*
CKEDITOR.replace('editor1');*/
$('#editor1').ckeditor();

$('#reset-filter').click(function () {
    $('#filter input[type=radio]').prop('checked', false);
    return false;
});


$(".select2").select2({
    placeholder: "Начните вводить наименование товара",
    minimumInputLength: 2,
    cache: true,
    ajax: {
        url: adminPath + "/event/related-event",
        delay: 250,
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            return {
                results: data.items,
            };
        },
    },
});


