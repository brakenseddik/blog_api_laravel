<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    public function index(){

        $assurances= Assurance::all();
        return view('assurance.assurances',compact('assurances'));
    }

    public function create()
    {
        return view('assurance.create');
    }

    public function store(Request $request)
    {
        $assurance=new Assurance();
        $assurance->name = $request->input('categoryName');
        if($assurance->save()){
            return redirect()->back()->with('success','Assurance added successfully');
        }
        else{
            return redirect()->back()->with('failed','Failed to insert a new assurance');
        }
    }


    public function edit($id)
    {

        $category =Assurance::find($id);
        return view('assurance.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category=Assurance::find($id);
        $category->name=$request->input('BlogTitle');
        if($category->save())
        {return redirect()->back()->with('success','Assurance updated successfully');}
        else  {return redirect()->back()->with('failed','failed to updated Assurance');}

    }

    public function destroy($id)
    {

        if (Assurance::destroy($id)) {
            return redirect()->back()->with('delete','assurance deleted successfully');
        }
        return redirect()->back()->with('failed','failed to delete assurance');
    }
}
