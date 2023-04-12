@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">             
                <div class="card-header text-center fs-4">CẬP NHẬT DANH MỤC BÀI VIẾT 
                     <a href="{{('/home')}}" class="btn btn-success m-2" style="float: right;">TRỞ VỀ</a>
                     <a href="{{route('category.index')}}" class="btn btn-success m-2" style="float: right;">XEM DANH SÁCH</a>
                </div>
                <div></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif      

                    <div class="row">
                        <form autocomplete="off" action="{{route('category.update',[$category->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">TÊN DANH MỤC</label>
                                <input type="text" value="{{$category->title}}" name="title" class="form-control">
                                <div id="emailHelp" class="form-text">Sửa danh mục</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">MÔ TẢ DANH MỤC</label>
                                <textarea type="text" value="{{$category->short_desc}}" name="short_desc" rows="5" style="resize: none;" class="form-control"></textarea>
                                <div id="emailHelp" class="form-text">Sửa mô tả danh mục (không quá 250 ký tự)</div>
                            </div>
                         <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                        </form>
                    </div>

    
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
