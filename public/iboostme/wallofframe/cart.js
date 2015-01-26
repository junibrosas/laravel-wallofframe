$(function(){
    $('.select-quantity').change(function(){
        var form = $(this).closest('form');
        form.submit();
    });
});