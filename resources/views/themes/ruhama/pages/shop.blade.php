@extends('themes.ruhama.layout.app')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh Organic & Healthy</p>
                        <h1>Ruhamabd</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Masalaa</li>

                            <li data-filter=".berry">Honey</li>
                            <li data-filter=".lemon">Ghee</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                <!-- হলুদ গুঁড়া - Strawberry -->
                <div class="col-lg-4 col-md-6 text-center strawberry">
                    <div class="single-product-item">
                        <div class="product-image custom-hover-effect">
                            <a href="single-product02.html?product=Holud">
                                <img src="{{ asset('themes/ruhama') }}/img/products/khandani01.jpg" alt="Product Image" class="hover-img img-1" />
                                <img src="{{ asset('themes/ruhama') }}/img/products/khandani02.jpg" alt="Product Image 2"
                                    class="hover-img img-2" />
                                <img src="{{ asset('themes/ruhama') }}/img/products/khandani03.jpg" alt="Product Image 3"
                                    class="hover-img img-3" />
                            </a>
                        </div>
                        <h3 class="font-mukti mt-3">হলুদ গুঁড়া</h3>
                        <p class="product-price"><span>Per Kg</span> 255 <sup>tk</sup></p>
                        <a href="cart.html" class="cart-btn">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                    </div>
                </div>

                <!-- জিরার গুড়া - Berry -->
                <div class="col-lg-4 col-md-6 text-center berry">
                    <div class="single-product-item">
                        <div class="product-image custom-hover-effect">
                            <a href="single-product02.html?product=Ziraa">
                                <img src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa 01.jpg" alt="Product Image" class="hover-img img-1" />
                                <img src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa 12.jpg" alt="Product Image 2"
                                    class="hover-img img-2" />
                                <img src="{{ asset('themes/ruhama') }}/img/ruhama 13.jpg" alt="Product Image 3" class="hover-img img-3" />
                            </a>
                        </div>
                        <h3 class="font-mukti mt-3">জিরার গুড়া</h3>
                        <p class="product-price"><span>Per Kg</span> 350 <sup>tk</sup></p>
                        <a href="cart.html" class="cart-btn">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                    </div>
                </div>

                <!-- ধনিয়া গুড়া - Lemon -->
                <div class="col-lg-4 col-md-6 text-center lemon">
                    <div class="single-product-item">
                        <div class="product-image custom-hover-effect">
                            <a href="single-product02.html?product=Dhoniaa">
                                <img src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa 04.jpg" alt="Product Image" class="hover-img img-1" />
                                <img src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa 05.jpg" alt="Product Image 2"
                                    class="hover-img img-2" />
                                <img src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa 06.jpg" alt="Product Image 3"
                                    class="hover-img img-3" />
                            </a>
                        </div>
                        <h3 class="font-mukti mt-3">ধনিয়া গুড়া</h3>
                        <p class="product-price"><span>Per Kg</span> 450 <sup>tk</sup></p>
                        <a href="cart.html" class="cart-btn">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->

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
