    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('themes/ruhama') }}/img/Ruhamaaa/Ruhamaa logo.jpg" class="BossManLogo"
                                    alt="" />
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>

                                <li>
                                    <a href="{{ route('shop') }}">Shop</a>
                                </li>

                                <li><a href="{{ route('about') }}">About</a></li>
                                {{-- <li>
                                    <a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="{{ route('shop') }}">Shop</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        <li><a href="404.html">404 page</a></li>
                                    </ul>
                                </li> --}}

                                <li><a href="{{ route('contact') }}">Contact</a></li>

                                <li>
                                    <div class="header-icons">
                                        {{-- <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a> --}}
                                        <a class="shopping-cart position-relative" href="{{ route('cart.show') }}">
                                            <i class="fas fa-shopping-cart fa-lg"></i>
                                            <span id="cart-count"
                                                class="cart-count-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                0
                                            </span>
                                        </a>

                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
