$(document).ready(function () {

$(document).on('keyup','#AppearanceSerial',function(e){
        e.preventDefault();         
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
        {                
            $('#AppearanceSerial').val($('#AppearanceSerial').val().replace(/[^\d.]/g, ''));
        }        
    });

    



});// end off document ready

function ValidateForm(){
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    if ($('#Description').val()=="") {
        $('#Description').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Description'
        })
        return false;
    }
    if ($('#AppearanceSerial').val()=="") {
        $('#AppearanceSerial').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Appearance Serial No.'
        })
        return false;
    }
}