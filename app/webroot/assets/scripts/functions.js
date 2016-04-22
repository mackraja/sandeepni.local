/*
 * 
 * Load User Data - Edit Case
 */
function loaduser(v_id)
{
    //alert('hello');
    $.ajax({
            url: 'http://localhost/php/sandeepni/admin/Users/EditUser/',   //$('#room-detail-data').attr('data'),
            type:'POST',
            data: {'id':v_id},
            dataType:'json',
            beforeSend:function(){
                //$('tbody#room-detail-data').empty();
            },
            success:function(response){
                //var data = $.parseJSON(response);
                console.log(response.User.id);
//                $.each(data.User, function(key, el){
                    $('#UserFirstName').val(response.User.first_name);
                    $('#UserLasttName').val(response.User.last_name);
//                    $('tbody#room-detail-data').append(
//                        '<tr><td>'+el.room_no+'</td>'+
//                            '<td>'+el.extra_bed+'</td>'+
//                            '<td>'+el.no_of_person+'</td>'+
//                            '<td>'+el.check_in+'</td>'+
//                            '<td>'+el.check_in_time+'</td>'+
//                            '<td>'+el.check_out+'</td>'+
//                            '<td>'+el.check_out_time+'</td>'+
//                            '<td><button class="btn btn-success btn-circle" data=edit_"'+id+'" type="button" ><i class="fa fa-edit"></i></button>'+
//                                '<button class="btn btn-danger btn-circle" data=delete_"'+id+'" type="button"><i class="fa  fa-trash-o"></i></button>'+
//                            '</td></tr>'
//                        );
//                });
                $('#toggle').modal('show') 
            },
            error:function(xhr, status, error){
                console.log('status' + xhr.responseText);
            }
        });
}





/* 
 * all ajax function defined here
 */

function saveRoomDetail(){
    var room_no = $('#room_no').val();
    var no_of_person = $('#no_of_person').val();
    var extrabed = $('#extrabed').val();
    var check_in = $('#check_in').val();
    var check_in_time = $('#check_in_time').val();
    var check_out = $('#check_out').val();
    var check_out_time = $('#check_out_time').val();
    
    if(room_no == '') { alert("Room No required"); }
    else if(no_of_person == '') alert("No of persons required");
    else if((extrabed != '') && (isNaN(extrabed))) alert("Extra bed should be numeric value");
    else if(isNaN(no_of_person)) alert("No of persons should be numeric value");
    else if(check_in == '') alert("Check In Date required");
    else if(check_in_time == '') alert("Check In Time required");
    else if(check_out == '') alert("Check Out Date required");
    else if(check_out_time == '') alert("Check Out Time required");
    else if(check_out.replace('-','/') < check_in.replace('-','/')) alert("Check Out Date should be greater OR equal to Check In Date ");
    else{
            checkRoomStatus(check_in,check_out,room_no, getStatus)
        }
    }
    /*Laod data get record from room detail cotroller and listed into list*/
    function loadRoomData(v_id){
        $.ajax({
            url:$('#room-detail-data').attr('data'),
            type:'POST',
            data: {'visitor_id':v_id},
            dataType:'html',
            beforeSend:function(){
                $('tbody#room-detail-data').empty();
            },
            success:function(response){
                var data = $.parseJSON(response);
                $.each(data.visitor_rooms, function(key, el){
                    $('tbody#room-detail-data').append(
                        '<tr><td>'+el.room_no+'</td>'+
                            '<td>'+el.extra_bed+'</td>'+
                            '<td>'+el.no_of_person+'</td>'+
                            '<td>'+el.check_in+'</td>'+
                            '<td>'+el.check_in_time+'</td>'+
                            '<td>'+el.check_out+'</td>'+
                            '<td>'+el.check_out_time+'</td>'+
                            '<td><button class="btn btn-success btn-circle" data=edit_"'+id+'" type="button" ><i class="fa fa-edit"></i></button>'+
                                '<button class="btn btn-danger btn-circle" data=delete_"'+id+'" type="button"><i class="fa  fa-trash-o"></i></button>'+
                            '</td></tr>'
                        );
                });
                
            },
            error:function(xhr, status, error){
                console.log('status' + xhr.responseText);
            }
        });
    }
/*check room occupency */
function checkRoomStatus(check_in,check_out,room_no, refreshCallback){
        var PATH = window.location.origin;
        $.ajax({
            url:PATH+'/billing_software/room-status',
            type:'POST',
            data: {'check_in':check_in,'check_out':check_out,'room_no':room_no},
            dataType:'json',
            beforeSend:function(){
            },
            success:function(response){
                if(refreshCallback) refreshCallback(response.result.status, room_no);
            },
            error:function(xhr, status, error){
                console.log('status' + xhr.responseText);
            }
        });
    }
    
    /* call back function */
    function getStatus(status, room_no){
        if(status == 'NOK'){
                $('#message').empty();
                $('#message').append(
                    '<div class="alert alert-warning alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                        '<strong>Room No : '+ room_no +'</strong> Already booked for selected dates'+
                    '</div>');
        }else{
            $.ajax({
                url:$('#roomDetailForm').attr('action'),
                type:'POST',
                data: $('#roomDetailForm').serialize(),
                dataType:'json',
                beforeSend:function(){

                },
                success:function(response){
                    if(response.result.visitor_id > 0){
                        $('#roomDetailForm').trigger("reset");
                        $('#message').empty();
                        $('#myModal').modal('hide');
                        loadRoomData(response.result.visitor_id);
                    }
                },
                error:function(xhr, status, error){
                    console.log('status' + xhr.responseText);
                }
            });
        }
    }