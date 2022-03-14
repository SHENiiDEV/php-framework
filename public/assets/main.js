$(function () {
    $('.language').on('click', function () {
        window.location = '/language/change?lang=' + $(this).val();
    });
});