<?php

namespace App\Http\Controllers;

use App\Models\ActMedical;
use Illuminate\Http\Request;

class ActMedicalController extends Controller
{
    public function index(){

        $actes= ActMedical::all();
        return view('actes.actes',compact('actes'));
    }

    public function create()
    {
        return view('actes.create');
    }

    public function store(Request $request)
    {
        $acte=new ActMedical();
        $acte->name = $request->input('categoryName');
        $acte->price= $request->input('Price');
        if($acte->save()){
            return redirect()->back()->with('success','Assurance added successfully');
        }
        else{
            return redirect()->back()->with('failed','Failed to insert a new assurance');
        }
    }


    public function edit($id)
    {

        $acte =ActMedical::find($id);
        return view('actes.edit',compact('acte'));
    }

    public function update(Request $request, $id)
    {
        $category=ActMedical::find($id);
        $category->name=$request->input('title');
        $category->price=$request->input('price');
        if($category->save())
        {return redirect()->back()->with('success','l acte médicale updated successfully');}
        else  {return redirect()->back()->with('failed','failed to updated l acte médicale ');}

    }

    public function destroy($id)
    {

        if (ActMedical::destroy($id)) {
            return redirect()->back()->with('delete','l acte médicale  deleted successfully');
        }
        return redirect()->back()->with('failed','failed to delete l acte médicale ');
    }
}
