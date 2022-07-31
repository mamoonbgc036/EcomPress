<?php 
  get_header();
?>
  <div class="banner">
    <div class="container">
      <div class="row m-0">
        <div class="col-md-3"></div>
        <div class="col-md-9 p-0">
          <div class="main-banner">
            <div class="banner1"> <img src="<?php echo get_template_directory_uri().' /images/slider/slider-image-1.jpg'; ?>" alt=" ">
              <div class="banner-detail">
                <div class="banner-detail-inner"> 
                  <span class="slogan">Men’s Categories</span>
                  <h1 class="banner-title">Fashion Sale</h1>
                  <span class="slogan">Get Now - Sale Off 30%</span><br>
                  <a href="#" class="btn btn-color">Shop Now</a>
                </div>
              </div>
            </div>
            <div class="banner2"> <img src="<?php echo get_template_directory_uri().' /images/slider/slider-image-2.jpg'; ?>" alt=" ">
              <div class="banner-detail">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></div>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 text-center">
                    <div class="banner-detail-inner"> 
                      <span class="slogan">Women’s Categories</span>
                      <h1 class="banner-title">Fashion Sale</h1>
                      <span class="slogan">Get Now - Sale Off 30%</span><br>
                      <a href="#" class="btn btn-color">Shop Now</a>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="banner3"> <img src="<?php echo get_template_directory_uri().' /images/slider/slider-image-3.jpg'; ?>" alt=" ">
              <div class="banner-detail">
                <div class="banner-detail-inner"> 
                  <span class="slogan">The wait is over</span>
                  <h1 class="banner-title">Our online shop</h1>
                  <span class="slogan">Get Now - Sale Off 5%</span><br>
                  <a href="#" class="btn btn-color">Shop Now</a>
                </div>
              </div>
              </div>
            </div>
          </div> 
      </div>
    </div>
  </div>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->
  <section class="mt-20 mt-xs-30">
    <div class="container">
      <div class="sub-banner-block center-xs">
        <div class="row mlr_-20">
          <div class="col-sm-6 plr-20">
            <div class="sub-banner banner-text-left"> 
              <a> 
                <img src="<?php echo get_template_directory_uri().' /images/banner/banner-1.jpg'; ?>" alt=" ">
                <div class="sub-banner-detail">
                  <div class="sub-banner-type">Launching Discount</div>
                  <div class="sub-banner-title">30%</div>
                  <div class="sub-banner-subtitle">USE COUPON CODE: <i>RAMADAN100</i></div>
                  <span class="btn btn-color">SHOP NOW</span>
                </div> 
                <div class="sub-banner-effect"></div>
              </a> 
            </div>
          </div>
          <div class="col-sm-6 plr-20">
            <div class="sub-banner banner-text-right"> 
              <a> 
                <img src="<?php echo get_template_directory_uri().' /images/banner/banner-2.jpg'; ?>" alt=" ">
                <div class="sub-banner-detail">
                 <div class="sub-banner-type">CHIFFON</div>
                 <div class="sub-banner-title">SAREES</div>
                 <div class="sub-banner-subtitle">USE COUPON CODE: <i>RAMADAN100</i></div>
                 <span class="btn btn-color">SHOP NOW</span>
               </div>
                <div class="sub-banner-effect"></div>
              </a> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--  Featured Products Slider Block Start  -->
  <section class="pt-60 pt-xs-30">
    <div class="container">

        <div class="row">
          <div class="col-xs-12">
            <div class="heading-part mb-20">
              <h2 class="main_title">Featured Products</h2>
            </div>
          </div>
        </div>

        <div class="featured-product">
          <div class="row mlr_-20">

            <?php 
              $args = array(
                  'posts_per_page' => -1,
                  'tax_query' => array(
                      'relation' => 'AND',
                      array(
                          'taxonomy' => 'product_cat',
                          'field' => 'slug',
                          'terms' => 'feature_product'
                      ),
                  ),
                  'post_type' => 'product',
                  'orderby' => 'title',
              );
              $the_query = new WP_Query( $args );

              while ( $the_query->have_posts() ) {
                  $the_query->the_post();
                  $product = wc_get_product( get_the_ID() );
                  if( $product->is_in_stock() ) {
                  ?>
                  <div class="col-md-3 col-sm-4 col-xs-6 plr-20">
                    <div class="product-item">
                      <div class="sale-label"><span>Sale</span></div>
                      <div class="product-image"> 
                      <?php 
                      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->ID ), 'single-post-thumbnail' );


                      ?>
                      <a href="product-page.html"> <img src="<?php echo $image[0]; ?>" alt=""> </a>
                        <div class="product-detail-inner">
                          <div class="item-overlay">
                            <ul>
                              <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                              <li><a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a></li>
                              <li><a href="#" title="Compare"><i class="fa fa-random"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="product-item-details">
                      <div class="item-title"> <a href="product-page.html"><?php the_title(); ?></a> </div>
                        <div class="price-box"> 
                          <span class="price">$<?php echo $product->get_price(); ?></span>
                          <del class="price old-price"><?php echo $product->get_regular_price() ? $product->get_regular_price() : '' ; ?></del>
                          <div class="item-rating">
                            <div title="70%" class="rating-result"> <span style="width:70%"></span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                }
              }
            ?>
         </div>
        </div>

    </div>
  </section>
  <!--  Featured Products Slider Block End  --> 

  <!-- perellex-banner Start -->
  <section class="ptb-60 ptb-xs-30">
    <div class="parallax-bg client-bg align-center dark-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 mtb-40 ptb-60">
            <h1>NEW DESIGN 2018</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt atque repellat consequuntur harum ipsum vero ullam labore tenetur numquam facilis laboriosam minus in porro architecto odio. Hic!</p>

            <a href="/shop.html" class="btn btn-color">Shop Now!</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- perellex-banner End -->

  <!--  Best Sallers Slider Block Start  -->
  <section class="pb-60 pb-xs-30 featured-product">
    <div class="container">
      <div class="product-slider">
        <div class="row">
          <div class="col-xs-12">
            <div class="heading-part mb-20">
              <h2 class="main_title">Latest Products</h2>
            </div>
          </div>
        </div>
        <div class="position-r">
          <div class="row">
            <div class="owl-carousel pro_cat_slider">
              <?php 
                $args = array(
                  'post_type' => 'product',
                  'tax_query' => array(
                    'relation' => 'AND',
                    array(
                       'taxonomy' => 'product_cat',
                       'field'    => 'slug',
                       'terms'    => 'latest_product',
                    ),
                  ),
                  'orderby' => 'title',
                  'posts_per_page' => -1,
                );

                $latest = new WP_Query( $args );

                while( $latest->have_posts() ) {
                  $latest->the_post();
                  $latest_prod = wc_get_product( get_the_ID() );

                  if( $latest_prod->is_in_stock() ) {

                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $latest_prod->ID ), 'single-post-thumbnail' );
                    ?>
                    <div class="item">
                      <div class="product-item">
                        <div class="product-image"> 
                        <a href="product-page.html"> <img src="<?php echo $image[0]; ?>" alt=" "> </a>
                          <div class="product-detail-inner">
                            <div class="item-overlay">
                              <ul>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a></li>
                                <li><a href="#" title="Compare"><i class="fa fa-random"></i></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="item-title"> <a href="#"><?php the_title(); ?></a> </div>
                          <div class="price-box"> 
                            <span class="price">$ <?php echo $latest_prod->get_price(); ?></span> 
                            <div class="item-rating">
                              <div title="90%" class="rating-result"> <span style="width:90%"></span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }
              ?>
             </div>
           </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Best Sallers Slider Block End  -->

   <!--  Site Services Features Block Start  -->
  <section class="pb-60 pb-xs-30">
    <div class="service-block center-sm">
    <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box">
              <i class="fa fa-truck"></i>
              <div class="title">Free Delivery</div>
              <div class="subtitle">From $99.99</div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box">
              <i class="fa fa-users"></i>
              <div class="title">Support 24/7</div>
              <div class="subtitle">Online 24 hours</div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box">
              <i class="fa fa-shield"></i>
              <div class="title">Safe Payment</div>
              <div class="subtitle">Buyers Safety</div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box">
              <i class="fa fa-usd"></i>
              <div class="title">More Discount</div>
              <div class="subtitle">on affiliation</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Site Services Features Block End  -->
   
  <!--  Blog Slider Block Start  -->
  <section class="pb-60 pb-xs-30">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-sm-30">
          <div class="heading-part mb-20">
            <h2 class="main_title">Latest Blog</h2>
          </div>
          <div class="row blog-mobile-m">
            <div id="news" class="owl-carousel">
              <?php 
              $blogs = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'title',
              ));
              while( $blogs->have_posts() ) {
                $blogs->the_post();
                ?>
                <div class="item">
                  <div class="blog-item">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="blog-media">                         
                          <a href="single-blog.html" title="" class="read">
                            <?php 
                             $my_image = get_post_meta(get_the_ID(), 'custom_image_data', true);
                            ?>
                          <img src="<?php echo $my_image['src'];?>" alt=" "> 
                          </a> 
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="blog-detail">
                          <div class="date">27 Jan 2018</div>
                          <h3><a href="single-blog.html"><?php the_title(); ?></a></h3>
                          <p><?php the_content(); ?></p>
                          <hr>
                          <div class="post-info">
                            <ul>
                              <li><span>By</span><a href="#"> <?php echo get_the_author(); ?></a></li>
                              <li><a href="#"><?php echo get_comments_number(); ?> comments</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>

         <div class="col-md-4">
            <div class="client-inner testimonial-block">
              <div id="client" class="owl-carousel">
                <div class="item client-detail">
                  <div class="client-img"> <img src="<?php echo get_template_directory_uri().'/images/testimonial/testimonial-1.jpg'; ?>" alt="Xpent"> </div>
                  <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, amet cumque ad similique laboriosam."</p>
                  <h4 class="sub-title client-title">Marketing</h4>
                  <div class="date">Dec, 12 2017</div>
                </div>
                <div class="item client-detail">
                  <div class="client-img"> <img src="<?php echo get_template_directory_uri().'/images/testimonial/testimonial-2.jpg'; ?>" alt="Xpent"> </div>
                  <p>"Temporibus dicta soluta, distinctio voluptatum, non culpa quod vitae laudantium! Esse qui, labore ducimus."</p>
                  <h4 class="sub-title client-title">Marketing</h4>
                  <div class="date">Dec, 12 2017</div>
                </div>
                <div class="item client-detail">
                  <div class="client-img"> <img src="<?php echo get_template_directory_uri().'/images/testimonial/testimonial-3.jpg'; ?>" alt="Xpent"> </div>
                  <p>"Ipsum dolor sit amet, consectetur adipisicing elit. Molestias modi, dolor a voluptatibus, quaerat, at rerum, explicabo temporibus."</p>
                  <h4 class="sub-title client-title">Marketing</h4>
                  <div class="date">Dec, 12 2017</div>
                </div>
              </div>
            </div>
         </div>
      </div>
    </div>
  </section>
  <!--  Blog Slider Block End  -->
  
  <!-- Brand logo block Start  -->
  <section class="ptb-30">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="heading-part mb-20">
            <h2 class="main_title">Our Brands</h2>
          </div>
        </div>
      </div>
      <div class="row brand">
        <div class="col-md-12">
          <div id="brand-logo" class="owl-carousel align_center">
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-1.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-2.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-3.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-4.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-5.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-6.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-7.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-8.jpg'; ?>" alt=" "></a></div>
            <div class="item"><a href="#"><img src="<?php echo get_template_directory_uri().'/images/brands/brand-9.jpg'; ?>" alt=" "></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Brand logo block End  --> 

<!-- Bottom Widget Products  -->
  <section class="pb-60 pb-xs-30">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="widget widget_products">
            <div class="widget-title-wrap"><h5 class="widget-title">Products</h5></div>

            <ul class="product_list_widget">
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-1.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                </div>
              </li>
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-2.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                </div>
              </li>
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-3.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                </div>
              </li>
            </ul>

          </div>
        </div>
        
        <div class="col-sm-4">
          <div class="widget widget_products">
            <div class="widget-title-wrap"><h5 class="widget-title">Top Rated Products</h5></div>

            <ul class="product_list_widget">
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-4.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                  <div class="item-rating">
                   <div title="60%" class="rating-result"> <span style="width:60%"></span> </div>
                  </div>
                </div>
              </li>
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-5.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                  <div class="item-rating">
                   <div title="60%" class="rating-result"> <span style="width:60%"></span> </div>
                  </div>
                </div>
              </li>
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-6.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                  <div class="item-rating">
                   <div title="60%" class="rating-result"> <span style="width:60%"></span> </div>
                  </div>
                </div>
              </li>
            </ul>

          </div>
        </div>

        <div class="col-sm-4">
          <div class="widget widget_products">
            <div class="widget-title-wrap"><h5 class="widget-title">Recent Reviews</h5></div>

            <ul class="product_list_widget">
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-7.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                  <div class="item-rating">
                   <div title="60%" class="rating-result"> <span style="width:60%"></span> </div>
                  </div>
                </div>
              </li>
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-8.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                  <div class="item-rating">
                   <div title="60%" class="rating-result"> <span style="width:60%"></span> </div>
                  </div>
                </div>
              </li>
              <li>
                <a href="#"> 
                  <img width="70" height="85" src="<?php echo get_template_directory_uri().'/images/products/item-small-9.jpg'; ?>"> 
                  <span class="product-title">Ecstasy Ladis Cloth</span> 
                </a> 
                <div class="price-box"> 
                  <span class="price">$30.00</span> <del class="price old-price">$100.00</del>
                  <div class="item-rating">
                   <div title="60%" class="rating-result"> <span style="width:60%"></span> </div>
                  </div>
                </div>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </section>
  <?php 
    get_footer();
  ?>
  
