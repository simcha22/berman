"use strict"

$(document).ready(function () {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        if($input.val()<=1){
            return false;
        }
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });


    $('a.add-to-cart').on('click', function (e) {
        e.preventDefault();
        var that = $(this);
        var url = that.attr('href');
        $.ajax({
            url: url,
            method: 'get',
            success: function (response) {
                if (Number(response)) {
                    $('#mini-cart span').text(response);
                    $('#alert').slideDown().removeClass().addClass('alert alert-success').text('המוצר הוסף לעגלה בהצלחה.');
                } else {
                    $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('שגיאה בקבלת נתוני מוצר לא הצלחנו להוסיף לעגלה.');
                }
            }
        }).fail(function () {
            $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('שגיאה בקבלת נתוני מוצר לא הצלחנו להוסיף לעגלה.');
        }).always(function () {
            window.setTimeout(function () {
                $('#alert').slideUp();
            }, 3000);
        });
    });

    $('#add-to-cart').on('submit', function (e) {
        e.preventDefault();

        var that = $(this);
        var url = that.attr('action');
        var data = that.serialize();

        $.ajax({
            url: url,
            method: 'post',
            data: data,
            success: function (response) {
                if (Number(response)) {
                    $('#mini-cart span').text(response);
                    $('#alert').slideDown().removeClass().addClass('alert alert-success').text('המוצר הוסף לעגלה בהצלחה.');
                } else {
                    $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('שגיאה בקבלת נתוני מוצר לא הצלחנו להוסיף לעגלה.');
                }
            }
        }).fail(function () {
            $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('שגיאה בקבלת נתוני מוצר לא הצלחנו להוסיף לעגלה.');
        }).always(function () {
            window.setTimeout(function () {
                $('#alert').slideUp();
            }, 3000);
        });
    });

    $('.product-quantity').on('change',debounce( function () {
        var that = $(this),
                parent = that.parents('.update-cart'),
                url = parent.attr('action'),
                data = parent.serialize();

        $.post(url, data, function (response) {
            //JSON.parse(response);
            if (Number(response.cart_count)) {
                $('#mini-cart span').text(response.cart_count);
                $('#alert').slideDown().removeClass().addClass('alert alert-success').text('העגלה עודכנה בהצלחה');
                that.parents('tr').find('.product-total').text(response.product_total);
                $('.cart-total').text(response.cart_total);

            } else {
                $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('שגיאה בקבלת נתוני מוצר לא הצלחנו להוסיף לעגלה.');
            }
        }, 'json').fail(function () {
            $('#alert').slideDown().removeClass().addClass('alert alert-danger').text('שגיאה בקבלת נתוני מוצר לא הצלחנו להוסיף לעגלה.');
        }).always(function () {
            window.setTimeout(function () {
                $('#alert').slideUp();
            }, 3000);
        });
    },500));

    $('a.delete-product').on('click', function(){
        return confirm('האם הנך בטוח שברצונך למחוק את המוצר?');
    });
    $('a.delete-cart').on('click', function(){
        return confirm('האם הנך בטוח שברצונך למחוק את העגלה?');
    });

    $('.open-modal').on('click', function () {
        var that = $(this),
        id =  that.data('id'),
        name = that.data('name'),
        form=$('#deiete-form'),
        route = form.data('route');
        form.attr('action', route + '/' + id);
        $('#confirmModal .modal-body').text('האם הנך בטוח שברצונך למחוק את ' + name);
    });
});

function debounce(func, wait, immediate){
    var timeout;
    return function(){
        var context = this, args = arguments;
        var later = function(){
            timeout = null;
            if(!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if(callNow) func.apply(context, args);
    };
};
