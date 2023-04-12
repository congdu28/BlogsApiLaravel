<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category_post = Post::with('category')->where('post_category_id',$id)->orderBy('id','DESC')->paginate(7); // show bài viết theo danh mục
        $category = CategoryPost::all();
        $viewest_post = Post::with('category')->orderBy('views','desc')->where('post_category_id',$id)->limit(5)->get(); // show bài viết nhiều views nhất theo danh mục
        $title_category = CategoryPost::find($id);
        $category_recommend = CategoryPost::whereNotIn('id',[$id])->get(); // show gợi ý các danh mục khác
        return view('pages.category')->with(compact('category','category_post','title_category','viewest_post','category_recommend'));
      
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
