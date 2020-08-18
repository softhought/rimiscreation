$(document).ready(function () {

    var basepath=$('#BaseUrl').val();

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });


    $(document).on('click','.addcart_frm_cart',function(){
        var ProId=$(this).attr('data-text');
        var Count=$('#count_'+ProId).val();       
       var form_data = new FormData();  
            form_data.append('ProductId',ProId);
            $.ajax({
                url: basepath +'cart/addToCart',
                processData: false,
                contentType: false,
                type: 'post',
                data: form_data,
                success: function(result) {
                    // alert(result.CartCount);         
                    $('#count_'+ProId).val(parseInt(Count)+1);

                    $('#CartCount').html('');
                    $('#CartAmt').html('');    
                    $('#CartCount').html(result.CartCount);
                    $('#CartAmt').html('<i class="fas fa-rupee-sign"></i>'+result.TotalCartAmount); 

                    Toast.fire({
                        icon: 'success',
                        title: 'Item Added To Cart'
                    })      
                    location.reload(); 
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
    
    $(document).on('click','.RemoveCart',function(){
        var ProductId=$(this).attr('data-text');
        // alert(Catagoryid);
        var RemoveMode="Product";
            var form_data = new FormData();  
            form_data.append('ProductId',ProductId);
            form_data.append('RemoveMode',RemoveMode);
            $.ajax({
                url: basepath +'cart/RemoveCart',
                processData: false,
                contentType: false,
                type: 'post',
                data: form_data,
                success: function(result) {
                    // alert(result.CartCount);
                    Toast.fire({
                        icon: 'success',
                        title: 'Item Removed from Cart'
                    })
                    location.reload();
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



    $(document).on('click','.removecart_frm_cart',function(){
        var html="";
        var ProId=$(this).attr('data-text');
        var currentCount=$('#count_'+ProId).val();
        var Count=parseInt(currentCount)-1;
        if (Count>0) {
            var RemoveMode="Count";
        } else {
            var RemoveMode="Product";
        }
       

        // var ProductId=$(this).attr('data-text');
        // alert(Catagoryid);
            var form_data = new FormData();  
            form_data.append('ProductId',ProId);
            form_data.append('RemoveMode',RemoveMode);
            $.ajax({
                url: basepath +'cart/RemoveCart',
                processData: false,
                contentType: false,
                type: 'post',
                data: form_data,
                success: function(result) {
                    // alert(result.CartCount);
                    Toast.fire({
                        icon: 'success',
                        title: 'Item Removed from Cart'
                    })
                    location.reload();   
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

