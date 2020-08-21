
    <style>
    .card {
        margin-bottom: 15px;
    }
    .card-header {
      padding: 0rem !important;
    }

    .icon-action {
        margin-top: 5px;
        float: right;
        font-size: 80%;
    }

    
    .expended-color{
      background-color: #c06d4f !important;
      padding: .75rem 1.25rem;
      color: #efcaa5 !important;
      border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }
    .collapsed{
      background-color: #ffffff !important;
      padding: .75rem 1.25rem;
      color: #000000 !important;
      border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

	.display-inline{
		display: inline !important;
	}


    </style>
    <script src="<?php echo ASSETS_PATH; ?>js/user_view/checkout.js"></script>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo SITE_ASSETS_PATH; ?>banner/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container-fluid d-flex">
      	<div class="col-md-8">
        <div class="row justify-content-center">
         
		



<aside class="col-sm-12">


<div class="card">
	<header class="card-header">
		<div role="button" data-toggle="" data-target="#collapse11" aria-expanded="true" class=" expended-color <?php if (sizeof($bodycontent['UserSessionData'])>0) { echo ' collapsed'; }?>">
			<i class="icon-action fa fa-chevron-down"></i>
			<span class="title text-uppercase">Login </span>
			<?php if (sizeof($bodycontent['UserSessionData'])>0) {?><br>
				<span class="title pl-2"><strong><?php echo $bodycontent['UserSessionData']['username']; ?></strong> <?php echo " ".$bodycontent['UserSessionData']['useremail']; ?></span>
			<?php } ?>
			
		</div>
	</header>
	<div class="collapse <?php if (sizeof($bodycontent['UserSessionData'])==0) { echo ' show'; }?> " id="collapse11" style="">
		<article class="card-body">
			<div class="pl-5">
				<form name="login" class="display-inline" action="<?php echo base_url(); ?>signin" method="post">
					<input type="hidden" name="redirectPath" value="<?php echo base_url(); ?>checkout">
					<button type="submit" class="btn btn-primary py-2 px-4 waves-effect  text-uppercase waves-light">Login</button>
				</form>
					<span class="pl-2 pr-2 display-inline"><strong>or</strong></span>
				<form name="signup" action="<?php echo base_url(); ?>registration" method="post" class="display-inline">
					<input type="hidden" name="redirectPath" value="<?php echo base_url(); ?>checkout">
					<button type="submit" class="btn btn-primary py-2 px-4 waves-effect  text-uppercase waves-light">Sign Up</button>
				</form>
			</div>

		</article> <!-- card-body.// -->
	</div> <!-- collapse .// -->
</div> <!-- card.// -->

<div class="card" > 
	<header class="card-header">
		<div id="address_card_header" data-toggle="" data-target="#collapse22" aria-expanded="true" class="expended-color <?php if (sizeof($bodycontent['UserSessionData'])==0) { echo ' collapsed'; }?>">
			<i class="icon-action fa fa-chevron-down"></i>
			<span class="title text-uppercase">Delevery Address</span>
		</div>
	</header>
	<div id="address_card_body" class="collapse <?php if (sizeof($bodycontent['UserSessionData'])>0) { echo ' show'; }?>" id="collapse22" style="">
		<article class="card-body">		

		<div id="SelectaddressDiv" >	
			<form action="">
			<?php if (sizeof($bodycontent['UserAddress'])>0) { 
					foreach ($bodycontent['UserAddress'] as $user) { ?>
					<p>
						<input class="address" data-add="<?php echo $user->address; ?>" data-usr="<?php echo $bodycontent['UserSessionData']['username']; ?>" type="radio" id="address_<?php echo $user->UserAddressId; ?>" name="address" value="<?php echo $user->UserAddressId; ?>">
						<label for="address_<?php echo $user->UserAddressId; ?>"><?php echo $user->address; ?></label>
					</p> 
				
				<?php } ?> 
				<p>
					<a href="javascript:void(0);" style="display:none;" id="dlvr_hr_btn" class=" dlvr_hr_btn btn btn-primary py-2 px-4 waves-effect waves-light">Delever Here</a>
					<a href="javascript:void(0);" id="add_address" class=" btn btn-primary py-2 px-4 waves-effect waves-light">+ New Address</a>
				</p> 
			<?php }else{ ?>
				<p>
					<a href="javascript:void(0);" id="add_address" class="btn btn-primary py-2 px-4 waves-effect waves-light">+ New Address</a>
				</p> 
			<?php } ?>
			</form>	
		</div>





<div id="addaddressDiv" style="display:none;">
	<form action="" name="addAddress" id="addAddress">
	<div class="form-row">
		<div class="form-group col-md-6">
		<label for="name">Name *</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="">
		</div>
		<div class="form-group col-md-6">
		<label for="contact_no">Mobile No. *</label>
		<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="">
		</div>
	</div>
	<div class="form-group">
		<label for="address">Address *</label>
		<textarea class="form-control" id="address" name="address"  rows="3"></textarea>
	</div>
	<div class="form-row">
	<div class="form-group col-md-6">
		<label for="landmark">Landmark (Optional)</label>
		<input type="text" class="form-control" id="landmark" name="landmark" placeholder="">
		</div>
		<div class="form-group col-md-6">
		<label for="contact_no">Alternate Mobile No. (Optional)</label>
		<input type="text" class="form-control" name="alt_contact_no" id="alt_contact_no" placeholder="">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-4">
		<label for="city">City *</label>
		<input type="text" class="form-control" name="city" id="city">
		</div>
		<div class="form-group col-md-4">
		<label for="state_id">State *</label>
		<select data-live-search="true" data-live-search-placeholder="Search State"  name="state_id" id="state_id" class="form-control selectpicker">
			<option value=""></option>
			<?php foreach ($bodycontent['StateList'] as $state) { ?>
				<option value="<?php echo $state->StateId ; ?>"><?php echo $state->Name ; ?></option>
			<?php } ?>
		</select>
		</div>
		<div class="form-group col-md-4">
		<label for="pincode">Pincode *</label>
		<input type="text" name="pincode" class="form-control" id="pincode">
		</div>
	</div>

	<button type="submit" class="btn btn-primary">Save Address</button>
	<button type="button" id="cancle"  class="btn btn-primary">Cancel</button>
	</form>
</div>



			
		</article> <!-- card-body.// -->
	</div> <!-- collapse .// -->
</div> <!-- card.// -->

<div class="card" >
	<header class="card-header">
		<div id="order_summery_header" data-toggle="" data-target="#collapse33" aria-expanded="false" class="expended-color collapsed">
			<i class="icon-action fa fa-chevron-down"></i>
			<span class="title text-uppercase">Order Summary</span>
		</div>
	</header>
	<div id="order_summery_body" data-item="<?php echo $bodycontent['CartProductCount']; ?>" class="collapse" id="collapse33" style="">
		<article class="card-body">
			<table class="table">
			<?php 
								$SubTotal=0;
								if(sizeof($bodycontent['CartItemList'])>0){
                                 
                                 foreach ($bodycontent['CartItemList'] as $item) {
                                    $SubTotal+=$item['CartTotalPrice'];
                                ?>
                                   
                                
						        <tr class="text-center">
						       
						        
						        <td class="image-prod">
                                    <div class="img" style="background-image:url(<?php echo base_url().$item['Img']; ?>);"></div>
                                    
                                </td>
						        
						        <td class="product-name">
						        	<h3><?php echo $item['ProductName']; ?></h3>
						        	<!-- <p><?php echo $item['Description']; ?></p> -->
						        </td>
						        
						        <td class="price"><?php echo $item['Price']." x ".$item['CartCount']; ?></td>
						        
						        <td class="total"><?php echo $item['CartTotalPrice']; ?></td>						       


						      </tr><!-- END TR-->

                              <?php } }?>
			</table>
			<p class="pl-5">
				<a href="javascript:void(0);" id="ContinuePay" class="btn btn-primary py-2 px-4 waves-effect waves-light">Continue</a>
			</p>
		</article> <!-- card-body.// -->
	</div> <!-- collapse .// -->
</div> <!-- card.// -->

<div class="card" >
	<header class="card-header">
		<div id="payment_option_header" data-toggle="" data-target="#collapse44" aria-expanded="false" class="expended-color collapsed">
			<i class="icon-action fa fa-chevron-down"></i>
			<span class="title text-uppercase">Payment Options</span>
		</div>
	</header>
	<div id="payment_option_body" class="collapse" id="collapse44" style="">
		<article class="card-body">

		<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
									</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> COD</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#" class="btn btn-primary py-2 px-4 waves-effect waves-light">Place an order</a></p>

		</article> <!-- card-body.// -->
	</div> <!-- collapse .// -->
</div> <!-- card.// -->



	</aside> <!-- col.// -->



        </div>
        </div>
        <div class="col-md-4">
        	<div class="row mt-5 pt-3 justify-content-center">
	          	<div class="col-md-12 ftco-animate fadeInUp ftco-animated">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>Rs. <?php echo $SubTotal; ?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>Rs.0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>Rs.0.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Payable Amount</span>
		    						<span>Rs. <?php echo $SubTotal; ?></span>
		    					</p>
								</div>
	          	</div>
	          
	          </div>
        </div>

      </div>
    </section>






	<script>
  $( function() {
   
  

    // $("#collapse11").hide();
  } );
  </script>