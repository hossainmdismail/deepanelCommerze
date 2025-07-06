@extends('themes.ruhama.layout.app')
@section('style')
    <style>
        label.btn {
            border: 1px solid #ccc;
            padding: 5px 12px;
            border-radius: 4px;
            cursor: pointer;
            user-select: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        label.btn input.variant-option:checked+span,
        label.btn input.variant-option:checked {
            /* actually won't work because input is inside label */

            /* Instead, use this: */
        }

        /* So better: use this CSS: */
        label.btn input.variant-option:checked {
            /* nothing */
        }

        label.btn input.variant-option:checked {
            outline: none;
        }

        label.btn input.variant-option:checked {
            /* We can't select parent in CSS, so best solution: */
        }

        /* Instead, add this CSS: */
        label.btn input.variant-option:checked {
            /* add a class via JS on label */
        }

        label.btn.selected {
            border-color: #f28123;
            background-color: #f2802318;
        }

        label.btn.selected :hover {
            color: black !important
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Single Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <div class="single-product mt-5 mb-5">
        <div class="container">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                            class="img-fluid" id="productImage" />
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>

                        <!-- Dynamic Price -->
                        <p class="single-product-pricing" id="productPrice">
                            @if ($product->is_variant_based)
                                From {{ $minPrice }} <sup>৳</sup>
                            @else
                                {{ $product->base_price }} <sup>৳</sup>
                            @endif
                        </p>

                        <p>{{ $product->description }}</p>

                        <!-- Add to Cart Form -->
                        <div class="single-product-form">
                            <form method="POST" action="{{ route('add.to.cart') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="product_variant_id" id="selectedVariantId">

                                <!-- Attribute Options -->
                                @foreach ($attributes as $attKey => $attribute)
                                    <div class="mb-3">
                                        <label><strong>{{ $attribute['name'] }}</strong></label><br>
                                        @foreach ($attribute['values'] as $key => $value)
                                            <label class="btn btn-outline-secondary btn-sm me-2 mb-2"
                                                style="cursor:pointer;">
                                                <input type="radio" name="attributes[{{ $attribute['id'] }}]"
                                                    value="{{ $value['id'] }}" class="variant-option d-none"
                                                    data-attr-id="{{ $attribute['id'] }}"
                                                    {{ $attKey == 0 ?? $key == 0 ? 'checked' : '' }} />
                                                {{ $value['value'] }}
                                            </label>
                                        @endforeach
                                    </div>
                                @endforeach

                                <!-- Quantity -->
                                <input type="number" name="quantity" class="form-control mb-3" style="width: 100px"
                                    min="1" value="1" required>

                                <!-- Submit Button -->
                                {{-- <button type="submit" class="cart-btn OrderNowButtonColor">
                                    <i class="fas fa-shopping-cart"></i> Order Now
                                </button> --}}
                                <!-- Submit Buttons -->
                                <div class="d-flex gap-2">
                                    <button type="button" id="addToCartBtn" class="cart-btn btn btn-outline-primary mr-2">

                                        <i class="fas fa-plus"></i> Add to Cart
                                    </button>

                                    <button type="submit" class="cart-btn OrderNowButtonColor">
                                        <i class="fas fa-shopping-cart"></i> Order Now
                                    </button>
                                </div>


                                <p class="mt-2">
                                    <strong>Categories:</strong>
                                    {{ $product->categories->pluck('name')->implode(', ') }}
                                </p>
                            </form>
                        </div>

                        <!-- Social Share -->
                        <h4 class="mt-4">Share:</h4>
                        <ul class="product-share list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquid, fuga quas itaque eveniet beatae optio.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg"
                                    alt="" /></a>
                        </div>
                        <h3>Strawberry</h3>
                        <p class="product-price"><span>Per Kg</span> 85$</p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-2.jpg"
                                    alt="" /></a>
                        </div>
                        <h3>Berry</h3>
                        <p class="product-price"><span>Per Kg</span> 70$</p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-3.jpg"
                                    alt="" /></a>
                        </div>
                        <h3>Lemon</h3>
                        <p class="product-price"><span>Per Kg</span> 35$</p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end more products -->
@endsection

@section('script')
    <script>
        const variants = @json($variants ?? []);
        const isVariantBased = {{ $product->is_variant_based ? 'true' : 'false' }};
        const product = @json($product);

        // DOM elements
        const variantOptions = document.querySelectorAll('.variant-option');
        const productPrice = document.getElementById('productPrice');
        const selectedVariantIdInput = document.getElementById('selectedVariantId');
        const productImage = document.getElementById('productImage');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const quantityInput = document.querySelector('input[name="quantity"]');

        document.addEventListener('DOMContentLoaded', () => {
            updateVariant();
            Cart.updateHeaderCount(); // ✅ global cart count
        });

        variantOptions.forEach(input => {
            input.addEventListener('change', updateVariant);
        });

        function findMatchingVariant(selectedAttrs) {
            return variants.find(variant => {
                if (variant.attributes.length !== Object.keys(selectedAttrs).length) return false;
                return variant.attributes.every(attr =>
                    selectedAttrs[attr.attribute_id] == attr.attribute_value_id
                );
            });
        }

        function updateVariant() {
            const selectedAttrs = {};
            variantOptions.forEach(input => {
                input.closest('label.btn').classList.remove('selected');
                if (input.checked) {
                    selectedAttrs[input.dataset.attrId] = parseInt(input.value);
                    input.closest('label.btn').classList.add('selected');
                }
            });

            if (!isVariantBased) {
                productPrice.innerHTML = `${product.base_price} <sup>৳</sup>`;
                selectedVariantIdInput.value = null;
                return;
            }

            const matchedVariant = findMatchingVariant(selectedAttrs);

            if (matchedVariant) {
                productPrice.innerHTML = `${matchedVariant.price} <sup>৳</sup>`;
                selectedVariantIdInput.value = matchedVariant.id;
                if (matchedVariant.image) {
                    productImage.src = '{{ asset('storage') }}/' + matchedVariant.image;
                }
            } else {
                productPrice.innerHTML = 'Select options to see price';
                selectedVariantIdInput.value = '';
                productImage.src = '{{ asset('storage/' . $product->thumbnail) }}';
            }
        }

        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const quantity = parseInt(quantityInput.value);
                const variantId = selectedVariantIdInput.value || null;
                const selectedAttributes = {};

                if (!quantity || (isVariantBased && !variantId)) {
                    alert('Please select all options and quantity');
                    return;
                }

                // Grab all selected attributes on the page
                document.querySelectorAll('.variant-option:checked').forEach(input => {
                    selectedAttributes[input.dataset.attrId] = input.nextSibling.textContent
                        .trim(); // get label text (value)
                });


                const priceText = productPrice.textContent;
                const price = parseFloat(priceText.replace(/[^\d.]/g, ''));

                const item = {
                    product_id: product.id,
                    variant_id: variantId,
                    name: product.name,
                    quantity: quantity,
                    price: price,
                    image: productImage?.src || '{{ asset('storage/' . $product->thumbnail) }}',
                    attributes: selectedAttributes // <-- add this
                };

                Cart.addItem(item);
                if (window.Notyf) {
                    const notyf = new Notyf({
                        duration: 3000,
                        ripple: true,
                        position: {
                            x: 'right',
                            y: 'top'
                        }
                    });

                    notyf.success('🛒 Product added to cart!');
                }
            });
        }
    </script>
@endsection


{{-- @section('script')
    <script>
        const variants = @json($variants);
        const variantOptions = document.querySelectorAll('.variant-option');
        const productPrice = document.getElementById('productPrice');
        const selectedVariantIdInput = document.getElementById('selectedVariantId');
        const productImage = document.getElementById('productImage');

        function findMatchingVariant(selectedAttrs) {
            return variants.find(variant => {
                if (variant.attributes.length !== Object.keys(selectedAttrs).length) return false;
                return variant.attributes.every(attr =>
                    selectedAttrs[attr.attribute_id] == attr.attribute_value_id
                );
            });
        }

        function updateVariant() {
            const selectedAttrs = {};
            variantOptions.forEach(input => {
                // Remove highlight from all radios first
                input.closest('label.btn').classList.remove('selected');

                if (input.checked) {
                    selectedAttrs[input.dataset.attrId] = parseInt(input.value);
                    // Add highlight to checked one
                    input.closest('label.btn').classList.add('selected');
                }
            });

            const matchedVariant = findMatchingVariant(selectedAttrs);

            if (matchedVariant) {
                productPrice.innerHTML = matchedVariant.price + ' <sup>৳</sup>';
                selectedVariantIdInput.value = matchedVariant.id;
                if (matchedVariant.image) {
                    productImage.src = '{{ asset('storage') }}/' + matchedVariant.image;
                }
            } else {
                productPrice.innerHTML = 'Select options to see price';
                selectedVariantIdInput.value = '';
                productImage.src = '{{ asset('storage') }}/' + '{{ $product->thumbnail }}';
            }
        }


        variantOptions.forEach(input => {
            input.addEventListener('change', updateVariant);
        });

        // Initialize variant price/image if only one variant or pre-selected
        document.addEventListener('DOMContentLoaded', () => {
            updateVariant();
        });
    </script>
    <script>
        document.getElementById('addToCartBtn').addEventListener('click', function() {
            const productId = document.querySelector('input[name="product_id"]').value;
            const variantId = document.getElementById('selectedVariantId').value || null;
            const quantity = parseInt(document.querySelector('input[name="quantity"]').value);
            const productName = @json($product->name);
            const image = document.getElementById('productImage')?.src ||
                '{{ asset('storage/' . $product->thumbnail) }}';
            const priceText = document.getElementById('productPrice').textContent;
            const price = parseFloat(priceText.replace(/[^\d.]/g, ''));

            if (!price || !quantity) return alert('Please select a variant and quantity');

            let cart = JSON.parse(getCookie('cart') || '[]');

            const existingIndex = cart.findIndex(item =>
                item.product_id == productId && item.variant_id == variantId
            );

            if (existingIndex !== -1) {
                cart[existingIndex].quantity += quantity;
            } else {
                cart.push({
                    product_id: productId,
                    variant_id: variantId,
                    name: productName,
                    quantity: quantity,
                    price: price,
                    image: image
                });
            }

            setCookie('cart', JSON.stringify(cart), 7);
            alert('Added to cart!');
        });

        function setCookie(name, value, days) {
            const expires = new Date(Date.now() + days * 864e5).toUTCString();
            document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
        }

        function getCookie(name) {
            return document.cookie.split('; ').reduce((acc, cookie) => {
                const [key, val] = cookie.split('=');
                return key === name ? decodeURIComponent(val) : acc;
            }, '');
        }
    </script>
@endsection --}}
