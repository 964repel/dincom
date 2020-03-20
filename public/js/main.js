/*Filters*/
$('body').on('change', '.w_sidebar input', function () {
    var checked = $('.w_sidebar input:checked'),
        data = '';
    checked.each(function () {
        data += this.value + ',';
    });
    if(data){
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function (){
                $('.preloader').fadeIn(300, function () {
                    $('.product-one').hide();
                })
            },
            success: function (res) {
                $('.preloader').delay(200).fadeOut(400, function () {
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({},'', newURL);
                });
            },
            error: function () {
                alert('Ошибка!');
            }
        });
    }else{
        window.location = location.pathname;
    }

});

/*Search*/
var events = new Bloodhound({
    datumTokenizer : Bloodhound.tokenizers.whitespace,
    queryTokenizer :  Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: 'QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});
events.initialize();

$("#typeahead").typeahead({
   //hint: false,
    highlight: true
},{
    name: 'events',
    display: 'title',
    limit: 8,
    source: events
    });

$('#typeahead').bind('typeahead:select', function (ev, suggestion) {
    console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});

/*корзина*/
$('body').on('click', '.add-to-cart-link', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        mod = $('.available select').val();
    $.ajax({
       url: '/cart/add',
        data: {id: id, mod: mod},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка. Попробуйте позже');
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка. Попробуйте позже');
        }
    });
});

function showCart(cart){
   if($.trim(cart) == '<h3>Нет добавленных мероприятий</h3>'){
       $('#cart .modal-footer a, #cart .modal-footer .bg-danger').css('display', 'none');
   }else{
       $('#cart .modal-footer a, #cart .modal-footer .bg-danger').css('display', 'inline-block');
   }
   $('#cart .modal-body').html(cart);
   $('#cart').modal();
   if($('.cart-sum').text()){
        $('.simpleCart_total').html("Ваши мероприятия").text();
   }else {
       $('.simpleCart_total').text("Нет добавленных мероприятий");
   }
};

function getCart(){
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка. Попробуйте позже');
        }
    });
};

function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка. Попробуйте позже');
        }
    });/*
    return false;*/
};

$('#studyLevel').change(function () {
    window.location = 'studylevel/change?studlvl=' + $(this).val();
});

$('.available select').on('change', function () {
    var modId = $(this).val(),
        modSpec = $(this).find('option').filter(':selected').data('title'),
        modPrice = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base_price').data('base');

    if(modPrice){
        $('#base_price').text(modPrice +' ₽');
    }else{
        $('#base_price').text(basePrice +' ₽');
    }
});