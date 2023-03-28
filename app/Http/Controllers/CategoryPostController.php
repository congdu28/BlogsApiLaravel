<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $category = CategoryPost::all();
      return view('layouts.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $category = new CategoryPost();
       $category->title = $request->title;
       $category->save();
       return redirect::route('category.index')->with('success','Thêm danh mục thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        return view('layouts.category.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $categoryPost)
    {  
        $data = $request->all();
        $category = CategoryPost::find($categoryPost);
        $category->title = $data['title'];
        $category->save();    
        return redirect::route('category.index')->with('success','Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        $category->delete();
        return redirect()->back();
    }
}
