<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $post = Post::with('category')->where('id',$id)->first(); // show bài viết theo danh mục, lấy ra 1 bài viết

        // lấy bài viết liên quan theo danh mục
        foreach($post as $p){
            $category_id =  $post->post_category_id;
        }

        // lấy bài viết liên quan, trừ bài đang xem
        $post_related = Post::with('category')->where('post_category_id',$category_id)->whereNotIn('id',[$id])
                        ->orderBy(DB::raw('RAND()'))->limit(5)->get();;

        $category = CategoryPost::all();
        return view('pages.details')->with(compact('category','post','post_related'));
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
