<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class ActivityController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ActivityController extends Controller
{
    public function index()
    {
        return view('admin.activity', [
            'title' => 'Activity',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Activity' => false,
            ],
            'page' => 'resources/views/admin/activity.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ActivityController.php',
        ]);
    }
}
