jQuery(document).ready(function($) {
	$('body').on('click', '.go_admin', function(e) {
		e.preventDefault();
		if (typeof admin_url != 'undefined') {
			document.location = admin_url;

		}
	})
	$('body').on('click', '.go_home', function(e) {
		e.preventDefault();
		if (typeof home_url != 'undefined') {
			document.location = home_url;

		}
	})
	$('body').on('click', '.go_to', function(e) {
		e.preventDefault();
		var _target = $(this).data('target-url');
		if (_target != "") {
			document.location = _target;
		}
	});
	
	$('body').on('click','.delete_confirm',function(e){
		e.preventDefault();
		$('.popover',$('body')).hide();
		$(this).parent().addClass('popup_container');
		var _popup=$(this).next('.popover');
		_popup.show();
	})
		$('.popover').on('click','.delete',function(e){
			e.preventDefault();
			$('.popover',$('body')).hide();
		});
	$('body').on('click','.confirm_delete_alert',function(e){
		e.preventDefault();
		if(confirm("Do you want to perform this action? This cannot be undone")){
			var _target=$(this).data('confirm-url');
			document.location=_target;
			}
		})
	$('#add_user_form').validate({
		rules: {
			first_name: {
				minlength: 2,
				required: true
			},
			last_name: {
				minlength: 2,
				required: true
			},
			email: {
				required: true,
				email: true
			},
			password: {
				minlength: 2,
				required: true
			},
			password_confirm: {
				required: true,
				equalTo: '#password'
			}
		},
		highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
			element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
		}
	});
	$('#edit_user_form').validate({
		rules: {
			first_name: {
				minlength: 2,
				required: true
			},
			last_name: {
				minlength: 2,
				required: true
			},
			email: {
				required: true,
				email: true
			},
			password_confirm: {
				equalTo: '#password'
			}
		},
		highlight: function(element) {
			$(element).closest('.control-group').removeClass('success').addClass('error');
		},
		success: function(element) {
			element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
		}
	});
	$('.datepicker').datepicker();
});