@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">             
                <div class="card-header text-center fs-4">THÊM DANH MỤC BÀI VIẾT 
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
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">TÊN DANH MỤC</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Danh mục bài viết</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">MÔ TẢ NGẮN GỌN</label>
                                <textarea name="short_desc" class="form-control" id="" rows="5" style="resize: none;" aria-describedby=""> </textarea>
                                <div id="emailHelp" class="form-text">Mô tả danh mục (không quá 250 ký tự)</div>
                            </div>
                         <button type="submit" class="btn btn-primary">THÊM</button>
                        </form>
                    </div>

    
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
