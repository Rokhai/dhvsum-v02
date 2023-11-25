<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class MessageController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MessageController extends Controller
{
    public function index()
    {
        return view('admin.message', [
            'title' => 'Message',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Message' => false,
            ],
            'page' => 'resources/views/admin/message.blade.php',
            'controller' => 'app/Http/Controllers/Admin/MessageController.php',
        ]);
    }
}
