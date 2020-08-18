
<!--carousal-top-home--->
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <!-- <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li> -->
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <!-- <div class="carousel-item active">
      <img src="<?php echo SITE_ASSETS_PATH; ?>banner/banner-3.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="<?php echo SITE_ASSETS_PATH; ?>banner/banner-4.jpg" alt="Chicago" width="1100" height="500">
    </div> -->
    <div class="carousel-item active">
      <img src="<?php echo SITE_ASSETS_PATH; ?>banner/banner-2.jpg" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!---carousal end--->

<!--Main layout-->
<main>

  <section class="about-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="about-left-img-section text-center">
            <img src="<?php echo SITE_ASSETS_PATH; ?>img/about-img.png" class="img-fluid">
          </div>
        </div>

        <div class="col-lg-7 d-flex align-items-center">
          <div class="about-right-content-section section-gap">
            <div class="section-title text-left mb-5">
              <h2 class="section-title-main">Hello!</h4>
              <h3>About Us</h3>
            </div>

            <h4 class="content-heading mb-2">Rimi's Creation</h4>
            <p>Manufacturers and exporters of the finest quality leather products backed with its own Tannery with experience of over 50 years in quality leather products manufacturing and export through their subsidiary concerns.</p>

            <p>With expertise in tanning and manufacturing spanning over Two generations, Rimi's Creation is uniquely placed to be able to fulfill the requirement of fine quality finished leather goods to brands world over</p>

            <a href="#!" class="btn-one for-center">Read More</a>
          </div>
        </div>


      </div>
    </div>
  </section>

<!-- Best Sellers -->
<section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Best Sellers</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>

      <div class="container">
        <section class="nav-btn-clr regular slider">
          <?php foreach ($bodycontent['BestSellers'] as $product) { ?>                          
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
                  </div>
                  <div id="appn_<?php echo $product['ProductId'];?>">

                    <!-- if needed add to cart button will be added here -->
                                    
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
        </section>        
      </div>



    </section>

    <!-- Best Seller -->

  <section class="add-block-2 text-center text-white">
    <div class="container position-relative">
      <h3>We create the collections, you celebrate the craftsmanship</h3>
      <a href="#!" class="btn-two for-center mt-4">Read More</a>
    </div>
  </section>

<!--Genuine Leather Bags -->
<?php  if (sizeof($bodycontent['GenuineLeather'])>4) { ?> 
<section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Genuine Leather Bags</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>
      <div class="container">
        <section class="nav-btn-clr regular slider">
          <?php foreach ($bodycontent['GenuineLeather'] as $product) { ?>                          
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
                  </div>
                  <div id="appn_<?php echo $product['ProductId'];?>">

                    <!-- if needed add to cart button will be added here -->
                                    
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
        </section>        
      </div>
    </section>
    <?php }?>

<!--Canvas Bags -->
<?php  if (sizeof($bodycontent['Canvas'])>4) { ?> 
<section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Canvas Bags</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>
      <div class="container">
        <section class="nav-btn-clr regular slider">
          <?php foreach ($bodycontent['Canvas'] as $product) { ?>                          
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
                  </div>
                  <div id="appn_<?php echo $product['ProductId'];?>">

                    <!-- if needed add to cart button will be added here -->
                                    
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
        </section>        
      </div>
    </section>
    <?php }?>

<!--Durie Bags -->
<?php  if (sizeof($bodycontent['Durie'])>4) { ?> 
<section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Durie Bags</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>
      <div class="container">
        <section class="nav-btn-clr regular slider">
          <?php foreach ($bodycontent['Durie'] as $product) { ?>                          
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
                  </div>
                  <div id="appn_<?php echo $product['ProductId'];?>">

                    <!-- if needed add to cart button will be added here -->
                                    
                  </div>
                </div>
              </div>
            </div>
          <?php }?>
        </section>        
      </div>
    </section>
    <?php }?>

    <!-- Home Decor -->
    <?php  if (sizeof($bodycontent['HomeDecor'])>4) { ?> 
    <section class="ftco-section bg-light">
          <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
              <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Home Decor</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
              </div>
            </div>      
          </div>
          <div class="container">
            <section class="nav-btn-clr regular slider">
              <?php foreach ($bodycontent['HomeDecor'] as $product) { ?>                          
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
                      </div>
                      <div id="appn_<?php echo $product['ProductId'];?>">

                        <!-- if needed add to cart button will be added here -->
                                        
                      </div>
                    </div>
                  </div>
                </div>
              <?php }?>
            </section>        
          </div>         
    </section>
    <?php }?>

    <!-- Custom -->
  <?php  if (sizeof($bodycontent['CorporateProducts'])>4) { ?>
  <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Corporate Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>
      <div class="container">
            <section class="nav-btn-clr regular slider">
              <?php foreach ($bodycontent['CorporateProducts'] as $product) { ?>                          
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
                      </div>
                      <div id="appn_<?php echo $product['ProductId'];?>">

                        <!-- if needed add to cart button will be added here -->
                                        
                      </div>
                    </div>
                  </div>
                </div>
              <?php }?>
            </section>        
      </div>      
      
</section>
<?php }?>


<!-- Logo Carousel -->
<section class="ftco-section ftco-animate">
<div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Esteemed Clients</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>    
   <section class="customer-logos slider">
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl1.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl2.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl3.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl4.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl1.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl2.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl3.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl4.jpg"></div>
      <div class="slide"><img src="<?php echo ASSETS_PATH; ?>img/cl1.jpg"></div>
   </section>
 </div>
</section>
  
</main>
<!--Main layout-->