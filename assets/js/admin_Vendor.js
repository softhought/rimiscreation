$(document).ready(function () {

    



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
     if ($('#BusinessName').val()==0) {
        $('#BusinessName').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Business Name'
        })
        return false;
    }
    if ($('#Address').val()=="") {
        $('#Address').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Address'
        })
        return false;
    }
   
    if ($('#BusinessAddress').val()==0) {
        $('#BusinessAddress').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Business Address'
        })
        return false;
    }
    if ($('#PanNo').val()=="") {
        $('#PanNo').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter  PAN'
        })
        return false;
    }
    if ($('#GstNo').val()==0) {
        $('#GstNo').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter GST'
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