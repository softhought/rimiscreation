<script src="<?php echo ASSETS_PATH; ?>js/user_view/product.js"></script>
<!-- END nav -->

 <div class="hero-wrap hero-bread" style="background-image: url('<?php echo SITE_ASSETS_PATH; ?>banner/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<!-- <div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?php echo base_url().$bodycontent['ProductData']['Img']; ?>" class="image-popup"><img src="<?php echo base_url().$bodycontent['ProductData']['Img']; ?>" class="img-fluid" alt="Rimi's Collection"></a>
    			</div>	-->



				<div class="simpleLens-gallery-container col-lg-6 mb-5" id="demo-1">
					<div class="simpleLens-container">
						<div class="simpleLens-big-image-container">
							<a class="simpleLens-lens-image" data-lens-image="<?php echo base_url().$bodycontent['ProductData']['Img']; ?>">
								<img src="<?php echo base_url().$bodycontent['ProductData']['Img']; ?>" class="simpleLens-big-image">
							</a>
						</div>
					</div>

					<div class="simpleLens-thumbnails-container margin-5">
						<?php foreach ($bodycontent['ProductData']['AllImg'] as $Img) {?>
							
							<a href="javascript:void(0);" class="simpleLens-thumbnail-wrapper"
							data-lens-image="<?php echo base_url().$Img->MediaPath; ?>"
							data-big-image="<?php echo base_url().$Img->MediaPath; ?>">
								<img height='30' width="35" src="<?php echo base_url().$Img->MediaPath; ?>">
							</a>
						<?php } ?>
						
					</div>
				</div>


    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $bodycontent['ProductData']['ProductName']; ?></h3>
    				<div class="rating d-flex">
							<!-- <p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="far fa-star"></span></a>
								<a href="#"><span class="far fa-star"></span></a>
								<a href="#"><span class="far fa-star"></span></a>
								<a href="#"><span class="far fa-star"></span></a>
								<a href="#"><span class="far fa-star"></span></a>
							</p> -->
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>Rs. <?php echo $bodycontent['ProductData']['Price']; ?></span></p>
    				<p class="">
						<span><?php if($bodycontent['ProductData']['Size']!=""){ echo '<strong>Size :</strong> '.$bodycontent['ProductData']['Size'];} ?></span>
						<span><?php if($bodycontent['ProductData']['Color']!=""){ echo '<strong>Color :</strong> '.$bodycontent['ProductData']['Color'];} ?></span>
					</p>
    				<p><?php echo $bodycontent['ProductData']['Product']; ?></p>
						 <div class="row mt-4">
							<!--<div class="col-md-6">
								<div class="form-group d-flex">
									<div class="select-wrap">
										<div class="icon"><span class="fas fa-sort-down"></span></div>
										<select name="" id="" class="form-control">
											<option value="">Small</option>
											<option value="">Medium</option>
											<option value="">Large</option>
											<option value="">Extra Large</option>
										</select>
									</div>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
							<i class="fas fa-minus"></i>
								</button>
								</span>
							<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="fas fa-plus"></i>
							</button>
							</span>
						</div> -->
						<!-- <div class="w-100"></div>
						<div class="col-md-12">
							<p style="color: #000;">80 piece available</p>
						</div> -->
					</div>
					
					<div id="appn_<?php echo $bodycontent['ProductData']['ProductId']; ?>">


					<?php 
                        $id=0;
                        foreach ($bodycontent['SessionData'] as $key => $val) {
                            if ($val['product'] === $bodycontent['ProductData']['ProductId']) {               
                                $id++;
                            }
                        }
                        if ($id!=0) {
                        	// echo $product['ProductId'].'p</br>';
                            foreach ($bodycontent['SessionData'] as $session) { 
                                if ($session['product']==$bodycontent['ProductData']['ProductId']) {
                                          
                    ?> 

						<p >
							<a data-text="<?php echo $bodycontent['ProductData']['ProductId']; ?>" href="javascript:void(0);" class="removecart_frm_view btn btn-black quantity-left-minus px-4 py-3 " style="">
								<span><i class="fas fas fa-minus ml-1"></i></span>
							</a>
							<a href="javascript:void(0);" class="add-to-cart text-center vertical-align-middle">
								<input readonly id="count_<?php echo $bodycontent['ProductData']['ProductId']; ?>" type="text" class="cart-count input-number" value="<?php echo $session['count']; ?>" style="height: 50px;text-align: center;">
							</a>
							<a data-text="<?php echo $bodycontent['ProductData']['ProductId']; ?>" href="javascript:void(0);" class="addcart_frm_view  btn btn-black quantity-left-minus px-4 py-3 ">
								<span><i class="fas fas fa-plus ml-1"></i></span>
							</a>
						</p>

					<?php }}} else { ?>

                        <p>
							<a href="javascript:void(0);" data-text="<?php echo $bodycontent['ProductData']['ProductId']; ?>" class="btn btn-black py-3 AddCart_frm_view px-5">Add to Cart</a>
							<a href="<?php echo base_url(); ?>checkout" class="btn btn-black py-3 px-5">Buy now</a>
						</p>

					<?php } ?>

					</div>

					





				</div>
					</div>
    	</div>
    </section>

    <!-- <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Ralated Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="img/18.jpg" alt="Rimi's Collection">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Bag</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">Rs.120.00</span><span class="price-sale">Rs.80.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="fas fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    							</p>
	    						</div>
	    					</div>
	    					<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="fas fa-plus ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="fas fa-shopping-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="img/19.jpg" alt="Rimi's Collection">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Bag</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>Rs.120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="fas fa-plus ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="fas fa-shopping-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="img/20.jpg" alt="Rimi's Collection">
	    					<div class="overlay"></div>
	    				</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Bag</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>Rs.120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="fas fa-plus ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="fas fa-shopping-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="img/p3.png" alt="Rimi's Collection">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#">Bag</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>Rs.120.00</span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    								<a href="#"><span class="far fa-star"></span></a>
	    							</p>
	    						</div>
	    					</div>
    						<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="fas fa-plus ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Buy now<span><i class="fas fa-shopping-cart ml-1"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> -->
