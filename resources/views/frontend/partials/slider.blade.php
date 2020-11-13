
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>


                    <div class="carousel-inner ">
                       <?php
                           $slider = DB::table('sliders')->get();
                           $i = 1;
                           foreach ($slider as $key => $value) {
                              if ($i == 1) {


                        ?>

                        <div class="item active">
                             <?php } else { ?>
                                <div class="item ">
                                <?php }?>
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                            <img src="{{url($value->image)}}" class="girl img-responsive" alt="" />
                                <img src="{{url('/')}}/frontend/images/home/pricing.png"  class="pricing" alt="" />
                            </div>

                        </div>

                    <?php $i++ ;} ?>

                    </div>


                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- <div id="testimonial" class="section-padding">
        <div class="container">
            <div class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="1s">
                <div class="item">
                    <div class="testimonial-item">
                        <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                            <img src="{{url($item->image)}}" class="girl img-responsive" alt="" />
                                <img src="{{url('/')}}/frontend/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-item">
                        <div class="img-thumb">
                            <img src="img/t2.jpg" alt="Smith">
                        </div>
                        <div class="info">
                            <h2>
                                <a href="#">Smith</a>
                            </h2>
                            <h3>
                                <a href="#">Web Designer</a>
                            </h3>
                        </div>
                        <div class="content">
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi soluta assumenda, itaque earum, consectetur consequatur iure amet! Numquam, odio earum!</p>
                            </div>
                            <div class="star-icon">
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-half"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-item">
                        <div class="img-thumb">
                            <img src="img/t3.jpg" alt="Florian">
                        </div>
                        <div class="info">
                            <h2>
                                <a href="#">Florian</a>
                            </h2>
                            <h3>
                                <a href="#">Web Developer</a>
                            </h3>
                        </div>
                        <div class="content">
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi soluta assumenda, itaque earum, consectetur consequatur iure amet! Numquam, odio earum!</p>
                            </div>
                            <div class="star-icon">
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-half"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-half"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-item">
                        <div class="img-thumb">
                            <img src="img/t4.jpg" alt="Max">
                        </div>
                        <div class="info">
                            <h2>
                                <a href="#">Max</a>
                            </h2>
                            <h3>
                                <a href="#">Web Developer</a>
                            </h3>
                        </div>
                        <div class="content">
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi soluta assumenda, itaque earum, consectetur consequatur iure amet! Numquam, odio earum!</p>
                            </div>
                            <div class="star-icon">
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-item">
                        <div class="img-thumb">
                            <img src="img/t5.jpg" alt="ALBERT">
                        </div>
                        <div class="info">
                            <h2>
                                <a href="#">ALBERT</a>
                            </h2>
                            <h3>
                                <a href="#">Graphics Designer</a>
                            </h3>
                        </div>
                        <div class="content">
                            <div class="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi soluta assumenda, itaque earum, consectetur consequatur iure amet! Numquam, odio earum!</p>
                            </div>
                            <div class="star-icon">
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-filled"></i>
                                </span>
                                <span>
                                    <i class="lni lni-star-half"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section><!--/slider-->

