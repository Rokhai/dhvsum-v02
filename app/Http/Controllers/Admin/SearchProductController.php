<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class SearchProductController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SearchProductController extends Controller
{
    public function index()
    {
        return view('admin.search_product', [
            'title' => 'Search Product',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'SearchProduct' => false,
            ],
            'page' => 'resources/views/admin/search_product.blade.php',
            'controller' => 'app/Http/Controllers/Admin/SearchProductController.php',
        ]);
    }

    public function show() {
        
    }
}
