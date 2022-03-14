$(function () {
  $('#lang').on('change', function () {
    window.location = '/language/change?lang=' + $(this).val();
  });
});