<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rimi's Creations</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSETS_PATH; ?>fav.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aclonica&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo SITE_ASSETS_PATH; ?>css/animate.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo SITE_ASSETS_PATH; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!-- <link href="css/mdb.min.css" rel="stylesheet"> -->
    <!-- Your custom styles (optional) -->
    <link href="<?php echo SITE_ASSETS_PATH; ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_ASSETS_PATH; ?>css/hover-min.css"> 
    <link href="<?php echo SITE_ASSETS_PATH; ?>css/lightgallery.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo SITE_ASSETS_PATH; ?>css/aos.css">
    <link rel="stylesheet" href="<?php echo SITE_ASSETS_PATH; ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/sweetalert2/sweetalert2.min.css">

    <!-- Simple-Image-Gallery-with-Magnifying-Glass-Effect  -->
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>Simple-Image-Gallery/css/jquery.simpleLens.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>Simple-Image-Gallery/css/jquery.simpleGallery.css">
    

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>slick-1.8.1/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>slick-1.8.1/slick-theme.css"/>


    <!-- JQuery -->
    <script src="<?php echo SITE_ASSETS_PATH; ?>js/jquery.min.js"></script>


    <style>
    .plus-minus-btn-center{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .vertical-align-middle {
        vertical-align: middle;
    }

    .nav-btn-clr > .slick-prev:before, .slick-next:before {
        color: black !important;  
        font-size: 20px !important;
    }

    .slick-slide{
        height: auto !important;
    }

    </style>
</head>
<body class="goto-here">  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<div class="super_container">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <!-- <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+91 9830 051 122
                        </div> -->
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">contact@rimiscreations.design</a>
                        </div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <!-- <ul class="standard_dropdown top_bar_dropdown">
                                    <li> <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">Italian</a></li>
                                            <li><a href="#">Spanish</a></li>
                                            <li><a href="#">Japanese</a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="#">EUR Euro</a></li>
                                            <li><a href="#">GBP British Pound</a></li>
                                            <li><a href="#">JPY Japanese Yen</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </div>
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                <?php if ($username) {?>

                                <div><?php echo $username;?></div>
                                <div><a href="<?php echo base_url();?>logout">Sign Out</a></div>
                                    
                                <?php   
                                    }else{

                                ?>
                                <div><a href="<?php echo base_url();?>registration">Register</a></div>
                                <div><a href="<?php echo base_url();?>signin">Sign in</a></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Header Main -->
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="<?php echo base_url();?>home"><img src="<?php echo ASSETS_PATH; ?>logo-small.png"></a></div>
                        </div>
                    </div> <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix"> <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                        <div class="custom_dropdown" style="display: none;">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                    <li><a class="clc" href="#">Computers</a></li>
                                                    <li><a class="clc" href="#">Laptops</a></li>
                                                    <li><a class="clc" href="#">Cameras</a></li>
                                                    <li><a class="clc" href="#">Hardware</a></li>
                                                    <li><a class="clc" href="#">Smartphones</a></li>
                                                </ul>
                                            </div>
                                        </div> <button type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                    <div class="wishlist_count">10</div>
                                </div>
                            </div> <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                        <div class="cart_count"><span id="CartCount"><?php echo $CartProductCount ?></span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="<?php echo base_url().'cart';?>">Cart</a></div>
                                        <div class="cart_price" id="CartAmt"><i class="fas fa-rupee-sign"></i><?php echo $CartAmt ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Main Navigation -->
        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="main_nav_content d-flex flex-row">
                            <!-- Categories Menu -->
                            <!-- Main Nav Menu -->
                            <div class="main_nav_menu">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="<?php echo base_url();?>home">Home<i class="fas fa-chevron-down"></i></a></li>
                                    <li class="hassubs"> <a href="<?php echo base_url();?>product/Catagory/1">Bag<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <!-- <li> <a href="#">Lenovo<i class="fas fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="#">Lenovo 1<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Lenovo 3<i class="fas fa-chevron-down"></i></a></li>
                                                    <li><a href="#">Lenovo 2<i class="fas fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li> -->
                                            <li><a href="<?php echo base_url();?>product/SubCatagory/1">Genuine Leather<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="<?php echo base_url();?>product/SubCatagory/2">Canvas<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="<?php echo base_url();?>product/SubCatagory/3">Durrie<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li > <a href="<?php echo base_url();?>product/Catagory/2">Customized Corporate Item<i class="fas fa-chevron-down"></i></a>
                                    <li > <a href="<?php echo base_url();?>product/Catagory/3">Home Decor<i class="fas fa-chevron-down"></i></a>
                                    
                                    <li><a href="#">About Us<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="#">Contact Us<i class="fas fa-chevron-down"></i></a></li>
                                </ul>
                            </div> <!-- Menu Trigger -->
                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav> <!-- Menu -->
        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page_menu_content">
                            <div class="page_menu_search">
                                <form action="#"> <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products..."> </form>
                            </div>
                            <ul class="page_menu_nav">
                                <!-- <li class="page_menu_item has-children"> <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children"> <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li> -->
                                <li class="page_menu_item"> <a href="index.php">Home<i class="fa fa-angle-down"></i></a> </li>
                                <!-- <li class="page_menu_item has-children"> <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children"> <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li> -->
                                <li class="page_menu_item has-children"> <a href="#">Bag<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Genuine Leather<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Canvas<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Durrie<i class="fa fa-angle-down"></i></a></li><!-- 
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li> -->
                                    </ul>
                                </li>
                                <!-- <li class="page_menu_item has-children"> <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li> -->
                                <li class="page_menu_item"><a href="#">Corporate Item<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="product-list.php">Home Decor<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="#">About Us<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="#">contact Us<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                            <div class="menu_contact">
                                <!-- <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>(+91) 9830251122
                                </div> -->
                                <!-- <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:rimiscreations@gmail.com">rimiscreations@gmail.com</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>


<input type="hidden" value="<?php echo base_url();?>" id="BaseUrl">

  <!-- body include section -->
  <?php 
          //   pre($bodyview);
            if($bodyview)  :
            $this->load->view($bodyview);
            endif; 
      ?>
      <!--end of body include section -->







<!--Footer-->
<footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row">
          <div class="mouse">
            <a href="#" class="mouse-icon">
              <div class="mouse-wheel"><span class="fas fa-chevron-up"></span></div>
            </a>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                  <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                  <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                  <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                </ul>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQs</a></li>
                  <li><a href="#" class="py-2 d-block">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon fas fa-map-marker"></span><span class="text">A-82 BRAHMAPUR MORE, GARIA, KOLKATA - 700096, INDIA</span></li>
                  <!-- <li><a href="#"><span class="icon fas fa-phone"></span><span class="text">+91 9830051122</span></a></li> -->
                  <li><a href="#"><span class="icon fas fa-envelope"></span><span class="text">info@rimiscreations.design/</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Rimi's Creations
            </p>
          </div>
        </div>
      </div>
    </footer>
<!--/.Footer-->

<!-- SCRIPTS -->


  <script src="<?php echo SITE_ASSETS_PATH; ?>js/jquery-migrate-3.0.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo SITE_ASSETS_PATH; ?>js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo SITE_ASSETS_PATH; ?>js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo SITE_ASSETS_PATH; ?>js/mdb.min.js"></script>
<script src="<?php echo SITE_ASSETS_PATH; ?>js/aos.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>slick-1.8.1/slick.min.js"></script>


<!-- sweetalert2 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/sweetalert2/sweetalert2.js"></script>
 
 <!-- Simple-Image-Gallery-with-Magnifying-Glass-Effect  -->
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>Simple-Image-Gallery/src/jquery.simpleGallery.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>Simple-Image-Gallery/src/jquery.simpleLens.js"></script>
  <!-- Call back function 2 -->
  
<script type="text/javascript">
  $(document).ready(function(){
    $('#lightgallery').lightGallery();
    $(".regular").slick({
        // dots: true,
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        pauseOnHover: true,
        // lazyLoad: 'ondemand',    
        autoplay: true,
        autoplaySpeed: 1500,
        // responsive: [
        //     {
        //     breakpoint: 1024,
        //     settings: {
        //         slidesToShow: 3,
        //         slidesToScroll: 3,
        //         infinite: true
        //         // dots: true
        //     }
        //     },
        //     {
        //     breakpoint: 600,
        //     settings: {
        //         slidesToShow: 2,
        //         slidesToScroll: 2
        //     }
        //     },
        //     {
        //     breakpoint: 480,
        //     settings: {
        //         slidesToShow: 1,
        //         slidesToScroll: 1
        //     }
        //     }
        // ]
    });

  });
</script>

  <script src="<?php echo SITE_ASSETS_PATH; ?>js/jquery.easing.1.3.js"></script>
  <script src="<?php echo SITE_ASSETS_PATH; ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo SITE_ASSETS_PATH; ?>js/scrollax.min.js"></script>
<script src="<?php echo SITE_ASSETS_PATH; ?>js/lightgallery-all.min.js"></script>

  <script src="<?php echo SITE_ASSETS_PATH; ?>js/jquery.stellar.min.js"></script>
<script src="<?php echo SITE_ASSETS_PATH; ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo SITE_ASSETS_PATH; ?>js/main.js"></script>


</body>

</html>