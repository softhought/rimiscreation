$(document).ready(function () {

    $(document).on('keyup','#SerialNo',function(e){
        e.preventDefault();         
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
        {                
            $('#SerialNo').val($('#SerialNo').val().replace(/[^\d.]/g, ''));
        }        
    });

     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
     });

    $(document).on('change','#MediaType',function(){
		 if ($('#MediaType option:selected').val()=='URL') {
            $('.typ-url').css('display','block');
            $('.typ-file').css('display','none');
         } else if ($('#MediaType option:selected').val()=='VIDEO') {
            $('.typ-url').css('display','none');
            $('.typ-file').css('display','block');    
            $('#Media').attr('accept','video/mp4,video/x-m4v,video/*');         
            $('#lbl1').text('Video *');                 
            $('#lbl2').text('');                 
         }else{
            $('.typ-url').css('display','none');
            $('.typ-file').css('display','block'); 
            $('#Media').attr('accept','image/*');
            $('#lbl1').text('Image *');                 
            $('#lbl2').text("Choose file (allowed file type 'jpeg,jpg,png')");    
         }	  
	});
//       var original_img = $('#original_img3').prop('files')[0]; 
// 							var original_chng=$('#original_img3').attr('data-chng');


});// end off document ready


function ValidateForm(){
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
    
    if ($('#ProductId option:selected').val()==0) {
        $('#ProductId').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select Product'
        })
        return false;
    }


    if ($('#Media').get(0).files.length === 0 && $('#MediaType option:selected').val()=='IMG') {
        $('#Media').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Choose Image'
        })
        return false;
    }
    if ($('#Media').get(0).files.length === 0 && $('#MediaType option:selected').val()=='VIDEO') {
        $('#Media').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Choose Video'
        })
        return false;
    }
    if ($('#MediaType option:selected').val()=='URL') {
        $('#Media').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Url'
        })
        return false;
    }
     

    
    if ($('#IsActive option:selected').val()==0) {
        $('#IsActive').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select Is Active'
        })
        return false;
    }
}

function activeInactiveMedia(id,status)
{
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
    var basepath=$('#AdminBaseUrl').val();
	var form_data = new FormData();  
	form_data.append('ProductMediaId',id);
	form_data.append('Status',status);
	$.ajax({
        url: basepath +'productmedia/activeInactiveMedia',
        processData: false,
        contentType: false,
        type: 'post',
        data: form_data,
        success: function(result) {
            // console.log(result.status);        
            if (result.status==1) {
                $('#ActiveStatus_'+id).html();
                $('#ActiveStatus_'+id).html('<a  onclick="activeInactiveMedia('+id+',\''+result.IsActive+'\');" href="javascrip:void(0)"><img src="'+result.img+'" style="width: 23px;height: 23px;"></a>');
                Toast.fire({
                    icon: 'success',
                    title: result.msg
                })
                
            } else {
                Toast.fire({
                    icon: 'error',
                    title: result.msg
                })
            }                   
        }, 
        error: function (jqXHR, exception) {
        var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
        console.log(msg);  
        }
	});
    
}