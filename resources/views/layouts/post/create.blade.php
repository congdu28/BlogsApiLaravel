@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">             
                <div class="card-header text-center fs-4">THÊM BÀI VIẾT 
                     <a href="{{('/home')}}" class="btn btn-success m-2" style="float: right;">TRỞ VỀ</a>
                     <a href="{{route('post.index')}}" class="btn btn-success m-2" style="float: right;">XEM DANH SÁCH</a>
                </div>
                <div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif      

                    <div class="row">
                        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">TIÊU ĐỀ BÀI VIẾT</label>
                                <input type="text" name="title" class="form-control" id="" aria-describedby="">
                                <div id="emailHelp" class="form-text">Post Title</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">LƯỢT XEM</label>
                                <input type="text" name="views" class="form-control" id="" aria-describedby="">
                                <div id="emailHelp" class="form-text">Views</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">MÔ TẢ NGẮN GỌN</label>
                                <input id="ckeditor_shortdesc" type="text" name="short_desc" class="form-control">
                                <div id="emailHelp" class="form-text">Short Description</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">MÔ TẢ CHI TIẾT</label>
                                <textarea id="ckeditor_desc" name="desc" class="form-control" rows="8"></textarea>
                                <div id="emailHelp" class="form-text">Description</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ẢNH</label>
                                <input type="file" name="image" class="form-control" id="" aria-describedby="">
                                <div id="emailHelp" class="form-text">Image</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">DANH MỤC</label>
                                <select class="form-select" aria-label="Default select example" name="post_category_id">
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->title}}</option>                       
                                    @endforeach
                                 </select>
                            </div>
                         <button type="submit" class="btn btn-primary mt-â">THÊM</button>
                        </form>
                    </div>

    
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
