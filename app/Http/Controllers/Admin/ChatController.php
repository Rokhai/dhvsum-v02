<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class ChatController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ChatController extends Controller
{
    public function index($id)
    {

        

        return view('admin.chat', [
            'title' => 'Chat',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Chat' => false,
            ],
            'page' => 'resources/views/admin/chat.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ChatController.php',
        ]);
    }
}
