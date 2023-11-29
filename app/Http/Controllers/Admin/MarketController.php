<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class MarketController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MarketController extends Controller
{
    public function index()
    {
        return view('admin.market', [
            'title' => 'Market',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Market' => false,
            ],
            'page' => 'resources/views/admin/market.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MarketController.php',
        ]);
    }
}
