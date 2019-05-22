<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;





class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Category::paginate(5);
        return view('backend.category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data  = Category::all();
        return view('backend.category_form',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'required',
            'slug' => 'required',
            'category' => 'required',


        ]);

        $data = Category::create([
            'name' => $request->title,
            'slug' => $request->slug,
            'description' => ($request->desc) ? $request->desc: "NO description"


        ]);
    
        if($data)
        {
            $data->parent()->attach($request->category);
            return back()->with('message','Category Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        $data  = Category::all();
        return view('backend.category_form',array('data'=>$data,'category'=>$category));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         $category->name = $request->title;
       $category->slug  = $request->slug;
       $category->description = $request->desc;

       $category->parent()->detach();
       $category->parent()->attach($request->category);
       $category->save();
       return back()->with('message','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->forceDelete())
        {
            $category->parent()->detach();
            return back()->with('message','Category Deleted Successfully');
        }
    }


    public function putIntoTrash(Category $category)
    {
        if($category->delete())
        {
            return back()->with('message','Category Trashed Successfully');
        }
    }


    public function trash()
    {
        $data = Category::onlyTrashed()->paginate(5);
        
        return view('backend.trashed_category',compact('data'));
    }
    
    public function recoverFromTrash($id)

    {

        $category = Category::onlyTrashed()->find($id);
        
        if($category->restore())
        {
            return back()->with('message','Categroy Restore Successfully');
        }
    }

}
