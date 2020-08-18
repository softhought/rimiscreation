<script src="<?php echo ASSETS_PATH; ?>js/user_view/cart.js"></script>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo SITE_ASSETS_PATH; ?>banner/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    
	<section class="ftco-section">
      <div class="container-fluid d-flex">
      	<div class="col-md-8">
        <div class="row justify-content-center">

		<div class="col-xl-12 ftco-animate fadeInUp ftco-animated">
    				<div class="">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <!-- <th>Image</th>						         -->
						        <th colspan="2">Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>					     
                                <?php 
                                 $SubTotal=0;
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
						        
						        <td class="price"><?php echo $item['Price']; ?></td>
						        
						        <td class="">

						        	

									  <p>
										<a data-text="<?php echo $item['ProductId']; ?>" href="javascript:void(0);" class="removecart_frm_cart btn btn-black quantity-left-minus " style="">
											<span><i class="fas fas fa-minus ml-1"></i></span>
										</a>
										<a href="javascript:void(0);" class="add-to-cart text-center vertical-align-middle">
											<input readonly id="count_<?php echo $item['ProductId']; ?>" type="text" class="cart-count input-number" value="<?php echo $item['CartCount']; ?>" style="height: 34px;width: 74px;border-radius: .25rem;text-align: center;">
										</a>
										<a data-text="<?php echo $item['ProductId']; ?>" href="javascript:void(0);" class="addcart_frm_cart  btn btn-black quantity-left-minus ">
											<span><i class="fas fas fa-plus ml-1"></i></span>
										</a>
									</p>
					            </td>
						        
						        <td class="total"><?php echo $item['CartTotalPrice']; ?></td>
						        <td class="product-remove">
                                    <a class="RemoveCart" id="pro_<?php echo $item['ProductId']; ?>" data-text="<?php echo $item['ProductId']; ?>" href="javascript:void(0);">
										<span class="fas fa-times"></span>
									</a>
                                </td>


						      </tr><!-- END TR-->

                              <?php } ?>

						    </tbody>
						  </table>
					  </div>
    			</div>
         
		 
        </div> <!-- .col-md-8 -->
        </div>
        <div class="col-md-4">
        	<div class="row pt-3 justify-content-center">
    			<div class="col-md-9 ftco-animate fadeInUp ftco-animated">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rs.<?php echo $SubTotal; ?></span>
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
    						<span>Total</span>
    						<span>Rs.<?php echo $SubTotal; ?></span>
    					</p>
    				</div>
    				<p class="text-center"><a href="<?php echo base_url(); ?>cart/checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>


      </div>
    </section>