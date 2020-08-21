$(document).ready(function () {

    var basepath=$('#BaseUrl').val();

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    $('input:radio[name="address"]').change(function(){
        // alert('hh');
        $('.dlvr_hr_btn').css('display','');
    });

    $(document).on('click','#dlvr_hr_btn',function(){
        var addressId = $("input[type='radio'][name='address']:checked").val();
        var address = $("input[type='radio'][name='address']:checked").attr('data-add');
        var username = $("input[type='radio'][name='address']:checked").attr('data-usr');
        var html='<br><span id="" class="title pl-2"><strong>'+username+'</strong>'+address+'</span>';
        $('#address_card_header').append(html);
        $('#address_card_header').attr('aria-expanded','false');
        $('#address_card_header').addClass('collapsed');
        $('#address_card_body').removeClass('show');

        $('#order_summery_header').attr('aria-expanded','true');
        $('#order_summery_header').removeClass('collapsed');
        $('#order_summery_body').addClass('show');

        // alert(addressId);

        
    });


    $(document).on('click','#ContinuePay',function(){
        
        var itemCount=$('#order_summery_body').attr('data-item');
        $('#order_summery_header').attr('aria-expanded','false');
        $('#order_summery_header').addClass('collapsed');
        $('#order_summery_body').removeClass('show');
        var html='<br><span id="" class="title pl-2"><strong>'+itemCount+' </strong> Item(s)</span>';
        $('#order_summery_header').append(html);

        $('#payment_option_header').attr('aria-expanded','true');
        $('#payment_option_header').removeClass('collapsed');
        $('#payment_option_body').addClass('show');

        // alert(addressId);

        
    });


    $(document).on('click','#add_address',function(){
        $( "#SelectaddressDiv" ).css('display','none');
        $( "#addaddressDiv" ).css('display','');
    });
    $(document).on('click','#cancle',function(){
        $( "#SelectaddressDiv" ).css('display','');
        $( "#addaddressDiv" ).css('display','none');
    });


    $(document).on('keyup','#contact_no',function(e){
        e.preventDefault();         
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
        {                
            $('#contact_no').val($('#contact_no').val().replace(/[^\d.]/g, ''));
        }        
    });

    $(document).on('keyup','#alt_contact_no',function(e){
        e.preventDefault();         
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
        {                
            $('#alt_contact_no').val($('#alt_contact_no').val().replace(/[^\d.]/g, ''));
        }        
    });


    $(document).on('submit','#addAddress',function(e){
		e.preventDefault();

		if(validate())
		{

            var formDataserialize = $("#addAddress").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            var type = "POST"; //for creating new resource
            var urlpath = basepath + 'checkout/AddNewAddress';
           // $("#regsavebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');

            $.ajax({
                type: type,
                url: urlpath,
                data: formData,
                dataType: 'json',
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function(result) {
					if (result.msg_status == 1) {						
                 	   Toast.fire({
                            icon: 'success',
                            title: result.msg_data
                        })  
                            window.location.href = basepath + 'checkout';                       

                    }else if(result.msg_status == 22){
                        Toast.fire({
                            icon: 'error',
                            title: result.msg_data
                        }) 
                        window.location.href = basepath + 'signin';  
                    } else {
                       
                        Toast.fire({
                            icon: 'error',
                            title: result.msg_data
                        })

                    }
					
                    $("#loaderbtn").css('display', 'none');
					
                    
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                }
            });
            
            
            
			
        }
    });







});// end off document ready


function validate(){
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      $(".is-invalid").removeClass("is-invalid");
    if ($('#name').val()=="") {
        $('#name').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Enter Name'
        })
        return false;
    }
    if ($('#contact_no').val()=="") {
        $('#contact_no').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Enter Mobile Number'
        })
        return false;
    }

    if ($('#contact_no').val()!="" && $('#contact_no').val().length>10 || $('#contact_no').val().length<10) {
        $('#contact_no').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Enter Valide 10 Digit Mobile Number'
        })
        return false;
    }

    if ($('#address').val()=="") {
        $('#address').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Enter Address'
        })
        return false;
    }
    if ($('#city').val()=="") {
        $('#city').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Enter City'
        })
        return false;
    }
    if ($('#state_id option:selected').val()=="") {
        $('#state_id').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Select State'
        })
        return false;
    }
    if ($('#pincode').val()=="") {
        $('#pincode').focus().addClass("is-invalid");
        Toast.fire({
            icon: 'error',
            title: 'Enter Pincode'
        })
        return false;
    }
    return true;
}