var Admin = function () {

	var handleUserAdd = function () {

         $('.user-add-form').validate({
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
	                    required: false
	                },
	                "data[User][password_confirm]": {
                            equalTo: "#UserPassword"
	                },
	                "data[User][group_id]":{
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
                        "data[User][group_id]":{
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
	               if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                //form.submit();
                        var basepath = $('base').attr('href');
                        var data = $(form).serialize();
                        $.ajax({
                            url: basepath + 'admin/Users/AddEditUser',
                            type:'POST',
                            data: data,
                            beforeSend:function(){
//                                $("#toggleprogressBar").width('100%');
                            },
                            error : function(xhr, textStatus, errorThrown) {
                                alert('An error occurred!');
                            },
                            success:function(response){
                                $('#update').append(response);
                            },
                            complete: function() {
                                $('form').trigger("reset");
//                                setTimeout(function(){
//                                    $("#toggleprogressBar").animate({opacity:0});
//                                },500);
                                setInterval(function() {location.reload();},1500);
                            }
                        });
	            }
	        });

		$('.user-add-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.user-add-form').validate().form()) {
	                    $('.user-add-form').submit();
	                }
	                return false;
	            }
	        });
	}
        
//        var handleUserEdit = function () {
//
//         $('.user-edit-form').validate({
//	            errorElement: 'span', //default input error message container
//	            errorClass: 'help-block', // default input error message class
//	            focusInvalid: false, // do not focus the last invalid input
//	            ignore: "",
//	            rules: {
//                        "data[User][first_name]": {
//	                    required: true
//	                },
//	                "data[User][email]": {
//	                    required: true,
//	                    email: true
//	                },                        
//	                "data[User][username]": {
//	                    required: true
//	                },
//	                "data[User][password]": {
//	                    required: true
//	                },
//	                "data[User][password_confirm]": {
//                            equalTo: "#UserPassword"
//	                },
//	                "data[User][groups_id]":{
//                            required: true
//                        }
//	            },
//
//	            messages: { // custom messages for radio buttons and checkboxes
//                        "data[User][first_name]": {
//	                    required: "First name is required."
//	                },
//                        "data[User][email]": {
//	                    required: "Email is required."
//	                },                        
//	                "data[User][username]": {
//	                    required: "Username is required."
//	                },
//	                "data[User][password]": {
//	                    required: "Password is required."
//	                },
//                        "data[User][groups_id]":{
//                            required: "Please select group."
//                        }
//	            },
//
//	            invalidHandler: function (event, validator) { //display error alert on form submit   
//
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
//	               if (element.closest('.input-icon').size() === 1) {
//	                    error.insertAfter(element.closest('.input-icon'));
//	                } else {
//	                	error.insertAfter(element);
//	                }
//	            },
//
//	            submitHandler: function (form) {
//	                //form.submit();
//                        var basepath = $('base').attr('href');
//                        var data = $(form).serialize();
//                        $.ajax({
//                            url: basepath + 'admin/Users/AddEditUser',
//                            type:'POST',
//                            data: data,
//                            beforeSend:function(){
//                                $("#toggleprogressBar").width('100%');
//                            },
//                            error : function(xhr, textStatus, errorThrown) {
//                                alert('An error occurred!');
//                            },
//                            success:function(response){
//                                $('#update').append(response);
//                            },
//                            complete: function() {
//                                $('form').trigger("reset");
//                                setTimeout(function(){
//                                    $("#toggleprogressBar").animate({opacity:0});
//                                },500);
//                                setInterval(function() {location.reload();},1500);
//                            }
//                        });
//	            }
//	        });
//
//		$('.user-edit-form input').keypress(function (e) {
//	            if (e.which == 13) {
//	                if ($('.user-edit-form').validate().form()) {
//	                    $('.user-edit-form').submit();
//	                }
//	                return false;
//	            }
//	        });
//	}
	
	var handleGroupAdd = function(){
		
		$('.group-add-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
                    "data[Group][name]": {
	                   required: true
	                },
	                "data[Group][status]":{
                       required: true
                    }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
                    "data[Group][name]": {
	                   required: "Group name is required."
                    },
                    "data[Group][status]":{
                       required: "Please select status."
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
	               if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                //form.submit();
                       var basepath = $('base').attr('href');
                       var data = $(form).serialize();
                       $.ajax({
                           url: basepath + 'admin/Groups/AddEditGroup',
                           type:'POST',
                           data: data,
                           beforeSend:function(){
                               //$("#toggleprogressBar").width('100%');
                           },
                           error : function(xhr, textStatus, errorThrown) {
                               alert('An error occurred!');
                           },
                           success:function(response){
                               $('#update').append(response);
                           },
                           complete: function() {
                               $('form').trigger("reset");
//                               setTimeout(function(){
//                                   $("#toggleprogressBar").animate({opacity:0});
//                               },500);
                               setInterval(function() {location.reload();},1500);
                           }
                       });
	            }
	        });

		$('.group-add-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.group-add-form').validate().form()) {
	                    $('.group-add-form').submit();
	                }
	                return false;
	            }
	        });
	
		
	}
    var handleCheckAll = function (){
    	
    	hideShowbtn();
    	$('.checksingle').click(function(){
    		hideShowbtn();
    	});

    	$('#CheckAll').click(function(){
    		if($('#CheckAll').prop('checked')) {
    			$(".checksingle").prop('checked', true);
    			$(".checksingle").parent('span').addClass('checked');
    			$('#action-div').removeClass('none').addClass('block');
    		} else {
    			$(".checksingle").prop('checked', false);
    			$(".checksingle").parent('span').removeClass('checked');
    			$('#action-div').removeClass('block').addClass('none');
    		}
    		hideShowbtn();
    	});	
    	function hideShowbtn(){
    		var total_chkbx = $(".checksingle:checkbox").length;
    		var n = $(".checksingle:checkbox:checked").length;
    		if(total_chkbx > 0) {
    			if(total_chkbx == n) {
    				$('#CheckAll').prop('checked', true);
    				$("#CheckAll").parent('span').addClass('checked');
    				$('#action-div').removeClass('none').addClass('block');
    			} else {
    				$('#CheckAll').prop('checked', false);
    				$("#CheckAll").parent('span').removeClass('checked');
    				$('#action-div').removeClass('block').addClass('none');
    			}
    		}
    		if(n>=2){$('#action-div').removeClass('none').addClass('block');}
	    	else{$('#action-div').removeClass('block').addClass('none');}
    	}
    	
//    	var total = $('tr td div span').length;
//    	var check = false;
//        $('#CheckAll').click(function () {
// 			var check = $("#uniform-CheckAll span").hasClass("checked");
// 			if(check){
// 				$('tr td div span').addClass('checked');
// 				$('#action-div').removeClass('none').addClass('block');
// 			}else{
// 				$('tr td div span').removeClass('checked');
// 				$('#action-div').removeClass('block').addClass('none');
// 			}
//	    });
//       
//	    $('.checksingle').click(function () {
//	    	var num = $('tr td div span[class="checked"]').length;
//	    	if(num>=2){$('#action-div').removeClass('none').addClass('block');}
//	    	else{$('#action-div').removeClass('block').addClass('none');}
//	    	
//	    	if(total==num){$("#uniform-CheckAll span").addClass('checked');}
//	    	else{$("#uniform-CheckAll span").removeClass('checked');}
//	    });
    }
    return {
        //main function to initiate the module
        init: function () {
            handleUserAdd();
            //handleUserEdit();
            handleCheckAll();
            handleGroupAdd();
        }
    };

}();