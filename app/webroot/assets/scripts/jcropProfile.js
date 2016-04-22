var JcropProfile = function () {
	var profileImg = function () {
		// Remove file
		$('#removefile').click(function(){
			var removefilename = $('#UserFile').val(); 
			var basepath = $('base').attr('href');
			$.ajax({
	            url: basepath + 'admin/Users/deleteImage',
	            type:'POST',
	            data: {'name':removefilename, 'type':'user'}
	        });
		});
		
		// Uploading File
	    var input = document.getElementById("UserFile");
	    var formdata = false;
	    if (window.FormData) {
	        formdata = new FormData();
	    }
	    input.addEventListener("change", function (evt) {
	        var i = 0, len = this.files.length, img, reader, file;
	        for ( ; i < len; i++ ) {
	            file = this.files[i];
	            if (!!file.type.match(/image.*/)) {
	                if ( window.FileReader ) {
	                    reader = new FileReader();
	                    reader.onloadend = function (e) { 
	                        //showUploadedItem(e.target.result, file.fileName);
	                    };
	                    reader.readAsDataURL(file);
	                }
	                if (formdata) {
	                    formdata.append("data[User][file]", file);
	                }
	                
	                function showCoords(c)
                    {
                        $('#UserX1').val(c.x);
                        $('#UserY1').val(c.y);
                        $('#UserX2').val(c.x2);
                        $('#UserY2').val(c.y2);
                        $('#UserW').val(c.w);
                        $('#UserH').val(c.h);
                    };

                    function clearCoords()
                    {
                        $('#UserX').val('');
                        $('#UserY').val('');
                        $('#UserX2').val('');
                        $('#UserY2').val('');
                        $('#UserW').val('');
                        $('#UserH').val('');
                    };
                    
	                 var basepath = $('base').attr('href');
	                 
	                    jQuery.ajax({
	                        url: basepath + 'admin/Users/uploadImage',
	                        type: "POST",
	                        data: formdata,
	                        processData: false,
	                        contentType: false,
	                        success: function (res) {
	                          if(file.name != res){
	                        	  $('#outerupdate').append(res);
	                          }else{
	                            $('.changeimg').removeAttr('src').attr('src','assets/files/user/'+res);
	                            $('.changeimg').attr('id','target');
	                            $('.changeimg').attr('alt','[Jcrop Example]');
	                            $('#target').removeAttr('class');
	                        	var jcrop_api;
	                            $('#target').Jcrop({
	                              onChange:   showCoords,
	                              onSelect:   showCoords,
	                              onRelease:  clearCoords
	                            },function(){
	                              jcrop_api = this;
	                            });

	                            $('#UserAdminProfileForm').on('change','input',function(e){
	                              var x1 = $('#UserX1').val(),
	                                  x2 = $('#UserX2').val(),
	                                  y1 = $('#UserY1').val(),
	                                  y2 = $('#UserY2').val();
	                              jcrop_api.setSelect([x1,y1,x2,y2]);
	                            });	                            
	                          }
	                        }
	                    });
	                }
	            }
	    }, false);
	}

	return {
        //main function to initiate the module
        init: function () {
        	profileImg();           
        }
    };
}();