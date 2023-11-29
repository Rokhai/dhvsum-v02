<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class ViewProductController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ViewProductController extends Controller
{

 

    public function index()
    {
        $product = \App\Models\Product::first();

        return view('admin.view_product', [
            'title' => 'View Product',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'ViewProduct' => false,
            ],
            'page' => 'resources/views/admin/view_product.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ViewProductController.php',
            'product' => $product,
        ]);
    }

        //  if ($id) {
        //     $product = \App\Models\Product::find($id);

        //     if ($product === null) {
        //         return redirect()->back()->with('notyf_error', 'Product not found');
        //     }

        //     return view('admin.view_product', [
        //         'title' => 'View Product',
        //         'breadcrumbs' => [
        //             trans('backpack::crud.admin') => backpack_url('dashboard'),
        //             'ViewProduct' => false,
        //         ],
        //         'page' => 'resources/views/admin/view_product.blade.php',
        //         'controller' => 'app/Http/Controllers/Admin/ViewProductController.php',
        //         'product' => $product,
        //     ]);
        // }

        // return view('admin.view_product', [
        //     'title' => 'View Product',
        //     'breadcrumbs' => [
        //         trans('backpack::crud.admin') => backpack_url('dashboard'),
        //         'ViewProduct' => false,
        //     ],
        //     'page' => 'resources/views/admin/view_product.blade.php',
        //     'controller' => 'app/Http/Controllers/Admin/ViewProductController.php',
        // ]);

    public function show($id)
    {
        $product = \App\Models\Product::find($id);

        if ($product === null) {
            return redirect()->back()->with('notyf_error', 'Product not found');
        }

        // return backpack_view('admin.view_product')->with('product', $product);
        return view('admin.view_product')->with('product', $product);
    }

    public function store( Request $request)
    {
        \App\Models\Cart::create([
            'user_id' => backpack_user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        // $data = $request->validate([
        //    'user_id' => 'required',
        //     'product_id' => 'required',
        //     'quantity' => 'required',
        // ]);

        // $cart = \App\Models\Cart::create($data);

        // return redirect()->back()->with('notyf_success', 'Product added to cart');
        //    $this->traitStore( $request);

        // return url()->previous();
        // return redirect()->back()->with('notyf_success', 'Product added to cart');
        \Prologue\Alerts\Facades\Alert::success('Product added to cart');
        return redirect()->back();

        
    }
}
