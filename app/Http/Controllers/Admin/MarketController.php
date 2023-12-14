<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class MarketController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MarketController extends Controller
{


    public function index()
    {


        $products = \App\Models\Product::where('is_active', 1)
            ->where('is_approved', 1)
            ->paginate(10);
        $categories = \App\Models\Category::all();
        $ratings = \App\Models\Rating::all();

        return view('admin.market', [
            'title' => 'Market',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Market' => false,
            ],
            'page' => 'resources/views/admin/market.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MarketController.php',

            'products' => $products,
            'categories' => $categories,
            'ratings' => $ratings,
        ]);





    }


    public function search(Request $request)
    {
        $search = $request->get('query');
        $products = \App\Models\Product::where('name', 'like', '%' . $search . '%')
            ->where('is_active', 1)
            ->where('is_approved', 1)
            ->paginate(10);
        $categories = \App\Models\Category::all();
        $ratings = \App\Models\Rating::all();

        return view('admin.market', [
            'title' => 'Market',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Market' => false,
            ],
            'page' => 'resources/views/admin/market.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MarketController.php',
            'products' => $products,
            'categories' => $categories,
            'ratings' => $ratings,
        ]);
    }

    public function filter(Request $request)
    {


        $category = $request->get('select-category');
        $rating = $request->get('select-rating');
        $price = $request->get('select-price');

        $query = \App\Models\Product::query();



        if ($category) {
            $query->where('category_id', $category);
        }

        if ($rating) {
            $query->whereHas('feedback', function ($query) use ($rating) {
                $query->where('rating_id', '>=', $rating);
            });
        }

        if ($price) {
            $query->where('price', '<=', $price);
        }

        $products = $query->where('is_active', 1)->where('is_approved', 1)->paginate(10);
        $categories = \App\Models\Category::all();
        $ratings = \App\Models\Rating::all();
        $request->flash();
        return view('admin.market', [
            'title' => 'Market',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Market' => false,
            ],
            'page' => 'resources/views/admin/market.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MarketController.php',
            'products' => $products,
            'categories' => $categories,
            'ratings' => $ratings,
        ]);
    }
}
