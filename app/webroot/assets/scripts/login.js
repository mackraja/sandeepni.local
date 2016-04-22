var Login = function () {
	
	var handleLogin = function(){
		
		$('.login-form input').keydown(function(event) {
			if(	  ($('.input-icon input[type=text]').val().length == 0 || $('.input-icon input[type=password]').val().length == 0)
				|| ($('.input-icon input[type=text]').val().length == 0 && $('.input-icon input[type=password]').val().length == 0)	)
			{
		 		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		 		if ((event.keyCode == 13)){
		 			return false;
		 		}
			}
		});
		
		$('#loginbutton').click(function() {
			if($('.input-icon input[type=text]').val() != '' && $('.input-icon input[type=password]').val() != ''){
				$("#loginbutton").removeClass('btn-success-light').addClass('btn-success-dark');
				return true;
			}else{
				return false;
			}
		});
		
		$('.login-form input').keyup(function() {
		        var empty = false;
		        $('.login-form input').each(function() {
		        	$(this).val($(this).val().replace(/ +?/g, ''));
		            if ($(this).val().length == 0) {
		                empty = true;
		            }
		        });
		        if (empty) {
		        	$("#loginbutton").removeClass('btn-success-dark').addClass('btn-success-light');
		        	return false;
		        } else {
		        	$("#loginbutton").removeClass('btn-success-light').addClass('btn-success-dark');
		        	return true;
		        }
		    });

	}

//	var handleLogin = function() {
//		$('.login-form').validate({
//	            errorElement: 'span', //default input error message container
//	            errorClass: 'help-block', // default input error message class
//	            focusInvalid: false, // do not focus the last invalid input
//	            rules: {
//	                "data[Login][username]": {
//	                    required: true
//	                },
//	                "data[Login][password]": {
//	                    required: true
//	                },
//	                "data[Login][remember]": {
//	                    required: false
//	                }
//	            },
//
//	            messages: {
//	                "data[Login][username]": {
//	                    required: "Username is required."
//	                },
//	                "data[Login][password]": {
//	                    required: "Password is required."
//	                }
//	            },
//
//	            highlight: function (element) { // hightlight error inputs
//	                $(element)
//	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
//	            },
//
//	            success: function (label) {
//	                label.closest('.form-group').removeClass('has-error');
//	                label.remove();
//	            },
//
//	            errorPlacement: function (error, element) {
//	                error.insertAfter(element.closest('.input-icon'));
//	            },
//
//	            submitHandler: function (form) {
//	                form.submit();
//	            }
//	        });
//
//	        $('.login-form input').keypress(function (e) {
//	            if (e.which == 13) {
//	                if ($('.login-form').validate().form()) {
//	                    $('.login-form').submit();
//	                }
//	                return false;
//	            }
//	        });
//	}

	return {
        //main function to initiate the module
        init: function () {
            handleLogin();
        }
    };

}();