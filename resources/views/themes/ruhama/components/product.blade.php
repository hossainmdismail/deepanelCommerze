@php
    $categoryClasses = '';
    if (!empty($product['categories'])) {
        $categoryClasses = implode(' ', $product['categories']);
    }
@endphp

<div class="col-lg-4 col-md-6 text-center {{ $categoryClasses }}">
    <div class="single-product-item fruite-item">
        <div class="product-image fruite-img">
            <a href="{{ route('product.show', $product['slug']) }}">
                <img src="{{ asset('storage/' . $product['thumbnail']) }}" alt="{{ $product['name'] }}" />
            </a>
        </div>
        <h3>{{ $product['name'] }}</h3>

        @if (!$product['is_variant_based'])
            <p class="product-price">
                ৳{{ number_format($product['price']) }}
                <span>Short Description</span>
            </p>
        @else
            <p class="product-price">
                ৳{{ number_format($product['price']) }}
                @if ($product['price'] !== $product['max_price'])
                    - ৳{{ number_format($product['max_price']) }} @endif
                <span>Short Description</span>
            </p>
        @endif

        <a href="{{ route('product.show', $product['slug']) }}"
    class="cart-btn">
    <i class="fas fa-shopping-cart"></i> Order Now
    </a>
</div>
</div>
