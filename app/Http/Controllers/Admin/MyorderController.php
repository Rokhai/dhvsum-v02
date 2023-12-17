<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;


/**
 * Class MyorderController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MyorderController extends Controller
{
    public function index()
    {
        return view('admin.myorder', [
            'title' => 'Myorder',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Myorder' => false,
            ],
            'page' => 'resources/views/admin/myorder.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MyorderController.php',
        ]);
    }


    public function store(Request $request)
    {
        // $this->traitStore();

        // dd($request);

        // $data = $request->validate([
        //     'user_id' => 'required',
        //     'product_id' => 'required',
        //     'quantity' => 'required',
        //     'address_id' => 'required',
        // ]);

        // dd($data);

        // $order = \App\Models\Order::create($data);
        // dd($request);
        $product = \App\Models\Product::find($request->item_product_id);

        $cartItem = \App\Models\Cart::find($request->item_cart_id);

        // $user = \App\Models\User::find(backpack_user()->id);
        $address = \App\Models\Address::find(backpack_user());

        $payment_method = $request->payment_method;

        // dd($cartItem);
        // dd($request);
        $order = null;
        if ($product) {
            if ($product->stock >= $cartItem->quantity) {

                $payment = null;

                // If payment method is cash
                // Create order and payment transaction
                if ($payment_method == 'cash') {
                    $order = \App\Models\Order::create([
                        'user_id' => backpack_user()->id,
                        'cart_id' => $request->item_cart_id, // 'cart_id' => 'required
                        'product_id' => $request->item_product_id,
                        'address_id' => $request->item_address_id,
                        'total_amount' => $request->item_total_amount,
                        'status' => 'To Ship',
                    ]);

                    $payment = \App\Models\Payment::create([
                        'user_id' => backpack_user()->id,
                        'product_id' => $request->item_product_id,
                        'order_id' => $order->id,
                        'amount' => $request->item_total_amount,
                        'payment_method' => $request->payment_method,
                        'payment_status' => 'pending',
                    ]);

                }

                // GCash Integration
                if ($payment_method == 'gcash') {
                    \Log::info('Product: ', ['product' => $product]);
                    \Log::info('Cart Item: ', ['cartItem' => $cartItem]);
                    $data = [
                        'data' => [
                            'attributes' => [
                                'line_items' => [
                                    [
                                        'currency' => 'PHP',
                                        'amount' => intval($request->item_total_amount) * 1000,
                                        'description' => $product->description,
                                        'name' => $product->name,
                                        'quantity' => $cartItem->quantity,
                                    ]
                                ],
                                'payment_method_types' => [
                                    $request->payment_method,
                                ],
                            ],
                            'success_url' => 'http://localhost:8000/mycart',
                            // 'cancel_url' => 'http://localhost:8000/mycart',
                            'description' => $product->description,
                        ]
                    ];

                    // GCash Request
                    $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
                        ->withHeader('Content-Type: application/json')
                        ->withHeader('accept: application/json')
                        ->withHeader('Authorization: Basic ' . base64_encode('sk_test_hwnohCHrq3eU4GFjfrz8AXo4'))
                        ->withData($data)
                        ->asJson()
                        ->post();
                    
                    // Check Response If True record the transaction ID
                    // dd($response);
                    if ($response) {
                        
                        $order = \App\Models\Order::create([
                            'user_id' => backpack_user()->id,
                            'cart_id' => $request->item_cart_id, // 'cart_id' => 'required
                            'product_id' => $request->item_product_id,
                            'address_id' => $request->item_address_id,
                            'total_amount' => $request->item_total_amount,
                            'status' => 'To Ship',
                        ]);

                        $payment = \App\Models\Payment::create([
                            'user_id' => backpack_user()->id,
                            'product_id' => $request->item_product_id,
                            'order_id' => $order->id,
                            'amount' => $request->item_total_amount,
                            'payment_method' => $request->payment_method,
                            'payment_status' => 'paid',
                            'gcash_number' => $request->gcash_number,
                            'gcash_transaction_id' => $response->data->id,
                        ]);
                        \Prologue\Alerts\Facades\Alert::success('GCash Payment Success')->flash();
                    }
                    
                }
                
                // If payment done update the stock
                // If payment done update the checkout status
                if ($payment) {

                    if ($order) {
                        $cart = \App\Models\Cart::where('user_id', backpack_user()->id)
                            ->where('id', $request->item_cart_id)
                            ->update([
                                'is_checked_out' => '1',
                            ]);
                        $product->update([
                            'stock' => $product->stock - $cartItem->quantity,
                        ]);

                    }

                    \Prologue\Alerts\Facades\Alert::success('Order placed successfully')->flash();
                    return redirect()->back();
                } else {
                    \Prologue\Alerts\Facades\Alert::error('Payment cannot be processed')->flash();
                    return redirect()->back();
                }

            } else {
                \Prologue\Alerts\Facades\Alert::error('Insufficient stock')->flash();
                return redirect()->back();
            }
        }

        \Prologue\Alerts\Facades\Alert::error('Order cannot be placed')->flash();
        return redirect()->back();
    }


    public function update(Request $request)
    {

        $rating = \DB::table('ratings')->where('id', $request->rating_id)->first();

        $is_delivered = \DB::table('orders')->where('id', $request->order_id)->update([
            'is_delivered' => true,
        ]);


        if ($is_delivered) {

            $feedback = \App\Models\Feedback::create([
                'user_id' => backpack_user()->id,
                'product_id' => $request->product_id,
                'rating_id' => $request->rating_id,
                'comment' => $request->comment,
                'rating' => optional($rating)->rating,
            ]);

            $payment = \App\Models\Payment::where('order_id', $request->order_id)
                ->where('user_id', backpack_user()->id)
                ->first();

            if ($payment->payment_status == 'cash') {

                $payment->update([
                    'payment_status' => 'paid',
                ]);
                \Prologue\Alerts\Facades\Alert::success('Order paid successfully')->flash();
            }

            \Prologue\Alerts\Facades\Alert::success('Order received successfully')->flash();

            \Prologue\Alerts\Facades\Alert::success('Feedback submitted successfully')->flash();
            return redirect()->back();
        }

        \Prologue\Alerts\Facades\Alert::error('Feedback cannot be submitted')->flash();

        return redirect()->back();
    }




    public function received($id)
    {
        $order = \App\Models\Order::find($id);

        // dd($order);

        if ($order) {

            $order->update([
                'status' => 'Delivered',
                'is_delivered' => true,
            ]);

            if ($order->is_delivered) {
                $payment = \App\Models\Payment::where('order_id', $id)
                    ->where('user_id', backpack_user()->id)
                    ->first();
                if ($payment->payment_status == 'pending') {

                    $payment->update([
                        'payment_status' => 'paid',
                    ]);
                    \Prologue\Alerts\Facades\Alert::success('Order paid successfully')->flash();
                }

                \Prologue\Alerts\Facades\Alert::success('Order received successfully')->flash();
                return redirect()->back();
            }



        }

        \Prologue\Alerts\Facades\Alert::error('Order cannot be received')->flash();
        return redirect()->back();
    }
}
