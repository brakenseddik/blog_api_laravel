<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    public function user_view()
    {
        return view('user-view');
    }

    public function index()
    {

        $hospitals = Hospital::all();
        return view('hospital.hospitals', compact('hospitals'));
    }

    public function create()
    {
        return view('hospital.create');
    }

    public function store(Request $request)
    {
        $hospital = new Hospital();
        $hospital->name = $request->input('Name');
        $hospital->address = $request->input('Address');
        $hospital->email = $request->input('Email');
        $pass = $request->input('Password');
        $hospital->password = Hash::make($pass);
        if ($hospital->save()) {
            return redirect()->back()->with('success', 'Hospital added successfully');
        } else {
            return redirect()->back()->with('failed', 'Failed to insert a new Hospital');
        }
    }


    public function edit($id)
    {

        $hospital = Hospital::find($id);
        return view('hospital.edit', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $hospital = Hospital::find($id);
        $hospital->name = $request->input('Name');
        $hospital->address = $request->input('Address');
        $hospital->email = $request->input('Email');
        $pass = $request->input('Password');
        $hospital->password = Hash::make($pass);
        if ($hospital->save()) {
            return redirect()->back()->with('success', 'Hospital updated successfully');
        } else {
            return redirect()->back()->with('failed', 'failed to updated the hospital ');
        }

    }

    public function destroy($id)
    {

        if (Hospital::destroy($id)) {
            return redirect()->back()->with('delete', 'Hospital  deleted successfully');
        }
        return redirect()->back()->with('failed', 'failed to delete Hospital ');
    }
}
