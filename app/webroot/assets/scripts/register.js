var Register = function () {

	var handleRegister = function () {

		function format(state) {
                    if (!state.id) return state.text; // optgroup
                    return "<img class='flag' src='assets/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
                }


		$("#select2_sample4").select2({
                    placeholder: '<i class="icon-map-marker"></i>&nbsp;Select a Country',
                    allowClear: true,
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function (m) {
                        return m;
                    }
                });


                $('#select2_sample4').change(function () {
                $('.register-form1').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });



         $('.register-form1').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
                        "data[User][first_name]": {
	                    required: true
	                },
	                "data[User][email]": {
	                    required: true,
	                    email: true
	                },                        
	                "data[User][username]": {
	                    required: true
	                },
	                "data[User][password]": {
	                    required: true
	                },
	                "data[User][password_confirm]": {
                            equalTo: "#password"
	                },
	                "data[User][tnc]": {
	                    required: false
	                },
                        "data[User][groups_id]":{
                            required: true
                        }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
                        "data[User][first_name]": {
	                    required: "First name is required."
	                },
                        "data[User][email]": {
	                    required: "Email is required."
	                },                        
	                "data[User][username]": {
	                    required: "Username is required."
	                },
	                "data[User][password]": {
	                    required: "Password is required."
	                },
	                "data[User][tnc]": {
	                    required: "Please accept TNC first."
	                },
                        "data[User][groups_id]":{
                            required: "Please select group."
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
	                if (element.attr("name") == "data[User][tnc]") { // insert checkbox errors after the container                  
	                    error.insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

			$('.register-form1 input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.register-form1').validate().form()) {
	                    $('.register-form1').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#register-btn').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.register-form1').show();
	        });

	        jQuery('#register-back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.register-form1').hide();
	        });
	}
        
   return {
        //main function to initiate the module
        init: function () {
            handleRegister();
        }
    };

}();