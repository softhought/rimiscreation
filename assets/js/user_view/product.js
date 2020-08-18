$(document).ready(function () {

    var basepath=$('#BaseUrl').val();

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });


    $('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif',
        show_event: 'click'
    });

    $('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

    //   $(document).on('click','.AddCart',function(){
    //     var ProId=$(this).attr('data-text');
    //     // alert(ProId);
    //     var html="";
    //     html='<div class="bottom-area d-flex px-3"><a data-text="'+ProId+'" href="javascript:void(0);" class="removecart add-to-cart text-center plus-minus-btn-center mr-1" style=""><span><i class="fas fas fa-minus ml-1"></i></span></a><a href="javascript:void(0);" class="add-to-cart text-center mr-1"><input readonly id="count_'+ProId+'" type="text" class="cart-count" value="1" style="height: 50px;text-align: center;"></a><a data-text="'+ProId+'" href="javascript:void(0);" class="addcart add-to-cart text-center plus-minus-btn-center mr-1"><span><i class="fas fas fa-plus ml-1"></i></span></a></div>';
    //     $('#appn_'+ProId).html('');
    //     $('#appn_'+ProId).html(html);

    // });


    $(document).on('click','.addcart',function(){
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

    $(document).on('click','.removecart',function(){
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
                    if (Count>0) {
                        $('#count_'+ProId).val(Count);
                    } else {            
                        html='<p  class="bottom-area d-flex px-3"><a href="javascript:void(0);" data-text="'+ProId+'" class="add-to-cart AddCart text-center py-2 mr-1"><span>Add to cart <i class="fas fas fa-plus ml-1"></i></span></a><a href="'+basepath+'cart" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a></p>';
                        $('#appn_'+ProId).html('');
                        $('#appn_'+ProId).html(html);
                    }

                    $('#CartCount').html('');
                    $('#CartAmt').html('');    
                    $('#CartCount').html(result.CartCount);
                    $('#CartAmt').html('<i class="fas fa-rupee-sign"></i>'+result.TotalCartAmount); 
                    Toast.fire({
                        icon: 'success',
                        title: 'Item Removed from Cart'
                    })
                    // location.reload();   
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

    $(document).on('click','.catagory',function(){
        var Catagoryid=$(this).attr('data-text');
        // alert(Catagoryid);
        if(Catagoryid!="")
        {
            var form_data = new FormData();  
            form_data.append('CatagoryId',Catagoryid);
            $.ajax({
                url: basepath +'product/getproductByCatagoryId',
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
                url: basepath +'product/getproductBySubCatagoryId',
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
                    var html="";
                        html='<div class="bottom-area d-flex px-3"><a data-text="'+ProductId+'" href="javascript:void(0);" class="removecart add-to-cart text-center plus-minus-btn-center mr-1" style=""><span><i class="fas fas fa-minus ml-1"></i></span></a><a href="javascript:void(0);" class="add-to-cart text-center mr-1"><input readonly id="count_'+ProductId+'" type="text" class="cart-count" value="1" style="height: 50px;text-align: center;"></a><a data-text="'+ProductId+'" href="javascript:void(0);" class="addcart add-to-cart text-center plus-minus-btn-center mr-1"><span><i class="fas fas fa-plus ml-1"></i></span></a></div>';
                        $('#appn_'+ProductId).html('');
                        $('#appn_'+ProductId).html(html);

                     $('#CartCount').html('');
                        $('#CartAmt').html('');    
                        $('#CartCount').html(result.CartCount);
                        $('#CartAmt').html('<i class="fas fa-rupee-sign"></i>'+result.TotalCartAmount);       
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


    $(document).on('click','.AddCart_frm_view',function(){
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
                    
                    var html="";
                        html='<p ><a data-text="'+ProductId+'" href="javascript:void(0);" class="removecart_frm_view btn btn-black quantity-left-minus px-4 py-3 mr-1" style=""><span><i class="fas fas fa-minus ml-1"></i></span></a><a href="javascript:void(0);" class="add-to-cart text-center vertical-align-middle mr-1"><input readonly id="count_'+ProductId+'" type="text" class="cart-count input-number" value="1" style="height: 50px;text-align: center;"></a><a data-text="'+ProductId+'" href="javascript:void(0);" class="addcart_frm_view  btn btn-black quantity-left-minus px-4 py-3  mr-1"><span><i class="fas fas fa-plus ml-1"></i></span></a></p>';
                        
                        $('#appn_'+ProductId).html('');
                        $('#appn_'+ProductId).html(html);

                     $('#CartCount').html('');
                        $('#CartAmt').html('');    
                        $('#CartCount').html(result.CartCount);
                        $('#CartAmt').html('<i class="fas fa-rupee-sign"></i>'+result.TotalCartAmount);   

                    Toast.fire({
                        icon: 'success',
                        title: 'Item Added To Cart'
                    })    
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

$(document).on('click','.addcart_frm_view',function(){
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

    $(document).on('click','.removecart_frm_view',function(){
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
                    if (Count>0) {
                        $('#count_'+ProId).val(Count);
                    } else {            
                        html='<p><a href="javascript:void(0);" class="btn btn-black py-3 AddCart_frm_view px-5 waves-effect waves-light mr-1">Add to Cart</a><a href="'+basepath+'cart/checkout" class="btn btn-black py-3 px-5 waves-effect waves-light mr-1">Buy now</a></p>';
                        $('#appn_'+ProId).html('');
                        $('#appn_'+ProId).html(html);
                    }

                    $('#CartCount').html('');
                    $('#CartAmt').html('');    
                    $('#CartCount').html(result.CartCount);
                    $('#CartAmt').html('<i class="fas fa-rupee-sign"></i>'+result.TotalCartAmount); 
                    Toast.fire({
                        icon: 'success',
                        title: 'Item Removed from Cart'
                    })
                    // location.reload();   
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