<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
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
        
        $datas = ActivityLog::orderBy('created_at', 'desc')
            ->where('user_id', backpack_user()->id)
            ->paginate(20);

        return view('admin.activity', [
            'datas' => $datas,
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
