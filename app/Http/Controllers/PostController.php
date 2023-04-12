<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Redirect;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; // ngày , giờ đăng bài
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phan_trang = DB::table('posts')->orderBy('id','DESC')->paginate(8);

        $post = Post::with('category')->orderBy('id','DESC')->paginate(8);
        return view('layouts.post.index')->with(compact('post','phan_trang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $category = CategoryPost::all();
        return view('layouts.post.create')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post ->title = $request->title;
        $post ->short_desc = $request->short_desc;
        $post ->desc = $request->desc;
        $post ->post_category_id = $request->post_category_id;
        $post ->views = $request->views;
        $post ->post_day = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        if($request['image']){
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension(); // lay duoi mo rong cua ten file
            $name = time().'_'.$image->getClientOriginalName(); // lay ten file
            Storage::disk('public')->put($name,FacadesFile::get($image));
            $post ->image = $name;
        }else{
            $post->image = 'default.jpg';
        }
        $post->save();
        return redirect::route('post.index')->with('success','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $post)
    {
        $post = Post::find($post);
        $category = CategoryPost::all();
        return view('layouts.post.show')->with(compact('category','post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        $post = Post::find($post);
        $post ->title = $request->title;
        $post ->short_desc = $request->short_desc;
        $post ->desc = $request->desc;
        $post ->post_category_id = $request->post_category_id;
        $post ->views = $request->views;
        $post ->post_day = Carbon::now('Asia/Ho_Chi_Minh');
        if($request['image']){
            // FacadesFile::unlink('public/uploads/'.$post->image);
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension(); // lay duoi mo rong cua ten file
            $name = time().'_'.$image->getClientOriginalName(); // lay ten file
            Storage::disk('public')->put($name,FacadesFile::get($image));
            $post ->image = $name;       
        }
        $post->save();
        return redirect::route('post.index')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        // $path = 'public/uploads/';
        $post = Post::find($post);
        // unlink($path.$post->image); //xóa bài viết xóa luôn ảnh trong uploads
        $post->delete();
        return redirect()->back();
    }
}
