<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_post = Post::orderBy('id','desc')->with('category')->paginate(10);
        $lastest_post = Post::orderBy(DB::raw('RAND()'))->limit(5)->get();
        $viewest_post = Post::orderBy('views','asc')->limit(5)->get();
        $category = CategoryPost::all();
        return view('pages.main')->with(compact('category','all_post','lastest_post','viewest_post'));
    }
    public function tim_kiem()
    {
        $keywords =$_GET['keywords'];
        $category_post = Post::with('category')->where('title','LIKE','%'.$keywords.'%')
        ->orwhere('short_desc','LIKE','%'.$keywords.'%')->orwhere('desc','LIKE','%'.$keywords.'%')->get();
        $category = CategoryPost::all();     
        $category_recommend = CategoryPost::all(); // show gợi ý các danh mục
        return view('pages.timkiem')->with(compact('category','category_post','keywords'));
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
    public function show(string $id)
    {
        
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
