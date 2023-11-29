<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

/**
 * Class MycartController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MycartController extends Controller
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; } 
    public function index()
    {
        return view('admin.mycart', [
            'title' => 'Mycart',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Mycart' => false,
            ],
            'page' => 'resources/views/admin/mycart.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MycartController.php',
        ]);
    }


    public function store(Request $request)
    {
        // dd($request);

        // \app\Models\Cart::create([
        //     'user_id' => $request->user_id,
        //     'product_id' => $request->product_id,
        //     'quantity' => $request->quantity,
        // ]);
        Cart::create([
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
        return redirect()->back()->with('notyf_success', 'Product added to cart');
            
    }
}
