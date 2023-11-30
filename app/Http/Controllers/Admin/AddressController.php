<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //

    public function store(Request $request)
    {
        // $this->traitStore();

        // dd($request);

        // $data = $request->validate([
        //     'fullname' => 'required',
        //     'address' => 'required',
        //     'contact_number' => 'required|numeric',
        //     'email' => 'required',
        // ]);

        // dd($data);

        // if ($data) {

        // }
        
        \App\Models\Address::create([
            'user_id' => backpack_user()->id,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,

        ]);
        \Prologue\Alerts\Facades\Alert::success('Address added to your account')->flash();
        return redirect()->back();


        // \Prologue\Alerts\Facades\Alert::success('Address added to your account');
        // \Prologue\Alerts\Facades\Alert::error('Address cant add to your account')->flash();
        // return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        // $this->traitUpdate();
        // dd($request);
        $address = \App\Models\Address::find($id);
        
        $address->update([
            'user_id' => backpack_user()->id,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,

        ]);
        \Prologue\Alerts\Facades\Alert::success('Address updated to your account')->flash();
        return redirect()->back();
    }

    public function destroy($id)
    {
        \App\Models\Address::destroy($id);
        \Prologue\Alerts\Facades\Alert::success('Address deleted from your account')->flash();
        return redirect()->back();
    }
}
