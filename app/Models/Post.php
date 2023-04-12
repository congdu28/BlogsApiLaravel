<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'short_desc', 'desc', 'image','post_category_id'];


    public function category(){
        return $this->belongsTo('App\Models\CategoryPost','post_category_id'); // hiển thị bài viết theo danh mục
    }
}
