/*
 * Load Add User Toggle
 */
$("#addUserId, #addgroupId").click(function() {
    $('form').trigger("reset");
    $('#toggle').modal({
        backdrop: 'static',
        keyboard: true
    });
    $('h4#change-user').text('Add User');
    $('h4#change-group').text('Add Group');
    $('.form-group').removeClass('has-error');
    $( "span" ).remove( ".help-block" );
    //$('form').removeClass('user-edit-form').addClass('user-add-form');
    $('#toggle').modal('show');
});
/*
 * Load Edit User Toggle
 */
function editUserId(edit_id){
    $('form').trigger("reset");
    $('#toggle').modal({
        backdrop: 'static',
        keyboard: true
    });
    $('.form-group').removeClass('has-error');
    $( "span" ).remove( ".help-block" );
    //$('form').removeClass('user-add-form').addClass('user-edit-form');
    var id = $("#_"+edit_id).text();
    var basepath = $('base').attr('href');
    $.ajax({
            url: basepath + 'admin/Users/EditViewUser',
            type:'POST',
            data: {'id':id},
            dataType:'json',
//            beforeSend:function(){
//                
//            },
            error : function(xhr, textStatus, errorThrown) {
                alert('An error occurred!');
            },
            success:function(response){
            	$('h4#change-user').text('Edit User');
            	$('#UserFirstName').val(response.User.first_name);
                $('#UserLastName').val(response.User.last_name);
                $('#UserEmail').val(response.User.email);
                $('#UserGroupId').val(response.Login.group_id);
                $('#UserUsername').val(response.Login.username);
                $('#UserLoginid').val(response.User.login_id);
                $('#UserUserid').val(response.User.id);
                $('#toggle').modal('show');
            }
//            complete: function() {
//                
//            }
        });
}
/*
 * Load View User Toggle
 */
var view_win_count = "";
function viewUserId(view_id){
	view_win_count = view_id;
    $('#viewtoggle').modal({
        backdrop: 'static',
        keyboard: true
    });
    var id = $("#_"+view_id).text();
    var basepath = $('base').attr('href');
    $.ajax({
            url: basepath + 'admin/Users/EditViewUser',
            type:'POST',
            data: {'id':id},
            dataType:'json',
//            beforeSend:function(){
//               
//            },
            error : function(xhr, textStatus, errorThrown) {
            	alert('An error occurred!');
            },
            success:function(response){
                $('#ViewFirstName').html(response.User.first_name);
                $('#ViewLastName').html(response.User.last_name);
                $('#ViewEmail').html(response.User.email);
                $('#ViewGroupName').html(response.Group.name);
                $('#ViewUsername').html(response.Login.username);
                $('#viewtoggle').modal('show');
            }
//            complete: function() {
//                
//            }
        });
}
/*
 * Delete User by ID
 */
function deleteUserId(delete_id,all){
	var id = $("#_"+delete_id).text();
	if(all===1 && delete_id===0){
		if ($('tr td div span[class="checked"]').length) {
			  var chkId = '';
			  $('tr td div span[class="checked"]').each(function () {
				  chkId += $('input',this).val() + ",";
		});
		id = chkId.slice(0, -1);
		}
	}
    var basepath = $('base').attr('href');
    if (confirm('Are you sure you want to delete User ?')) {
        $.ajax({
                url: basepath + 'admin/Logins/delete',
                type:'POST',
                data: {'id':id,'all':all},
//                beforeSend:function(){
//                    alert('before send');
//                },
                error : function(xhr, textStatus, errorThrown) {
                    alert('An error occurred!');
                },
                success:function(response){
                    $('#outerupdate').append(response);
                    setInterval(function() {location.reload();},2000);
                }
//                complete: function() {
//                
//                }
            });
    }
}
/*
 * Change User Status by ID
 */
function statusUserId(type,status_id,all){
	var id = $("#_"+status_id).text();
	if(all===1 && status_id===0){
		if ($('tr td div span[class="checked"]').length) {
			  var chkId = '';
			  $('tr td div span[class="checked"]').each(function () {
				  chkId += $('input',this).val() + ",";
		});
	    id = chkId.slice(0, -1);
		}
	}
    if(type === 1){
        var confirm_msg = 'Are you sure you want to activate User ?';
    }else{
        var confirm_msg = 'Are you sure you want to deactivate User ?';
    }
    var basepath = $('base').attr('href');
    if (confirm(confirm_msg)) {
        $.ajax({
                url: basepath + 'admin/Logins/status',
                type:'POST',
                data: {'id':id, 'type':type,'all':all},
//                beforeSend:function(){
//                    alert('before send');
//                },
                error : function(xhr, textStatus, errorThrown) {
                    alert('An error occurred!');
                },
                success:function(response){
                    $('#outerupdate').append(response);
                    setInterval(function() {location.reload();},2000);
                }
//                complete: function() {
//                
//                }
            });
    }
}

/*
 * Load Edit Group Toggle
 */
function editGroupId(edit_id){
    $('form').trigger("reset");
    $('#toggle').modal({
        backdrop: 'static',
        keyboard: true
    });
    $('.form-group').removeClass('has-error');
    $( "span" ).remove( ".help-block" );
    //$('form').removeClass('user-add-form').addClass('user-edit-form');
    var id = $("#_"+edit_id).text();
    var basepath = $('base').attr('href');
    $.ajax({
            url: basepath + 'admin/Groups/EditViewGroup',
            type:'POST',
            data: {'id':id},
            dataType:'json',
//            beforeSend:function(){
//                
//            },
            error : function(xhr, textStatus, errorThrown) {
                alert('An error occurred!');
            },
            success:function(response){
            	$('h4#change-group').text('Edit Group');
            	$('#GroupName').val(response.Group.name);
                $('#GroupStatus').val(response.Group.status);
                $('#GroupId').val(response.Group.id);
                $('#toggle').modal('show');
            }
//            complete: function() {
//                
//            }
        });
}

/*
 * Change Group Status by ID
 */
function statusGroupId(type,status_id,all){
	var id = $("#_"+status_id).text();
	if(all===1 && status_id===0){
		if ($('tr td div span[class="checked"]').length) {
			  var chkId = '';
			  $('tr td div span[class="checked"]').each(function () {
				  chkId += $('input',this).val() + ",";
		});
	    id = chkId.slice(0, -1);
		}
	}
    if(type === 1){
        var confirm_msg = 'Are you sure you want to activate Group ?';
    }else{
        var confirm_msg = 'Are you sure you want to deactivate Group ?';
    }
    var basepath = $('base').attr('href');
    if (confirm(confirm_msg)) {
        $.ajax({
                url: basepath + 'admin/Groups/Status',
                type:'POST',
                data: {'id':id, 'type':type,'all':all},
//                beforeSend:function(){
//                    alert('before send');
//                },
                error : function(xhr, textStatus, errorThrown) {
                    alert('An error occurred!');
                },
                success:function(response){
                    $('#outerupdate').append(response);
                    setInterval(function() {location.reload();},2000);
                }
//                complete: function() {
//                
//                }
            });
    }
}

/*
 * Delete Group by ID
 */
function deleteGroupId(delete_id,all){
	var id = $("#_"+delete_id).text();
	if(all===1 && delete_id===0){
		if ($('tr td div span[class="checked"]').length) {
			  var chkId = '';
			  $('tr td div span[class="checked"]').each(function () {
				  chkId += $('input',this).val() + ",";
		});
		id = chkId.slice(0, -1);
		}
	}
    var basepath = $('base').attr('href');
    if (confirm('Are you sure you want to delete Group ?')) {
        $.ajax({
                url: basepath + 'admin/Groups/delete',
                type:'POST',
                data: {'id':id,'all':all},
//                beforeSend:function(){
//                    alert('before send');
//                },
                error : function(xhr, textStatus, errorThrown) {
                    alert('An error occurred!');
                },
                success:function(response){
                    $('#outerupdate').append(response);
                    setInterval(function() {location.reload();},2000);
                }
//                complete: function() {
//                
//                }
            });
    }
}
/*
 * Form submit on limit change
 */ 
$('#FilterLimit').change(function(){
	this.form.submit();
});
/*
 * Move User Data on keyup Down in Modal Window 
 */
$(".view-win").click(function(){
	view_win_count = "";
});
$(document).keydown(function(e) {
	if(view_win_count.length == 0) return;
    if(e.keyCode == 38) {
    	if(view_win_count > 1){
    		viewUserId(view_win_count - 1);
        	return false;    		
    	}
    }
    else if(e.keyCode == 40) {
    	var total_tr = $('.td-count tbody tr').length;
    	if(total_tr > view_win_count){
    		viewUserId(view_win_count + 1);
        	return false;
    	}
    }
});