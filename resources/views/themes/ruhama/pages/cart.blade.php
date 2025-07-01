@extends('themes.ruhama.layout.app')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- cart -->
    <form class="cart-section mt-150 mb-150" action="{{ route('checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="cart_data" id="cartData">
        <div class="container">
            <div class="row">
                <!-- Cart Table -->
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                                <!-- JS will inject items here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Cart Total & Coupon -->
                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td id="cart-subtotal">0</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td id="cart-shipping">0</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td id="cart-total">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            {{-- <form action="index.html"> --}}
                            <p><input class="form-control" type="text" placeholder="Coupon" /></p>
                            <p><input type="submit" value="Apply" /></p>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- checkout section -->
            <div class="row" id="checkout-section">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap mt-5">
                        <h3>Checkout</h3>
                        <div class="accordion" id="accordionExample">
                            <!-- Billing -->
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">Billing Address</button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name') }}" placeholder="Name" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="tel" class="form-control" name="number"
                                                        value="{{ old('number') }}" placeholder="Number - 01700-0000-000" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" name="district"
                                                        value="{{ old('district') }}" placeholder="District / জেলা" />
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" class="form-control" name="thana"
                                                        value="{{ old('thana') }}" placeholder="Thana / থানা" />
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ old('address') }}"
                                                        placeholder="Address / হাউস নং, রোড নং/গ্রাম" />
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <textarea name="bill" class="form-control" id="bill" placeholder="Note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping -->
                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">Shipping Address</button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shipping-address-form">
                                            @foreach ($shippings as $key => $shipping)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping"
                                                        id="shipping-{{ $key }}" value="{{ $shipping->value }}">
                                                    <label class="form-check-label" for="shipping-{{ $key }}">
                                                        {{ $shipping->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End accordion -->

                    </div>
                </div>
            </div>
            <!-- end checkout -->
            <input type="submit" class="mt-3 w-100" value="Order Now" />
        </div>
    </form>
    <!-- end cart + checkout -->
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadCartPage();
        });

        function loadCartPage() {
            const cart = Cart.getItems();
            const tbody = document.getElementById('cart-table-body');
            const subtotalElem = document.getElementById('cart-subtotal');
            const shippingElem = document.getElementById('cart-shipping');
            const totalElem = document.getElementById('cart-total');

            tbody.innerHTML = ''; // Clear table

            let subtotal = 0;
            let shipping = 60;

            cart.forEach(item => {
                const row = document.createElement('tr');
                row.classList.add('table-body-row');

                const total = item.price * item.quantity;
                subtotal += total;

                row.innerHTML = `
                    <td class="product-remove">
                        <a href="#" onclick="Cart.removeItem(${item.product_id}, ${item.variant_id ?? 'null'}); loadCartPage(); return false;"><i class="far fa-window-close"></i></a>
                    </td>
                    <td class="product-image">
                        <img src="${item.image}" alt="${item.name}" />
                    </td>
                    <td class="product-name">
                        ${item.name}${item.attributes ? '<br><small>' + Object.values(item.attributes).join(', ') + '</small>' : ''}
                    </td>
                    <td class="product-price">৳${item.price}</td>
                    <td class="product-quantity">
                        <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.product_id}, ${item.variant_id ?? 'null'}, this.value)">
                    </td>
                    <td class="product-total">৳${total}</td>
                `;

                tbody.appendChild(row);
            });

            subtotalElem.textContent = `৳${subtotal}`;
            totalElem.textContent = `৳${subtotal + shipping}`;

            // ✅ Update the hidden input after cart data is ready
            const hiddenCartInput = document.getElementById('cartData');
            if (hiddenCartInput) {
                hiddenCartInput.value = JSON.stringify(cart);
            }
        }

        function updateQuantity(productId, variantId, quantity) {
            let cart = Cart.getItems();

            const index = cart.findIndex(p => p.product_id == productId && p.variant_id == variantId);
            if (index !== -1) {
                cart[index].quantity = parseInt(quantity);
                Cart._setCookie('cart', JSON.stringify(cart), 7);
                loadCartPage();
                Cart.updateHeaderCount();
            }
        }
    </script>
@endsection
