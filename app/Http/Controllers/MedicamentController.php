<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    public function index(){

        $medicaments= Medicament::all();
        return view('medicament.medicaments',compact('medicaments'));
    }

    public function create()
    {
        return view('medicament.create');
    }

    public function store(Request $request)
    {
        $medicament=new Medicament();
        $medicament->name = $request->input('Name');
        $medicament->price = $request->input('Price');
        $medicament->quantity = $request->input('Quantity');

        if($medicament->save()){
            return redirect()->back()->with('success','Medicament added successfully');
        }
        else{
            return redirect()->back()->with('failed','Failed to insert a new Medicament');
        }
    }


    public function edit($id)
    {

        $medicament =Medicament::find($id);
        return view('medicament.edit',compact('medicament'));
    }

    public function update(Request $request, $id)
    {
        $medicament=Medicament::find($id);
        $medicament->name = $request->input('Name');
        $medicament->price = $request->input('Price');
        $medicament->quantity = $request->input('Quantity');

        if($medicament->save())
        {return redirect()->back()->with('success','Medicament updated successfully');}
        else  {return redirect()->back()->with('failed','failed to updated the Medicament ');}

    }

    public function destroy($id)
    {

        if (Medicament::destroy($id)) {
            return redirect()->back()->with('delete','Medicament  deleted successfully');
        }
        return redirect()->back()->with('failed','failed to delete Medicament ');
    }
}
