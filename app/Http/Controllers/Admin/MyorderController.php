<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

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
}
