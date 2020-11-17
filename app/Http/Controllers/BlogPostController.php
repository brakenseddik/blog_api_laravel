<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $blogs=BlogPost::all();
        return view('blog.posts',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories= Category::all();
        return view('blog.create-post',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Http\Response|string
     */
    public function store(Request $request)

    {
$blog=new  BlogPost();
$blog->title=$request->input('blogPost');
$blog->details=$request->input('blogDetails');
$blog->category_id=$request->input('category');
$blog->user_id=0;
        if($blog->save()){
            $photo=$request->file('featuredPhoto');
            if ($photo!=null){
                $ext=$photo->getClientOriginalExtension();
                $fileName=rand(10000,5000).".".$ext;
                if ($ext=='jpg' ||$ext=='png' ||$ext=='jpeg'){
                   if($photo->move(public_path(),$fileName)){
                       $blog=BlogPost::find($blog->id);
                       $blog->featured_image_url=url('/').'/'.$fileName;
                       $blog->save();
                   }

                }
            }
            return redirect()->back()->with('success','Category added successfully');
        }
        else{
            return redirect()->back()->with('failed','Failed to insert a new category');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $blogs=BlogPost::find($id);
        $categories=Category::all();
        return view('blog.edit-post',compact('blogs','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $blog= BlogPost::find($id);
        $blog->title=$request->input('blogPost');
        $blog->details=$request->input('blogDetails');
        $blog->category_id=$request->input('category');
        $blog->user_id=0;
        if($blog->save()){
            $photo=$request->file('featuredPhoto');
            if ($photo!=null){
                $ext=$photo->getClientOriginalExtension();
                $fileName=rand(10000,5000).".".$ext;
                if ($ext=='jpg' ||$ext=='png' ||$ext=='jpeg'){
                    if($photo->move(public_path(),$fileName)){
                        $blog=BlogPost::find($blog->id);
                        $blog->featured_image_url=url('/').'/'.$fileName;
                        $blog->save();
                    }

                }
            }
            return redirect()->back()->with('success','Category added successfully');
        }
        else{
            return redirect()->back()->with('failed','Failed to insert a new category');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (BlogPost::destroy($id)) {
            return redirect()->back()->with('delete','Blog post deleted successfully');
        }
        return redirect()->back()->with('failed','failed to delete post');
    }
}
