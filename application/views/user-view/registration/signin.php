<script src="<?php echo ASSETS_PATH; ?>js/user_view/registration.js"></script>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo SITE_ASSETS_PATH; ?>banner/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Login</span></p>
            <h1 class="mb-0 bread">Login</h1>
          </div>
        </div>
      </div>
    </div>
      <?php 
              $attr = array("id"=>"signinForm","name"=>"signinForm");
              echo form_open('',$attr); ?>
              <input type="hidden" id="redirectPath" value="<?php echo $bodycontent['redirectPath']; ?>">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">
							<div id="logreg-forms">
        <form class="form-signin">
        
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <!-- <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
            </div>
            <p style="text-align:center"> OR  </p> -->
            <div class="form-group">
	                	
	                  <input type="email" id="email" name="email" class="form-control" placeholder="Email address"  autofocus="">
	                </div>

			<div class="form-group">
	                	
	                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
	                </div>
            
            
             <p id="error_msg"></p>
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <!-- <a href="#" id="forgot_pswd">Forgot password?</a> -->
            <hr>
            <!-- <p>Don't have an account!</p>  --> 
            <a href="<?php echo base_url();?>registration" >
            <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button>
          </a>
      </form>

            <!-- <form action="/reset/password/" class="form-reset">
                <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
            </form> -->
            
           
            
    </div>
	          	
	        



	          
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

     <?php echo form_close(); ?>



<script type="text/javascript">
	function toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}


$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    
})
</script>