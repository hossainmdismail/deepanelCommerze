@extends('themes.ruhama.layout.app')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        {{-- <p>Fresh adn Organic</p> --}}
                        <h1>Thank You</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- error section -->
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <!-- Invoice 1 - Bootstrap Brain Component -->
            <section class="py-3 py-md-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                            <div class="row mb-3">
                                <div class="col-12 col-sm-6 col-md-8">
                                    <h4>Bill To</h4>
                                    <address>
                                        <strong>{{ $order->user ? $order->user->name : 'Unknown' }}</strong><br>
                                        {{ $order->user ? $order->user->address : 'Unknown' }}<br>
                                        Phone: {{ $order->user ? $order->user->number : 'Unknown' }}<br>
                                        Email: {{ $order->user ? $order->user->email : 'Unknown' }}
                                    </address>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4">
                                    <h4 class="row">
                                        <span class="col-6">#{{ $order->order_id }}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-uppercase">Qty</th>
                                                    <th scope="col" class="text-uppercase">Product</th>
                                                    <th scope="col" class="text-uppercase text-end">Unit Price</th>
                                                    <th scope="col" class="text-uppercase text-end">Quantity</th>
                                                    <th scope="col" class="text-uppercase text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @if ($order->items)
                                                    @foreach ($order->items as $key => $item)
                                                        <tr>
                                                            <th scope="row">{{ $key + 1 }}</th>
                                                            <td>{{ $item->product ? $item->product->name : 'Unknown' }}</td>
                                                            <td class="text-end">{{ number_format($item->price) }}</td>
                                                            <td class="text-end">{{ $item->quantity }}</td>
                                                            <td class="text-end">{{ $item->price * $item->quantity }} Tk</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td colspan="4" class="text-end">Subtotal</td>
                                                    <td class="text-end">{{ $order->total_amount }}Tk</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-end">VAT (5%)</td>
                                                    <td class="text-end">0 Tk</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-end">Shipping</td>
                                                    <td class="text-end">{{ $order->shipping_fee }} Tk</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" colspan="4" class="text-uppercase text-end">Total
                                                    </th>
                                                    <td class="text-end">
                                                        <strong>{{ $order->total_amount + $order->shipping_fee }}
                                                            Tk</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="contianer">
                                    <p>Note: Auto generated note, if something wrong then contact us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end error section -->
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Clear cart cookie after successful order
            document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            if (window.Cart && typeof Cart.updateHeaderCount === 'function') {
                Cart.updateHeaderCount();
            }
        });
    </script>
@endsection
