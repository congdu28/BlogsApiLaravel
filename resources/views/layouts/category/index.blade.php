@extends('layouts.app')
@section('content')
<div class="container">           
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">             
                <div class="card-header text-center fs-4" style="">DANH MỤC BÀI VIẾT      
                     <a href="{{route('category.create')}}" class="btn btn-success m-2" style="float: right;">THÊM DANH MỤC</a>
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
                     <table class="table table-hover text-center table-responsive">                  
                        <thead>
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">TÊN DANH MỤC</th>
                            <th scope="col">MÔ TẢ</th>
                            <th scope="col">THAO TÁC</th>     
                            <th scope="col"></th>                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $categories)
                            <tr>
                             <th scope="row">{{$categories->id}}</th>
                             <td> {{$categories->title}}</td>
                             <td> {!!substr($categories->short_desc,0,200)!!}</td>
                             <td> </td>
                             <td style="display: inline;">
                                    <a href="{{route('category.show',[$categories->id])}}" class="btn btn-primary mt-3" style="">SỬA</a>
                                    <form action="{{route('category.destroy',[$categories->id])}}" method="POST">
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
            
        </div>
    </div>
</div>

@endsection
