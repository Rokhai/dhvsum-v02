<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * Class PeopleController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PeopleController extends Controller
{
    public function index()
    {
        return view('admin.people', [
            'title' => 'People',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'People' => false,
            ],
            'page' => 'resources/views/admin/people.blade.php',
            'controller' => 'app/Http/Controllers/Admin/PeopleController.php',
        ]);
    }

    public function search(Request $request) {
        $users = \DB::table('users')
        ->where('id', '!=', backpack_user()->id)
        ->orderBy('name', 'asc') // sort users by name in ascending order
        ->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('email', 'like', '%' . $request->input('q') . '%');
        })
        ->get();
    }
}
