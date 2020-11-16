<?php

namespace App\Http\Controllers;

use App\Models\Category;
use http\Exception\BadConversionException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        $categories=Category::all();
        return view('category.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->input('BlogTitle');
        if($category->save()){
            return redirect()->back()->with('success','Category added successfully');
        }
       else{
           return redirect()->back()->with('failed','Failed to insert a new category');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     * @return Renderable
 */
    public function edit($id)
    {

        $category =Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $category->name=$request->input('BlogTitle');
        if($category->save())
        {return redirect()->back()->with('success','Category updated successfully');}
        else  {return redirect()->back()->with('failed','failed to updated category');}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        if (Category::destroy($id)) {
            return redirect()->back()->with('delete','Category deleted successfully');
        }
        return redirect()->back()->with('failed','failed to delete category');
    }
}
