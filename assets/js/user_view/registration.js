$(document).ready(function () {

    var basepath=$('#BaseUrl').val();


  $(document).on('submit','#signupForm',function(e){
		e.preventDefault();

		if(validateSignup())
		{

            var formDataserialize = $("#signupForm").serialize();
            formDataserialize = decodeURI(formDataserialize);
            console.log(formDataserialize);

            var formData = { formDatas: formDataserialize };
            var type = "POST"; //for creating new resource
            var urlpath = basepath + 'registration/signup_action';
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
							
                 	  window.location.href = basepath + 'home';

                    } 
					else {
                       


                    }
					
                    $("#loaderbtn").css('display', 'none');
					
                    $("#materialsavebtn").css({
                        "display": "block",
                        "margin": "0 auto"
                    });
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                }
            });
            
            
            
			
		}

    });



  		$(document).on('submit','#signinForm',function(e){
		e.preventDefault();
		
		$("#error_msg").text("")
		if(loginRequired())
		{
			var formData = $("#signinForm" ).serialize();
			formData = decodeURI(formData);
			 
			$("#verifying-account").css("display","block");
			$("#loginBtn").css("display","none");
			$.ajax({
				type: "POST",
				url: basepath + 'signin/verifyLogin',
				dataType: "json",
				contentType: "application/x-www-form-urlencoded; charset=UTF-8",
				data: {formDatas:formData},
				success: function (result) 
				{
					if(result.msg_status == 1)
					{
						window.location=basepath + 'home';
					}
					else
					{
						$("#error_msg").text(result.msg_data);
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
					alert(msg);
				}
			});
		}	
		
		
	});








}); // end of document ready




function validateSignup()
{
    
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var display_name = $("#display_name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    var t_and_c = $("input[name*='t_and_c']:checked").length

   
   

    $("#first_name,#last_name,#display_name,#email,#password,#password_confirmation").text("").css("dispaly", "none").removeClass("form_error");

    if(first_name=="")
    {
        $("#first_name").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(last_name=="")
    {
        $("#last_name").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(display_name=="")
    {
        $("#display_name").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(email=="")
    {
        $("#email").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }

    if(password=="")
    {
        $("#password").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(password_confirmation=="")
    {
        $("#password_confirmation").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(password != password_confirmation)
    {   
        $("#password_confirmation").focus();
        $("#error_msg")
        .text('Confirm password not matched')
        .css("display", "block");
        return false;
    }


    if(t_and_c=="")
    {
        $("#t_and_c").focus();
        $("#error_msg")
        .addClass("form_error")
        .text('Please Term and Condition check box')
        .css("display", "block");
        return false;
    }





	return true;
}



function loginRequired()
{
    
    var email = $("#email").val();
    var password = $("#password").val();
   

    $("#email,#password").text("").css("dispaly", "none").removeClass("form_error");

    if(email=="")
    {
        $("#email").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }


    if(password=="")
    {
        $("#password").focus();
        $("#error_msg")
        .addClass("form_error")
        .css("display", "block");
        return false;
    }



	return true;
}