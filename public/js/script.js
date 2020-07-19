"use strict"

$(document).ready(function () {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
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
        console.log($(this));
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
});