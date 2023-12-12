<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->avatar->extension();
        
        $request->avatar->move(public_path('storage/uploads/avatars'), $imageName);

        $uploadAvatar = "storage/uploads/avatars/". $imageName;
        // $uploadAvatar = $request->avatar;
        $avatar = \DB::table('users')->where('id', backpack_user()->id)->update(['avatar' => $uploadAvatar]);

        if ($avatar) {
            \Prologue\Alerts\Facades\Alert::success('Avatar update unsuccessfully')->flash();
            return redirect()->back();
        }
        
        \Prologue\Alerts\Facades\Alert::success('Avatar updated successfully')->flash();
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
