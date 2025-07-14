<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number'    => ['required', 'regex:/^01[3-9]\d{8}$/'],
            'district' => 'required|string',
            'thana' => 'required|string',
            'address' => 'required|string',
            'shipping' => 'required|numeric',
            'cart_data' => 'required|json',
            'cart_data' => 'required|json',
        ], [
            'name.required'     => 'নাম অবশ্যই প্রদান করতে হবে।',
            'name.string'       => 'নাম অবশ্যই একটি স্ট্রিং হতে হবে।',
            'name.max'          => 'নামের দৈর্ঘ্য সর্বাধিক ২৫৫ অক্ষর হতে পারে।',
            'number.required'   => 'ফোন নম্বর অবশ্যই প্রদান করতে হবে।',
            'number.regex'      => 'আপনার নাম্বার টি সঠিক হয়নি দয়া করে ১১টি ডিজিট দিন | 0191-2096479',
            'shipping.required' => 'শিপিং এর জন্য অবশ্যই একটি অপশন নির্বাচন করতে হবে।',
            'address.required'  => 'ঠিকানা অবশ্যই প্রদান করতে হবে।',
            'cart_data'         => 'কার্ট খালি অথবা সঠিক নয়!'
        ]);

        try {
            DB::beginTransaction();
            // Making User if not exists
            $customerID = null;
            $customer = Customer::where('number', $request->number)->first();

            if (!$customer) {
                $customerNew = new Customer();
                $customerNew->name = $request->name;
                $customerNew->number = $request->number;
                $customerNew->status = 'active';
                $customerNew->address = $request->address . ', ' . $request->thana . ', ' . $request->district;
                $customerNew->save();

                $customerID = $customerNew->id;
            } else {
                $customerID = $customer->id;
            }

            //Shipping Check
            $shipping = 0;
            $selectedShipping = Shipping::find($request->shipping);
            if (!$selectedShipping) {
                return back()->with('err', 'Selected shipping method not found.');
            }
            $shipping = $selectedShipping->value;

            // Decode cart data
            $cartData = json_decode($request->cart_data, true);
            if (!is_array($cartData) || empty($cartData)) {
                return back()->with(['err', 'কার্ট খালি অথবা সঠিক নয়!']);
            }

            $subtotal = 0;
            foreach ($cartData as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

            // 2. Shipping already calculated earlier
            $totalAmount = $subtotal + $shipping;

            $orderID = str_pad(Order::max('id') + 1, 5, '0', STR_PAD_LEFT);

            //New Order
            $order = new Order();
            $order->order_id = $orderID;
            $order->customer_id = $customerID;
            $order->status = 'pending';
            $order->total_amount = $subtotal;
            $order->shipping_method = 'Pathao';
            $order->shipping_fee = $shipping;
            $order->payment_method = 'COD';
            $order->payment_status  = 'pending';
            $order->order_notes  = $request->note;
            $order->save();

            if ($order && is_array($cartData)) {
                foreach ($cartData as $orderDetail) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $orderDetail['product_id'];
                    $orderItem->product_variant_id = $orderDetail['variant_id'];
                    $orderItem->quantity = $orderDetail['quantity'];
                    $orderItem->price = $orderDetail['price'];
                    $orderItem->attributes = json_encode($orderDetail['attributes'] ?? []);
                    $orderItem->save();
                }
            }

            // Prepare Facebook Pixel Purchase Event
            $fbEvent = [
                'event' => 'Purchase',
                'data' => [
                    'content_ids' => collect($cartData)->pluck('product_id')->toArray(),
                    'content_type' => 'product',
                    'value' => $totalAmount, // subtotal + shipping
                    'currency' => 'BDT',
                    'contents' => collect($cartData)->map(function ($item) {
                        return [
                            'id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'item_price' => $item['price'],
                        ];
                    })->toArray(),
                ],
            ];


            DB::commit();
            return redirect()->route('thankyou', $order->order_id)->with([
                'order_id' => $order->order_id,
                'fbEvent' => $fbEvent,
                'succ' => 'Thank you for your order, Your order is completed'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('err', 'Something went wrong. Try again!');
        }
    }

    public function thankyou($order_id)
    {
        if (session('order_id') != $order_id) {
            return redirect()->route('cart.show')->with('err', 'Invalid access to thank you page.');
        }
        $order = Order::where('order_id', $order_id)->first();
        return view('themes.ruhama.pages.thankyou', ['order' => $order]);
    }
}
