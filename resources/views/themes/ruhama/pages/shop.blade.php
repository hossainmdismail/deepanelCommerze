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
                            @foreach ($category as $cat)
                                <li data-filter=".{{ $cat->slug }}">{{ $cat->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                {{-- {{ $products->categories }} --}}
                @forelse ($products as $product)
                    @include('themes.ruhama.components.product',$product)
                @empty
                @endforelse
            </div>

            {{-- <div class="row">
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
            </div> --}}
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
