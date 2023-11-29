<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class MycartController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MycartController extends Controller
{
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
}
