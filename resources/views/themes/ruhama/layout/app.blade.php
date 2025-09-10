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

    <style>
        a.SocailMedia {
            position: fixed;
            bottom: 94px;
            right: 27px;
            width: 55px;
            height: 55px;
            padding: 12px;
            border-radius: 50%;
            background: #03a84e;
            color: white;
            z-index: 999;
        }

        a.SocailMedia.Messanger {
            bottom: 162px;
        }

        /* 👇 Media query for screens smaller than 400px */
        @media (max-width: 400px) {
            a.SocailMedia {
                width: 40px;
                height: 40px;
                padding: 6px;
                /* optional to keep icon centered */
            }

            a.SocailMedia.Messanger {
                bottom: 144px;
            }
        }
    </style>

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
    {{-- <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center ScrollerTop">
        <i class="fas fa-arrow-up"></i>
    </a> --}}

    <a href="#" class="SocailMedia">
        <svg viewBox="0 0 24 24" id="meteor-icon-kit__regular-whatsapp" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M20.5129 3.4866C18.2882 1.24722 15.2597 -0.00837473 12.1032 4.20445e-05C5.54964 4.20445e-05 0.216056 5.33306 0.213776 11.8883C0.210977 13.9746 0.75841 16.0247 1.80085 17.8319L0.114014 23.9932L6.41672 22.34C8.15975 23.2898 10.1131 23.7874 12.0981 23.7874H12.1032C18.6556 23.7874 23.9897 18.4538 23.992 11.8986C24.0022 8.74248 22.7494 5.71347 20.5129 3.4866ZM12.1032 21.7768H12.0992C10.3294 21.7776 8.59195 21.3025 7.06888 20.4012L6.70803 20.1874L2.96836 21.1685L3.96713 17.52L3.73169 17.1461C2.74331 15.5709 2.22039 13.7484 2.22328 11.8889C2.22328 6.44185 6.65615 2.00783 12.1072 2.00783C14.7284 2.00934 17.2417 3.05207 19.0941 4.90662C20.9465 6.76117 21.9863 9.27564 21.9848 11.8969C21.9825 17.3456 17.5496 21.7768 12.1032 21.7768ZM17.5234 14.3755C17.2264 14.2267 15.7659 13.5085 15.4934 13.4064C15.2209 13.3044 15.0231 13.2576 14.8253 13.5552C14.6275 13.8528 14.058 14.5215 13.8847 14.7199C13.7114 14.9182 13.5381 14.9427 13.241 14.794C12.944 14.6452 11.9869 14.3316 10.8519 13.3198C9.96884 12.5319 9.36969 11.5594 9.19867 11.2618C9.02765 10.9642 9.18043 10.8057 9.32922 10.6552C9.46261 10.5224 9.62622 10.3086 9.77444 10.1348C9.92266 9.9609 9.97283 9.83776 10.0714 9.63938C10.1701 9.44099 10.121 9.26769 10.0469 9.1189C9.97283 8.97011 9.37824 7.50788 9.13083 6.9133C8.88969 6.3341 8.64513 6.4122 8.46271 6.40023C8.29169 6.39168 8.09102 6.38997 7.89264 6.38997C7.58822 6.39793 7.30097 6.53267 7.10024 6.76166C6.82831 7.05923 6.061 7.77752 6.061 9.23976C6.061 10.702 7.12532 12.1146 7.27354 12.313C7.42176 12.5114 9.36855 15.5117 12.3472 16.7989C12.9004 17.0375 13.4657 17.2468 14.0409 17.426C14.7523 17.654 15.3999 17.6204 15.9118 17.544C16.4819 17.4585 17.6694 16.8251 17.9173 16.1313C18.1653 15.4376 18.1648 14.8424 18.0884 14.7187C18.012 14.595 17.8204 14.5266 17.5234 14.3778V14.3755Z"
                    fill="currentColor"></path>
            </g>
        </svg>
    </a>

    <a href="#" class="SocailMedia Messanger">
        <svg viewBox="0 0 24 24" id="meteor-icon-kit__regular-messanger" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0 11.6407C0 4.9526 5.23944 0.000488281 12 0.000488281C18.7606 0.000488281 24 4.9526 24 11.6407C24 18.3289 18.7606 23.281 12 23.281C10.7855 23.281 9.61932 23.1216 8.52555 22.8198C8.31308 22.7619 8.08853 22.7788 7.88571 22.8681L5.50503 23.9184C4.88209 24.1912 4.17948 23.7494 4.15775 23.0685L4.09256 20.9341C4.0829 20.6709 3.96459 20.427 3.76901 20.2508C1.43421 18.1623 0 15.1393 0 11.6407ZM8.32032 9.45321L4.79517 15.0452C4.45473 15.5812 5.1163 16.1872 5.62093 15.8033L9.40684 12.9301C9.66278 12.7369 10.0153 12.7345 10.2736 12.9277L13.0769 15.0307C13.9171 15.6609 15.1195 15.4387 15.6797 14.5502L19.2048 8.95823C19.5453 8.42222 18.8837 7.81618 18.3791 8.20009L14.5932 11.0733C14.3372 11.2665 13.9847 11.2689 13.7264 11.0757L10.9231 8.97272C10.0829 8.34254 8.88048 8.56467 8.32032 9.45321Z"
                    fill="currentColor"></path>
            </g>
        </svg>
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
