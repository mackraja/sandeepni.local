var Forget = function () {

//	var handleForgetPassword = function () {
//		$('.forget-form1 input').keydown(function(event) {
//			if($('.input-icon input[type=text]').val().length == 0)
//			{
//		 		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
//		 		if ((event.keyCode == 13)){
//		 			return false;
//		 		}
//			}
//		});
//		
//		$('#forgetbutton').click(function() {
//			if($('.forget-form1 input[type=text]').val() != ''){
//				$("#loginbutton").removeClass('grey-gallery-light').addClass('grey-gallery-dark');
//				return true;
//			}else{
//				return false;
//			}
//		});
//		
//		$('.forget-form1 input').keyup(function() {
//	        var empty = false;
//	        $('.forget-form1 input').each(function() {
//	        	$(this).val($(this).val().replace(/ +?/g, ''));
//	            if ($(this).val().length == 0) {
//	                empty = true;
//	            }
//	        });
//	        if (empty) {
//	        	$("#forgetbutton").removeClass('btn-success-dark').addClass('btn-success-light');
//	        	return false;
//	        } else {
//	        	$("#forgetbutton").removeClass('btn-success-light').addClass('btn-success-dark');
//	        	return true;
//	        }
//	    });
//	}
	
	var handleForgetPassword = function () {
		$('.forget-form1').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                "data[User][email]": {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                "data[User][email]": {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.forget-form1 input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form1').validate().form()) {
	                    $('.forget-form1').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form1').show();
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form1').hide();
	        });

	}

	return {
        //main function to initiate the module
        init: function () {
            handleForgetPassword();           
        }
    };

}();