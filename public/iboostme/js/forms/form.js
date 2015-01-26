$(function(){

	// on form submission
	$('form[data-remote]').on('submit', function(e){
		onRemoteSubmit(e, $(this));
	} );


	// on form confirmation
	$('input[data-confirm], button[data-confirm]').on('click', function(e){
        onRemoteConfirm( e, $(this) );
    });
});

function onRemoteConfirm( e, input ){
    input.prop('disabled', 'disabled');

    if( ! confirm(input.data('confirm')) ){
        e.preventDefault();
    }

    input.removeAttr('disabled');
}

function onRemoteSubmit(e, targetForm){
	e.preventDefault();

	var form = targetForm;
	var method = form.find('input[name="_method"]').val() || 'POST';
	var url = form.prop('action');
	var submitbtn = form.find('input[type="submit"], button[type="submit"]');

	$.ajax({
		type: method,
		url: url,
		data: form.serialize(),
		beforeSend: function(){
			submitbtn.prop('disabled', 'disabled');
		},
		success: function( data ){
            console.log(data);

			var message = '';
			if( data.errorMessage !== undefined ){
				message = data.errorMessage;
			}else{

                // Do success process here.
				if( form.data('type') == 'new-post'){
					bind_new_feed( data ); // dashboard.js
					form.find('textarea').val('');	
				}

				if( form.data('type') == 'new-comment'){
					bind_new_comment( data, form ); // dashboard.js
					form.find('textarea').val('');
				}

                if( form.data('type') == 'delete-comment'){
                    onDeleteComment( data, form); // dashboard.js
                }

                if( form.data('type') == 'delete-feed' ){
                    onDeleteFeed( data, form ); // dashboard.js
                }

                if( form.data('type') == 'new-review-email-message'){
                    onReviewCenterSendEmail( data, form ); // review.js
                }

                if( form.data('type') == 'site_subscribe'){
                    onSiteSubscribe( data, form ); // review.js
                }

                if( form.data('type') == 'join_seaman'){
                	onJoinSeamanHomepage( data, form );
                }

				// enable buttons
				submitbtn.removeAttr('disabled');

				// success message
				message = form.data('success-message');
			}
			if(message){
				$('.flash-message').html( message ).fadeIn(300).delay(2500).fadeOut(300);
			}
		}
	});	
}


