$(document).ready(function () {

    var basepath=$('#BaseUrl').val();

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    $(document).on('click','.catagory',function(){
        var Catagoryid=$(this).attr('data-text');
        // alert(Catagoryid);
        if(Catagoryid!="")
        {
            var form_data = new FormData();  
            form_data.append('CatagoryId',Catagoryid);
            $.ajax({
                url: basepath +'home/getproductByCatagoryId',
                processData: false,
                contentType: false,
                type: 'post',
                data: form_data,
                success: function(result) {
                    
                        $('#Products').html('');
                        $('#Products').html(result);       
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
    });

    $(document).on('click','.sub_catagory',function(){
        var SubCategoryId=$(this).attr('data-text');
        // alert(Catagoryid);
            var form_data = new FormData();  
            form_data.append('SubCategoryId',SubCategoryId);
            $.ajax({
                url: basepath +'home/getproductBySubCatagoryId',
                processData: false,
                contentType: false,
                type: 'post',
                data: form_data,
                success: function(result) {
                    
                        $('#Products').html('');
                        $('#Products').html(result);       
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
    });

    $(document).on('click','.AddCart',function(){
        var ProductId=$(this).attr('data-text');
        // alert(Catagoryid);
            var form_data = new FormData();  
            form_data.append('ProductId',ProductId);
            $.ajax({
                url: basepath +'cart/addToCart',
                processData: false,
                contentType: false,
                type: 'post',
                data: form_data,
                success: function(result) {
                    // alert(result.CartCount);
                    Toast.fire({
                        icon: 'success',
                        title: 'Item Added To Cart'
                    })
                     $('#CartCount').html('');
                        $('#CartAmt').html('');    
                        $('#CartCount').html(result.CartCount);
                        $('#CartAmt').html('<i class="fas fa-rupee-sign"></i>'+result.CartAmt);       
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
    });




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