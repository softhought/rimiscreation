$(document).ready(function () {

    $(document).on('change','#CategoryId',function(){        
        // alert( $('#CategoryId option:selected').attr('data-text'));
       var HavingSubCategory= $('#CategoryId option:selected').attr('data-text');
       if (HavingSubCategory=='Y') {
            $('#SubCategoryIdDisplay').css('display','block');
       } else{
            $('#SubCategoryIdDisplay').css('display','none');
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
    
    if ($('#ProductName').val()=="") {
        $('#ProductName').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Name'
        })
        return false;
    }
    if ($('#Price').val()=="") {
        $('#Price').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter Price'
        })
        return false;
    }
    if ($('#CategoryId option:selected').val()==0) {
        $('#CategoryId').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select Category'
        })
        return false;
    }
    if ( $('#CategoryId option:selected').attr('data-text')=="Y" && $('#SubCategoryId option:selected').val()==0) {
        $('#SubCategoryId').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select Sub Category'
        })
        return false;
    }
    if ($('#VendorId option:selected').val()==0) {
        $('#VendorId').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select Vendor'
        })
        return false;
    }
    if ($('#BrandId option:selected').val()==0) {
        $('#BrandId').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select Brand'
        })
        return false;
    }
    if ($('#Description').val()=="") {
        $('#Description').focus().addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Enter  Description'
        })
        return false;
    }
    if ($('#InStock option:selected').val()==0) {
        $('#InStock').addClass("err-border");
        Toast.fire({
            icon: 'error',
            title: 'Select InStock'
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