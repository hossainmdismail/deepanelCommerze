@extends('themes.ruhama.layout.app')

@section('content')

    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Organic & Fresh Honey</p>
                            <h1 class="font-mukti">
                                নিরাপদ খাদ্যের বিশ্বস্ত প্রতিষ্ঠান। – রুহামা !
                            </h1>
                            <div class="hero-btns">
                                <a href="{{ route('shop') }}" class="boxed-btn font-mukti">আমাদের প্রোডাক্ট দেখুন</a>
                                <a href="{{ route('contact') }}" class="bordered-btn font-mukti">যোগাযোগ করুন</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content font-mukti">
                            <h3>ফ্রী শিপিং</h3>
                            <p>When order over 750 BDT</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content font-mukti">
                            <h3>24/7 সাপোর্ট</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content font-mukti">
                            <h3>রিফান্ড পলিসি</h3>
                            <p>Get refund within 15 days!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Best </span>Selling Item</h3>
                        <p class="font-mukti">
                            আমাদের বেস্ট সেলিং আইটেম সমূহ যেগুলো হাজার ক্রেতার আস্থা অর্জনে
                            সক্ষম হয়েছে
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    @include('themes.ruhama.components.product',$product)
                @empty
                @endforelse
            </div>
        </div>

        <div class="text-center mt-5 font-mukti">
            <a href="{{ route('shop') }}" class="btn btn-primary"
                style="
            padding: 10px 120px;
            background-color: #ff7f47;
            color: #fff;
            font-size: 15px;
            font-weight: 620;
            text-decoration: none;
            border-radius: 8px;
          ">
                আমাদের স্টোর ভিজিট করুন
            </a>
        </div>




    </div>

    <!-- end product section -->

    <!-- Add JavaScript -->

    <!-- cart banner section -->
    {{-- <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!--Image Column-->

                <div class="image-column col-lg-6 font-mukti">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>৩০%</strong> <br />
                                    প্রতি কেজিতে ছাড়
                                </span>
                            </div>
                        </div>
                        <img class="" src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa 10.jpg" alt="Holud" />
                    </div>
                </div>

                <!--Content Column-->
                <div class="content-column col-lg-6 font-mukti">
                    <h3><span class="orange-text">বেস্ট ডিল </span> অফ ইয়ার</h3>
                    <h4 class="font-mukti">চুই ঝাল </h4>
                    <div class="text">
                        শতভাগ খাঁটি ও বিশুদ্ধ চুই ঝাল , যা আপনার খাবারের স্বাদ ও গুণমান
                        বাড়াবে। এখনই অর্ডার করুন এবং উপভোগ করুন সেরা দামে!
                    </div>
                    <!--Countdown Timer-->

                    <div class="time-counter">
                        <div class="time-countdown clearfix" data-countdown="2025/6/31">
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Days</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Hours</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Mins</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Secs</div>
                            </div>
                        </div>
                    </div>

                    <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end cart banner section -->


    <!-- advertisement section -->
    <div class="abt-section  mt-3 mb-80">
        <div class="container">
            <div class="row">



                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.youtube.com/watch?v=dD6Fpo9wbD8" class="video-play-btn popup-youtube"><i
                                class="fas fa-play"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 font-mukti">
                    <div class="abt-text">
                        <p class="top-sub">Since Year 1999</p>
                        <h2>We are <span class="orange-text">RuhamaBD</span></h2>

                        <p>
                            🐝 <strong>প্রিমিয়াম হানিনাট – খাঁটি খাবারের আস্থার নাম</strong>
                        </p>
                        <p>
                            আমরা বাঙালি, সুস্থ থাকতে চাই খাঁটি খাবারের মাধ্যমে। তাই আমরা বেছে নিয়েছি প্রকৃতির সেরা
                            উপহার – খাঁটি তেল, চুইঝাল ও পুষ্টিকর চিয়াসিড। ভেজাল খাদ্য স্বাস্থ্যের ক্ষতি করে, আর সেই
                            ক্ষতির বিরুদ্ধে আমাদের পদক্ষেপ – প্রিমিয়াম হানিনাট।
                        </p>
                        <p>
                            আমাদের প্রতিটি পণ্য নির্ভেজাল, প্রাকৃতিক ও হাতে তৈরি পদ্ধতিতে প্রস্তুত – যাতে আপনি পান
                            নিরাপদ ও উপকারী খাদ্য।
                        </p>
                        <p>
                            “<strong>ভেজাল মুক্ত খাবারই প্রকৃত যত্ন</strong>” – এই বিশ্বাসে আমরা প্রতিশ্রুতিবদ্ধ।
                        </p>
                        <p>
                            <strong>প্রিমিয়াম হানিনাট ব্যবহার করুন, সুস্থ থাকুন, আস্থা নিয়ে খান।</strong>
                        </p>

                        <a href="{{ route('about') }}" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->


    <!-- shop banner -->
    <section class="shop-banner">
        <div class="container font-mukti">
            <h2>
                এই বছর জুড়েই <br />
                পাচ্ছেন স্পেশাল <span class="orange-text">ডিসকাউন্ট...</span>
            </h2>
            <div class="sale-percent">
                <span>Sale! <br />
                    Upto</span>15% <span>off</span>
            </div>
            <a href="{{ route('shop') }}" class="cart-btn btn-lg">Shop Now</a>

            <div class="time-counter pt-4">
                <div class="time-countdown clearfix" data-countdown="2025/12/31">
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Days</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Hours</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Mins</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">00</span>Secs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end shop banner -->

    <!-- latest news -->
    {{-- <div class="latest-news pt-150 pb-150">
        <div class="container font-mukti">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text"></span> News</h3>
                        <p>
                            বিভিন্ন পত্রিকা অনলাইন পোর্টাল এবং সোশ্যাল মিডিয়াতে আমাদের
                            পণ্যের নিউজ এবং ফিডব্যাক সমূহ
                        </p>
                    </div>
                </div>
            </div>





            <div class="row">
                <!-- News 1 - HoneyNut -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-1"></div>
                        </a>
                        <div class="news-text-box font-mukti">
                            <h3>
                                <a href="single-news.html">রুহামার হানিনাট: মধু আর বাদামের মিশেলে পুষ্টির উপাখ্যান</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Ruhama Team</span>
                                <span class="date"><i class="fas fa-calendar"></i> 20 May, 2025</span>
                            </p>
                            <p class="excerpt">
                                বাংলাদেশের প্রাকৃতিক খাঁটি মধু এবং উন্নতমানের বাদাম দিয়ে তৈরি আমাদের হানিনাট — শতভাগ
                                প্রিজারভেটিভ মুক্ত, শিশু ও বড়দের জন্য
                            </p>
                            <a href="single-news.html" class="read-more-btn">
                                বিস্তারিত পড়ুন <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- News 2 - খাঁটি তেল -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-2"></div>
                        </a>
                        <div class="news-text-box font-mukti">
                            <h3>
                                <a href="single-news.html">রুহামার খাঁটি তেল: ঘানিভাঙ্গা সরিষা ও নারকেল তেলের গল্প</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Ruhama Team</span>
                                <span class="date"><i class="fas fa-calendar"></i> 18 May, 2025</span>
                            </p>
                            <p class="excerpt">
                                প্রাচীন বাংলার ঘানিভাঙ্গা পদ্ধতিকে আমরা আধুনিক করে ব্যবহার করি, যাতে সরিষা ও নারকেল
                                তেলের খাঁটি স্বাদ ও পুষ্টিগুণ অক্ষুণ্ন থাকে – কোনো কেমিক্যাল ছাড়াই।
                            </p>
                            <a href="single-news.html" class="read-more-btn">
                                বিস্তারিত পড়ুন <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- News 3 - চুইঝাল -->
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-latest-news">
                        <a href="single-news.html">
                            <div class="latest-news-bg news-bg-3"></div>
                        </a>
                        <div class="news-text-box font-mukti">
                            <h3>
                                <a href="single-news.html">খুলনা অঞ্চল থেকে সংগ্রহকৃত রুহামার আসল চুইঝাল</a>
                            </h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Ruhama Team</span>
                                <span class="date"><i class="fas fa-calendar"></i> 15 May, 2025</span>
                            </p>
                            <p class="excerpt">
                                খুলনার গ্রামাঞ্চল থেকে সরাসরি সংগ্রহ করা হয় রুহামার চুইঝাল। নির্দিষ্ট বয়সের পর গাছ কেটে
                                প্রাকৃতিক উপায়ে শুকিয়ে প্রসেস করা হয়, যাতে ঝাঁজ ও গন্ধ থাকে একদম আসল।
                            </p>
                            <a href="single-news.html" class="read-more-btn">
                                বিস্তারিত পড়ুন <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div> --}}
    <!-- end latest news -->


    <!-- testimonail-section -->
    <div class="testimonail-section mt-40 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('themes/ruhama') }}/img/BossMan/maria brankovic.jpg" alt="" />
                            </div>
                            <div class="client-meta">
                                <h3 class="font-mukti">
                                    মারিয়া <span class="font-mukti"> ভোক্তা</span>
                                </h3>
                                <p class="testimonial-body font-mukti">
                                    "আমরা সর্বদা খাঁটি পণ্য খুঁজে পেতে চাই এবং এখান থেকে পাওয়া
                                    জিনিসগুলো আমার প্রত্যাশা পূরণ করেছে।"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('themes/ruhama') }}/img/BossMan/FerdousM.jpg" alt="" />
                            </div>
                            <div class="client-meta">
                                <h3 class="font-mukti">
                                    ফেরদৌস <span class="font-mukti">স্থানীয় ভোক্তা</span>
                                </h3>
                                <p class="testimonial-body font-mukti">
                                    "খাঁটি এবং ভেজালমুক্ত পণ্য পাওয়া খুব কঠিন, কিন্তু এখানে তা
                                    সহজেই পেয়েছি। খুবই সন্তুষ্ট।"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="{{ asset('themes/ruhama') }}/img/BossMan/Adda Loveless.jpg" alt="" />
                            </div>
                            <div class="client-meta">
                                <h3 class="font-mukti">
                                    আদিবা রহমান
                                    <span class="font-mukti">অনলাইন ব্যবসায়ী </span>
                                </h3>
                                <p class="testimonial-body font-mukti">
                                    "আমার ক্রেতারা সবসময় খাঁটি পণ্য চায়। এখান থেকে নেওয়া পণ্য
                                    তাদের চাহিদা পূরণ করে।"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="{{ asset('themes/ruhama') }}/img/company-logos/1.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('themes/ruhama') }}/img/company-logos/2.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('themes/ruhama') }}/img/company-logos/3.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('themes/ruhama') }}/img/company-logos/4.png" alt="" />
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('themes/ruhama') }}/img/company-logos/5.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
