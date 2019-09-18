@extends('cristal.frame')

@section('content')
<!--view:index-->
        <div dusk="index-contener" class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2  style="color:white " data-wow-duration="1000ms" data-wow-delay="0.3s">Üdvözlő szöveg</h2>
                        <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg
                                Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó 
                                Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg
                                Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó 
                                Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg
                                Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó 
                                Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg Benutatkozö szöveg Benutatkozó szöveg Benutatkozó szöveg
                                
                        </p>
                        <a href="#services" class="btn btn-common wow fadeInUp" ><i class="lnr lnr-download"></i> Több infó</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


    <!-- Start Pricing Table Section -->
    <div id="pricing" class="section pricing-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Népszerű <span>Csomagjaink</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy <br> nibh euismod tincidunt ut laoreet dolore magna.</p>
            </div>

            @include('cristal.pricing')    

        </div>
    </div>
    <!-- End Pricing Table Section -->

   
    <!-- Blog Section -->
    <section id="blog" class="section">
        <!-- Container Starts -->
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Latest <span>Blogs</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy <br> nibh euismod tincidunt ut laoreet dolore magna.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="cristal/img/blog/img1.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <h3>
                                <a href="#">How often should you tweet?</a>
                            </h3>
                            <div class="meta-tags">
                                <span class="date"><i class="lnr lnr-calendar-full"></i>on Mar 23, 2018</span>
                                <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
                            </p>
                            <a href="single-post.html"  class="btn btn-common btn-rm">Read More</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper wow fadeInUp" data-wow-delay="0.6s">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="cristal/img/blog/img2.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <h3>
                                <a href="#">Content is still king</a>
                            </h3>
                            <div class="meta-tags">
                                <span class="date"><i class="lnr lnr-calendar-full"></i>on Mar 29, 2018</span>
                                <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
                            </p>
                            <a href="single-post.html" class="btn btn-common btn-rm">Read More</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper wow fadeInUp" data-wow-delay="0.9s">
                        <div class="blog-item-img">
                            <a href="single-post.html">
                                <img src="cristal/img/blog/img3.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <h3>
                                <a href="#">Social media at work</a>
                            </h3>
                            <div class="meta-tags">
                                <span class="date"><i class="lnr lnr-calendar-full"></i>on Mar 21, 2018</span>
                                <span class="comments"><a href="#"><i class="lnr lnr-bubble"></i> 24 Comments</a></span>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
                            </p>
                            <a href="single-post.html" class="btn btn-common btn-rm">Read More</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>
            </div>
        </div>
    </section>
    <!-- blog Section End -->
 <!-- Services Section Start -->
 <section id="services" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Főbb <span>Szolgáltatásaink</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy <br> nibh euismod tincidunt ut laoreet dolore magna.</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="lnr lnr-pencil"></i>
                        </div>
                        <h4>Könyvelés</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item-boxes wow fadeInDown" data-wow-delay="0.4s">
                    <img src="cristal/img/blog/img2.jpg"  height="200px" widht="200px">
                        <h4>Web Fejlesztés</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="item-boxes wow fadeInDown" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="lnr lnr-chart-bars"></i>
                        </div>
                        <h4>Pályázat figyelés</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
                    </div>
                </div>



                <div class="col-md-4 col-sm-6">
                        <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
                            <div class="icon">
                                <i class="lnr lnr-pencil"></i>
                            </div>
                            <h4>Könyvelés</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item-boxes wow fadeInDown" data-wow-delay="0.4s">
                            <div class="icon">
                                <i class="lnr lnr-cog"></i>
                            </div>
                            <h4>Web Fejlesztés</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut.</p>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
    <!-- Services Section End -->
    <!-- Contact Section Start -->
    <section id="contact" class="section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-9 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <div class="contact-block">
                        <div class="section-header">
                            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Contact <span>Us</span></h2>
                            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                        </div>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Message" rows="11" data-error="Write your message" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Subcribe Section Start -->
    <div id="subscribe" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Subscribe <span>Newsletter</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Subscribe to get all latest news from us.</p>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form class="text-center form-inline wow fadeInUp" data-wow-delay="0.3s">
                        <input class="mb-20 form-control" name="email" placeholder="Your Email Address">
                        <button class="sub_btn">subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection