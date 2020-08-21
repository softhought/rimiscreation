<script src="<?php echo ASSETS_PATH; ?>js/user_view/product.js"></script>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo SITE_ASSETS_PATH; ?>banner/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products List</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div  class="row">
    			<div id="Products" class="col-md-8 col-lg-10 order-md-last">
    				<div class="row" >


                        <?php foreach ($bodycontent['ProductList'] as $product) { ?>                           
                        
                            <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                                <div class="product">
                                    <a href="<?php echo base_url().'product/view/'.$product['ProductId'];?>" class="img-prod"><img class="img-fluid" src="<?php echo base_url().$product['Img']; ?>" alt="Rimi's Collection">
                                        <!-- <span class="status">30%</span> -->
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 px-3">
                                        <h3><a href="<?php echo base_url().'product/view/'.$product['ProductId'];?>"><?php echo $product['ProductName']; ?></a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price">
                                                    <!-- <span class="mr-2 price-dc">$120.00</span> -->
                                                    <i class="fas fa-rupee-sign"></i>
                                                    <span class="price-sale"><?php echo $product['Price']; ?></span>
                                                </p>
                                            </div>
                                            <!-- <div class="rating">
                                                <p class="text-right">
                                                    <a href="#"><span class="far fa-star"></span></a>
                                                    <a href="#"><span class="far fa-star"></span></a>
                                                    <a href="#"><span class="far fa-star"></span></a>
                                                    <a href="#"><span class="far fa-star"></span></a>
                                                    <a href="#"><span class="far fa-star"></span></a>
                                                </p>
                                            </div> -->
                                        </div>
                                        <div id="appn_<?php echo $product['ProductId'];?>">

                                        <?php 
                                          $id=0;
                                          foreach ($bodycontent['SessionData'] as $key => $val) {
                                            if ($val['product'] === $product['ProductId']) {               
                                                $id++;
                                            }
                                          }
                                          if ($id!=0) {
                                            // echo $product['ProductId'].'p</br>';
                                            foreach ($bodycontent['SessionData'] as $session) { 
                                              if ($session['product']==$product['ProductId']) {
                                          
                                        ?> 


                                          <div class="bottom-area d-flex px-3">
                                            <a data-text="<?php echo $product['ProductId']; ?>" href="javascript:void(0);" class="removecart add-to-cart text-center plus-minus-btn-center mr-1" style="">
                                              <span><i class="fas fas fa-minus ml-1"></i></span>
                                            </a>
                                            <a href="javascript:void(0);" class="add-to-cart text-center mr-1">
                                              <input readonly id="count_<?php echo $product['ProductId']; ?>" type="text" class="cart-count" value="<?php echo $session['count']; ?>" style="height: 50px;text-align: center;">
                                            </a>
                                            <a data-text="<?php echo $product['ProductId']; ?>" href="javascript:void(0);" class="addcart add-to-cart text-center plus-minus-btn-center mr-1">
                                              <span><i class="fas fas fa-plus ml-1"></i></span>
                                            </a>
                                          </div>

                                          
                                        

                                          <?php }}} else {
                                          ?>
                                              <p class="bottom-area d-flex px-3">
                                                <a href="javascript:void(0);" data-text="<?php echo $product['ProductId']; ?>" class="add-to-cart AddCart text-center py-2 mr-1"><span>Add to cart <i class="fas fas fa-plus ml-1"></i></span></a>
                                                <a href="<?php echo base_url(); ?>checkout" data-text="<?php echo $product['ProductId']; ?>" class="buy-now BuyNow text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                              </p>


                                          <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }?>



		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
                  <?php echo $bodycontent['links']; ?>
		              <!-- <ul>                 
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul> -->
		            </div>
		          </div>
		        </div>
		    	</div>

          <!-- product side list  -->
		    	<div class="col-md-4 col-lg-2 sidebar">
          <?php foreach ($bodycontent['ProductSideList'] as $SideList) {?>
              <div class="sidebar-box-2">
                <h2 class="heading mb-4"><a data-text="<?php echo $SideList['CategoryId']; ?>" class="catagory" href="javascript:void(0);"><?php echo $SideList['Description']; ?></a></h2>
                <?php if(sizeof($SideList['SubCatagory'])>0){ ?>
                  <ul>
                    <?php foreach ($SideList['SubCatagory'] as $SubCatagory) {?>
                      <li><a data-text="<?php echo $SubCatagory->SubCategoryId; ?>" class="sub_catagory" href="javascript:void(0);"><?php echo $SubCatagory->Description; ?></a></li>
                    <?php } ?>
                    
                  </ul>
                <?php }?>
              </div>
          <?php }?>
		    		
		    		
		    		<!-- <div class="sidebar-box-2">
		    			<h2 class="heading mb-2"><a href="#">Customized Item</a></h2>
		    			<h2 class="heading mb-2"><a href="#">Home Decor</a></h2>
		    		</div> -->
						
    			</div>
    		</div>
    	</div>
    </section>