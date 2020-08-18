$(document).ready(function () {

    
    $(document).on('change','#Logo',function(){
		  $('#Logo').attr('data-chng','Y');
          if ($('#Logo').attr('data-mode')=='EDIT') {
              $('#original_chng').val('Y');
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
    
    if ($('#Name').val()=="") {
        $('#Name').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Name'
        })
        return false;
    }

    if ($('#Logo').get(0).files.length === 0 && $('#Logo').attr('data-mode')=='ADD') {
        $('#Logo').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Choose a Logo'
        })
        return false;
    }
    if ($('#Logo').attr('data-chng')=='Y') {
        if ($('#Logo').get(0).files.length === 0) {
            $('#Logo').addClass("err-border");
            Toast.fire({
                icon: 'error',
                title: 'Choose a Logo'
            })
            return false;
        }
        return true
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