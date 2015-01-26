$(function(){
    $('.ship-btn').click(function(){
        var text = $(this).text();
        $(this).html(
            text == " New Address" ? "Cancel" : "<i class='fa fa-plus'></i> New Address");

        $('.ship-form').toggle();
    });

    $('.address-btn').click(function(){
        var id = $(this).data('id');
        var form = $('#address-form-'+id);
        var box = $('#address-box-'+id);

        var text = $(this).text();
        $(this).text(
            text == "Edit" ? "Cancel" : "Edit");

        form.toggle();
        box.toggle();
    });

    $('.personal-btn').click(function(){
        var form = $('.personal-details-form');
        var box = $('.personal-details');
        var text = $(this).text();

        $(this).html(
            text == "Edit" ? "Cancel" : "Edit");

        form.toggle();
        box.toggle();
    });
});