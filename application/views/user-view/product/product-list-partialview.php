<div class="row" >
<?php if(sizeof($ProductList)>0){ foreach ($ProductList as $product) { ?>                           
                        
                        <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
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


                                    <!-- <p class="bottom-area d-flex px-3">
                                        <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="fas fas fa-plus ml-1"></i></span></a>
                                        <a href="<?php echo base_url(); ?>cart" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                    </p> -->

                                    <div id="appn_<?php echo $product['ProductId'];?>">

                                        <?php 
                                          $id=0;
                                          foreach ($SessionData as $key => $val) {
                                            if ($val['product'] === $product['ProductId']) {               
                                                $id++;
                                            }
                                          }
                                          if ($id!=0) {
                                            // echo $product['ProductId'].'p</br>';
                                            foreach ($SessionData as $session) { 
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

                    <?php }}else{Echo 'There is no product Available'; } ?>
                    </div>