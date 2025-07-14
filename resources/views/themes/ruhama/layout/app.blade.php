<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="E-commerce Template, Created by FerdousM from https://elitemsy.com" />
    <title>
        Ruhama Foods bd | Authentic Bangladeshi Pure Honey Provider !!
    </title>
    <meta name="description"
        content="Buy 100% pure honey and natural products from Ruhama BD. Shop premium honey, mustard oil, ghee, and more—nationwide delivery in Bangladesh." />
    <meta name="keywords"
        content="Ruhama BD, Pure Honey, Natural Mustard Oil, Gawa Ghee, Organic Products Bangladesh, Buy Honey Online, Bee Products BD" />
    <meta name="author" content="Ruhama BD" />
    <!-- Bangla Version -->
    <meta name="description"
        content="Ruhama BD থেকে শতভাগ খাঁটি মধু ও প্রাকৃতিক পণ্য কিনুন। আমাদের হানি, সরিষার তেল, গাওয়া ঘি এবং আরও অনেক পণ্য ঘরে বসে পান সারা বাংলাদেশে।" />
    <meta name="keywords"
        content="Ruhama BD, খাঁটি মধু, প্রাকৃতিক তেল, গাওয়া ঘি, বাংলাদেশী মধু, অর্গানিক পণ্য, বিহানি প্রোডাক্টস" />
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="128x128"
        href="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa logo.jpg" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/bootstrap/css/bootstrap.min.css" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/owl.carousel.css" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/magnific-popup.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/animate.css" />
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/meanmenu.min.css" />

    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/main.css" />

    <link rel="stylesheet" href="{{ asset('themes/ruhama') }}/css/responsive.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/fonts-bd/muktinarrow/muktinarrow.css" rel="stylesheet" />
    <meta name="google-site-verification" content="cebUO59YsYhT0U-or3YCrKqb_RjsSRM-6RKACcAWQ5c" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6830a1098169ba190d611f09/1iruva3is';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();


        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = 'https://connect.facebook.net/en_US/fbevents.js';
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script');

        fbq('init', '{{ config('facebook.pixel_id') }}');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ config('facebook.pixel_id') }}&ev=PageView&noscript=1" />
    </noscript>

    @yield('style')
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    @include('themes.ruhama.layout.header')

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords" />
                            <button type="submit">
                                Search <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    @yield('content')

    @include('themes.ruhama.layout.footer')

    <script>
        document
            .getElementById("helpButton")
            .addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default action

                const contactOptions = document.getElementById("contactOptions");
                if (
                    contactOptions.style.display === "none" ||
                    contactOptions.style.display === ""
                ) {
                    contactOptions.style.display = "flex";
                } else {
                    contactOptions.style.display = "none";
                }
            });
    </script>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center ScrollerTop">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <script>
        // Scroll Top Button Visibility
        window.addEventListener("scroll", function() {
            const scrollTopButton = document.getElementById("scroll-top");
            if (window.scrollY > 300) {
                scrollTopButton.style.display = "flex";
            } else {
                scrollTopButton.style.display = "none";
            }
        });

        // Scroll to Top Functionality
        document
            .getElementById("scroll-top")
            .addEventListener("click", function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            });

        // Preloader Removal After Page Load
        window.addEventListener("load", function() {
            document.getElementById("preloader").style.display = "none";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <!-- jquery -->
    <script src="{{ asset('themes/ruhama/js/blade.js') }}"></script>
    <script src="{{ asset('themes/ruhama') }}/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset('themes/ruhama') }}/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="{{ asset('themes/ruhama') }}/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="{{ asset('themes/ruhama') }}/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="{{ asset('themes/ruhama') }}/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="{{ asset('themes/ruhama') }}/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="{{ asset('themes/ruhama') }}/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="{{ asset('themes/ruhama') }}/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="{{ asset('themes/ruhama') }}/js/sticker.js"></script>
    <!-- main js -->
    <script src="{{ asset('themes/ruhama') }}/js/main.js"></script>

    @include('themes.ruhama.layout.alert')
    @yield('script')
</body>

</html>
