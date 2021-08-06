<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="Personal, Portfolio, Creative,Design,mordan">
        <meta name="description" content="Taso">
        <meta name="author" content="cosmos-themes">

        <title>Taso - Personal Portfolio Template</title>

        <!-- favicon -->
        <link href="#" rel="icon" type="image/png">

        <!--Font Awesome css-->
        <link rel="stylesheet"  href="{{ asset ('assets/css/fontawesome-all.css') }}">

        <!--Bootstrap css-->
        <link rel="stylesheet"  href="{{ asset ('assets/bootstrap/css/bootstrap.css') }}">

        <!--Owl Carousel css-->
        <link rel="stylesheet"  href="{{ asset ('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet"  href="{{ asset ('assets/css/owl.theme.default.min.css') }}">

        <!--Magnific Popup css-->
        <link rel="stylesheet"  href="{{ asset ('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet"  href="{{ asset ('assets/css/animate.min.css') }}">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900%7cOpen+Sans:400,600,700,800" rel="stylesheet">

        <!--Site Main Style css-->
        <link rel="stylesheet"  href="{{ asset ('assets/css/style.css') }}">

    </head>

    <body oncontextmenu="return false;">

    <div class="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

        <!--Navbar Start-->
        <nav id="home" class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo" href="{{ route('Front') }}">
                    Jayanta
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <!--Nav Links-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active" data-scroll-nav="0" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-scroll-nav="1" >About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-scroll-nav="2" >Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-scroll-nav="3">Works</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-scroll-nav="4">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link" data-scroll-nav="5">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('login') }}" style="" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Navbar End-->

@yield('content')

        <!--Footer Start-->
        <footer class="pt-30 pb-30">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <p class="copy pt-30">
                            Jayanta &copy; 2021. All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!--Footer End-->

        <!--Jquery js-->
        <script src="{{ asset('assets/js/jquery-3.0.0.min.js') }}"></script>
        <!--Bootstrap js-->
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--Stellar js-->
        <script src="{{ asset('assets/js/jquery.stellar.js') }}"></script>
        <!--Animated Headline js-->
        <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
        <!--Owl Carousel js-->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <!--ScrollIt js-->
        <script src="{{ asset('assets/js/scrollIt.min.js') }}"></script>
        <!--Isotope js-->
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <!--Particle js-->
        <script src="{{ asset('assets/js/particles.js') }}"></script>
        <script src="{{ asset('assets/js/particle-main.js') }}"></script>
        <!--Magnific Popup js-->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <!--Site Main js-->
        <script src="{{ asset('assets/js/contact.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/605614e7f7ce1827093223e4/1f1843anh';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();

            $(document).ready(function(){
        $(".EmailSend").fadeOut(20000);
    });
        </script>
            <!--End of Tawk.to Script-->
        @yield('footer_js')
    </body>

</html>
