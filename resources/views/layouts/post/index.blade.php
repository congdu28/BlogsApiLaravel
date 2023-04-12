@extends('layouts.app')
@section('content')
<div class="container">
                 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">             
                <div class="card-header text-center fs-4" style="">DANH SÁCH BÀI VIẾT      
                     <a href="{{route('post.create')}}" class="btn btn-success m-2" style="float: right;">THÊM BÀI VIẾT</a>
                     <a href="{{('/home')}}" class="btn btn-success m-2" style="float: right;">TRỞ VỀ</a>
                </div>
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <h2>{{ Session::get('success') }}</h2>
                        </div>
                    @endif  
                    @if (Session::has('failure'))
                        <div class="alert alert-failure" role="alert">
                            <h2>{{ Session::get('failure') }}</h2>
                        </div>
                    @endif     
                </div>
                <div class="card-body">
                    <div class="row">
                     <table class="table table-hover table-responsive">                  
                        <thead class="text-center">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">TIÊU ĐỀ</th>
                                <th scope="col">MÔ TẢ</th>   
                                <th scope="col">ẢNH</th>     
                                <th scope="col">ID DANH MỤC</th>
                                <th scope="col">LƯỢT XEM</th>
                                <th scope="col">NGÀY TẠO</th>
                                <th scope="col">THAO TÁC</th>             
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($post as $post)
                            <tr class="text-center">
                                <th scope="row">{{$post->id}}</th>
                                <td> {{$post->title}}</td>
                                <!-- <td> {{$post->short_desc}}</td> -->
                                <td> {!!substr($post->desc,0,200)!!}</td>
                                <td> <img class="img-responsive" width="150" height="110" src="{{asset('uploads/'.$post->image)}}"></td>
                                <td> {{$post->category->title}}</td>
                                <td> {{$post->views}}</td>
                                <td> {{$post->post_day}}</td>
                                <td style="display: block;">
                                        <a href="{{route('post.show',[$post->id])}}" class="btn btn-primary" style="">SỬA</a>
                                        <form action="{{route('post.destroy',[$post->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input class="btn btn-danger m-2" type="submit" value="XÓA">
                                        </form>
                                </td>          
                             <td></td>    
                            </tr>                             
                           @endforeach 
                         </tbody>                 
                        </table>
                    </div>

                </div>
            </div>

          <div class="mt-3 "> {{$phan_trang ->links()}}</div>
        </div>
    </div>
</div>

@endsection
