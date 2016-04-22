var Reset = function () {
    
    var handleReset = function () {
         $('.reset-form1').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                "data[User][password]": {
	                    required: true
	                },
	                "data[User][password_confirm]": {
                            equalTo: "#password"
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                "data[User][password]": {
	                    required: "Password is required."
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

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

                    $('.reset-form1 input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.reset-form1').validate().form()) {
	                    $('.reset-form1').submit();
	                }
	                return false;
	            }
	        });
	}
    
    return {
        //main function to initiate the module
        init: function () {
            handleReset();
        }
    };

}();