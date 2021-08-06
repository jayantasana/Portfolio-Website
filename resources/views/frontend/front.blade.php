@extends('frontend.master')
@section('content')

        <!--Home Section Start-->
        <section id="Particle-ground" class="banner" style="background-image: url('assets/images/background/banner.jpg')" data-stellar-background-ratio=".7" data-scroll-index="0">
            <div class="container">
                <!--Banner Content-->
                @foreach ($setting as $settings)
                <div class="banner-div">
                    <h1>HI! I'M <span class="text-uppercase">{{ $settings->name }}</span></h1>
                    <p class="cd-headline clip is-full-width">
                        <span>Professional In</span>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Development.</b>
                            <b>SEO.</b>
                            <b>Design.</b>
                            <b>Photography.</b>
                            <b>WordPress.</b>
                        </span>
                    </p>
                    <!--About Social Icons-->
                    <div class="social-icons mt-15">
                            <a href="https://www.facebook.com/jayanta.sana.56"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.linkedin.com/in/jayanta-sana-447b4911a"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="https://twitter.com/sanajayanta"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/jayanta_sana/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="arrow bounce">
                    <a class="fa fa-chevron-down fa-2x" href="#" data-scroll-nav="1"></a>
                </div>
                @endforeach
            </div>
        </section>
        <!--Home Section End-->

        <!--About Section Start-->
        <section class="about pt-100 pb-100" data-scroll-index="1">

            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <!--About Content-->
                        @foreach ($about as $abouts)
                        <div class="about-div">
                            <div class="about-title">
                                <h2>About <span>Me</span></h2>
                                <h4>{{ $abouts->position }}</h4>
                            </div>
                            <p>
                                Me
                                @foreach ($setting as $settings)
                                <b>{{ $settings->name }}!, </b>

                                {{ $abouts->description }}
                            </p>

                            <div class="table-responsive">
                             <table class="info-table">
                                 <tbody>
                                     <tr>
                                         <th>
                                             <i class="hidden-xs far fa-calendar-alt"></i>
                                            <span>Brithday</span>
                                         </th>
                                          <td>{{ $settings->birthday }}</td>
                                     </tr>
                                     <tr>
                                         <th>
                                             <i class="hidden-xs fas fa-phone"></i>
                                             <span>Call</span>
                                         </th>
                                         <td>{{ $settings->phone }}</td>
                                     </tr>
                                      <tr>
                                         <th>
                                             <i class="hidden-xs  fas fa-paper-plane"></i>
                                             <span>Email</span>
                                         </th>
                                         <td>{{ $settings->email }}</td>
                                     </tr>
                                     <tr>
                                         <th>
                                             <i class="hidden-xs fas fa-globe"></i>
                                             <span>Website</span>
                                         </th>
                                         <td><a href="{{ $settings->website }}">{{ $settings->website }}</a></td>
                                     </tr>
                                 </tbody>
                             </table>
                            </div>
                            @endforeach
                            <span class="about-btn">
                                <a class="div-btn" href="#">Download CV</a>
                                <a class="div-btn" href="#">Hire Me</a>
                            </span>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <!--About Image-->
                        <div class="about-img">
                            <img src="{{ asset('aboutimages/' . $abouts->image) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Section End-->
        <section class="skills pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="skill-div">
                            <h2 class="headline">My <span>Skill</span></h2>
                            <p>JoyWebService is an Outsource Web Design, Development  & Ecommerce company in Khulna, Bangladesh. We empower you to grow your business by providing very high-quality web development & marketing solutions with the latest strategies at very affordable pricing points.</p>
                            <p>We help clients to fulfill their business goals & develop their online presence by our digital marketing techniques. We love to help our clients business. We are based on Khulna, Bangladesh</p>
                        </div>
                    </div>
                     <div class="col-lg-6">
                          <div class="skill-div ">
                            @foreach ($skill as $skills)
                            <div class="skills-item mb-35">
                              <h6>{{ $skills->skill }}</h6>
                              <div class="bar">
                                <span class="fill" data-width="{{ $skills->percent }}%"></span>
                              </div>
                              <div class="tip"></div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                </div>
            </div>
        </section>
        <!--Services Section Start-->
        <section class="services pt-100 pb-100" data-scroll-index="2">
            <div class="container">
                <div class="row">
                    <div class="col">
                       <div class="section-title">
                            <div class="main-title">
                                <h4>My <span>Services</span></h4>
                                <h6>What i offer</h6>
                            </div>

                       </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($service as $services)
                    <div class="col-md-4">
                        <!--Service Item-->
                      <div class="service-item">
                          <div class="service-icon">
                             <img style="border-radius: 50%; width: 100px;" src="{{ asset('serviceimage/' . $services->icon) }}" alt="">
                          </div>
                          <h2>{{ $services->servicename }}</h2>
                          <p>{{ $services->description }}</p>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Services Section End-->

        <!--Counter Section Start-->
        <section class="counter-area pt-100 pb-100" style="background-image: url('assets/images/pexels-photo-220067.jpg')">
            <div class="container">
                <div class="row">
                    @foreach ($happyclient as $counter)
                    <div class="col-lg-3 col-md-6">
                        <!--Stats Item-->
                        <div class="counter-item">
                            <h2 class="counter" data-count="{{ $counter->counter }}">1001</h2>
                            <h5>{{ $counter->title }}</h5>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Counter Section End-->
        <!--Portfolio Section Start-->
        <section class="portfolio bg-gray pt-100 pb-100" data-scroll-index="3">
            <div class="container">
                <div class="row">
                    <div class="col">
                       <div class="section-title">
                            <div class="main-title">
                                <h4>My <span>Portfolio</span></h4>
                                <h6>What i do</h6>
                            </div>

                       </div>
                        <div class="port-filter text-center">
                            <ul>
                                <li class="filter-item" data-filter="*">All</li>
                                <li data-filter=".design">Web Design</li>
                                <li data-filter=".application">Applications</li>
                                <li data-filter=".development">Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row portfolio-section">
                    <!--Portfolio Item-->
                    @foreach ($portfolio as $portfolioitem)
                    <div class="col-lg-4 col-md-6 item application">
                        <div class="portfolio-item">
                            <img style="width: auto; height: 250px; " src="{{ asset('portfolio/' . $portfolioitem->thumbnail) }}" alt="image">
                            <div class="item-overlay">
                                <h6>{{ $portfolioitem->category }}</h6>
                                <div class="icons">
                                    <span class="icon">
                                        <span class="port-link">
                                        <a href="{{ asset('portfolio/' . $portfolioitem->thumbnail) }}">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        </span>
                                        <a href="#">
                                           <i class="fas fa-link"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--Portfolio Section End-->
        <section class="timeline pt-100 pb-100" data-scroll-index="2">
            <div class="container">
                            <div class="row">
                                <div class="col">
                                   <div class="section-title">
                                        <div class="main-title">
                                            <h4>My <span>Experience</span></h4>
                                            <h6>My Recent Experiences</h6>
                                        </div>

                                   </div>
                                </div>
                            </div>
                <div class="row">
                    <div class="main-timeline">
                        @foreach ($experience as $experts)
                        <div class="timeline">
                            <div class="timeline-icon"></div>
                            <div class="timeline-content">
                                <span class="date">{{ $experts->times }}</span>
                                <h5 class="title">{{ $experts->position }}</h5>
                                <p class="description">
                                    {{ $experts->description }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials Section Start-->
        <section class="testimonials counter-area pt-100 pb-100" style="background-image: url('assets/images/pexels-photo-220067.jpg')" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                            <div id="testimonial-slider" class="owl-carousel">
                                @foreach ($client as $reviews)
                                <div class="testimonial">
                                    <p class="testi-description">
                                        {{ $reviews->comment }}
                                    </p>

                                    <div class="testimonial-review">
                                        <div class="pic">
                                            <img src="{{ asset('clientimage/' . $reviews->image) }}" alt="">
                                        </div>
                                        <h4 class="testimonial-title">
                                            {{ $reviews->title }}
                                            <small>{{ $reviews->position }}</small>
                                        </h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials Section End-->
        <!--Blog Section Start-->
        <section id="blog" class="blog pt-100 pb-100" data-scroll-index="4">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                       <div class="section-title">
                            <div class="main-title">
                                <h4>My <span>Blog</span></h4>
                                <h6>Latest blog</h6>
                            </div>

                       </div>
                    </div>
                </div>
            <div class="row">

               <div class="col-md-4">
                <!-- Single Blog item -->
                <div class="post-slide">
                    <div class="post-img">
                        <a href="blog-details.html"><img src="assets/images/blog/60.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <div class="post-date">
                            <span class="month">apr</span>
                            <span class="date">10</span>
                        </div>
                        <h5 class="post-title"><a href="blog-details.html">Learn Web Design</a></h5>
                        <p class="post-description">
                          Lorem Ipsum is simply dummy text of the printing and type setting industry when an unknown printer took
                        </p>
                        <a class="read-more btn" href="blog-details.html" data-toggle="modal" data-target="#exampleModalCenter">Read More</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Blog Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <h1>Blogs Comming Soon</h1>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn" style="background: #fc6f5c; color: white;">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <ul class="post-bar">
                        <li> <i class="fa fa-users"></i> <a href="#">admin</a> </li>
                        <li> <i class="fa fa-comments"></i> <a href="#">2</a> </li>
                        <li> <i class="fa fa-thumbs-up"></i> <a href="#">2 Likes</a> </li>
                    </ul>
                </div>
               </div>
               <div class="col-md-4">
                <!-- Single Blog item -->
                <div class="post-slide">
                    <div class="post-img">
                        <a href="blog-details.html"><img src="assets/images/blog/50.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <div class="post-date">
                            <span class="month">apr</span>
                            <span class="date">10</span>
                        </div>
                        <h5 class="post-title"><a href="blog-details.html">Learn UI/UX Design</a></h5>
                        <p class="post-description">
                          Lorem Ipsum is simply dummy text of the printing and type setting industry when an unknown printer took
                        </p>
                        <a class="read-more btn" href="blog-details.html" data-toggle="modal" data-target="#exampleModalCenter">Read More</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Blog Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <h1>Blogs Comming Soon</h1>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn" style="background: #fc6f5c; color: white;">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <ul class="post-bar">
                        <li> <i class="fa fa-users"></i> <a href="#">admin</a> </li>
                        <li> <i class="fa fa-comments"></i> <a href="#">2</a> </li>
                        <li> <i class="fa fa-thumbs-up"></i> <a href="#">2 Likes</a> </li>
                    </ul>
                </div>
               </div>
               <div class="col-md-4">
                <!-- Single Blog item -->
                <div class="post-slide">
                    <div class="post-img">
                        <a href="blog-details.html"><img src="assets/images/blog/30.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <div class="post-date">
                            <span class="month">apr</span>
                            <span class="date">10</span>
                        </div>
                        <h5 class="post-title"><a href="blog-details.html">Latest News of Wordpress</a></h5>
                        <p class="post-description">
                           Lorem Ipsum is simply dummy text of the printing and type setting industry when an unknown printer took
                        </p>
                        <a class="read-more btn" href="blog-details.html" data-toggle="modal" data-target="#exampleModalCenter">Read More</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Blog Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <h1>Blogs Comming Soon</h1>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn" style="background: #fc6f5c; color: white;">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <ul class="post-bar">
                        <li> <i class="fa fa-users"></i> <a href="#">admin</a> </li>
                        <li> <i class="fa fa-comments"></i> <a href="#">2</a> </li>
                        <li> <i class="fa fa-thumbs-up"></i> <a href="#">2 Likes</a> </li>
                    </ul>
                </div>
               </div>
            </div>
            </div>
        </section>
        <!--Blog Section End-->


        <!--Contact Section Start-->
        <!--Contact Section Start-->
        <section class="contact pt-100 pb-100" data-scroll-index="5" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                       <div class="section-title">
                            <div class="main-title">
                                <h4>Contact <span>Me</span></h4>
                                <h6>Contact With Me</h6>
                            </div>

                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!--Contact Form-->
                        @if(session('EmailSend'))
                            <div class="alert alert-success EmailSend" role="alert">
                                {{ session('EmailSend') }}
                            </div>
                        @endif
                        <form id='contact-form' method='POST' action="{{ route('SentMail') }}">
                            @csrf
                            {{-- <input type='hidden' name='form-name' value='contactForm' /> --}}
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="first-name" placeholder="Name *" value="{{ old('name') }}">
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email *" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="form-group">
                                       <textarea rows="6" name="message" class="form-control @error('message') is-invalid @enderror" id="description" placeholder="Message *"></textarea>
                                       @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                               </div>
                                <div class="col-md-12 text-center">
                                    <!--contact button-->
                                    <button id="contact-submit" class="div-btn">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <p class="contact-info-title">Lorem Ipsum is simply dummy text of the printing and type setting industry when an unknown printer took a galley of type</p>
                            <div class="contact-info-item">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>{{ $settings->address }}</li>
                                <li><i class="fas fa-phone"></i>{{ $settings->phone }}</li>
                                <li><i class="fas fa-paper-plane"></i>{{ $settings->email }}</li>
                                <li><i class="fas fa-globe"></i>{{ $settings->website }}</li>
                            </ul>
                            </div>
                            <div class="social-icons mt-15">
                                    <a href="https://www.facebook.com/jayanta.sana.56" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.linkedin.com/in/jayanta-sana-447b4911a" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" target="_blank"><i class="fab fa-google-plus-g"> </i></a>
                                    <a href="https://twitter.com/sanajayanta" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/jayanta_sana/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
              <div class="contact-map">
                  <iframe   class="map" src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d58849.44914847847!2d89.52304026750478!3d22.799107603410203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m3!3m2!1d22.7990323!2d89.55806!4m0!5e0!3m2!1sen!2sbd!4v1621870837966!5m2!1sen!2sbd" style="border:0" allowfullscreen></iframe>
              </div>
        </section>
        <!--Contact Section End-->
@endsection

{{-- @section('footer_js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(".EmailSend").fadeOut(4000);
    });
</script>

@endsection --}}

