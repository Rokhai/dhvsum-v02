<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

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

        $product = \App\Models\Product::find($request->item_product_id);

        $cartItem = \App\Models\Cart::find($request->item_cart_id);

        if ($product) {
            if ($product->stock >= $cartItem->quantity) {
                $product->update([
                    'stock' => $product->stock - $cartItem->quantity,
                ]);

                $order = \App\Models\Order::create([
                    'user_id' => backpack_user()->id,
                    'cart_id' => $request->item_cart_id, // 'cart_id' => 'required
                    'product_id' => $request->item_product_id,
                    'total_amount' => $request->item_total_amount,
                    'status' => 'To Ship',
                ]);

                if ($order) {
                    $cart = \App\Models\Cart::where('user_id', backpack_user()->id)
                        ->where('id', $request->item_cart_id)
                        ->update([
                            'is_checked_out' => '1',
                        ]);
                }
                \Prologue\Alerts\Facades\Alert::success('Order placed successfully')->flash();
                return redirect()->back();
            } else {
                \Prologue\Alerts\Facades\Alert::error('Insufficient stock')->flash();
                return redirect()->back();
            }
        }

        \Prologue\Alerts\Facades\Alert::error('Order cannot be placed')->flash();
        return redirect()->back();
    }
}