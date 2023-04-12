@extends('layout')
@section('content')
@include('pages.banner')   
<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">									
				  <div class="about-tre">
					<div class="a-1">
                            @foreach($all_post as $post)
							<hr>
							<a href="{{route('danh-muc.show',['danh_muc'=>$post->category->id,'slug'=>Str::slug($post->category->title)])}}">
								<h6>{{$post->category->title}}</h6>
						    </a>
                            <a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">
                             <div class="row">
							    <style>
										.img-post {
										transition: transform 0.5s ease;
										}

										.img-post:hover {
										transform: scale(1.1);
										}
								</style>
                                <div class="col-md-6 abt-left">
                                    <!-- lấy alt theo tên ảnh để seo tốt hơn -->
                                   <img class="img-post" width="190" height="210" src="{{asset('uploads/'.$post->image)}}"
                                       alt="{{Str::slug($post->title)}}">
                                </div>	
                                <div class="col-md-6 abt-left">
                                   
                                    <h3><a href="">{{$post->title}}</a></h3>
                                    <p>{!!substr($post->desc,0,200)!!}</p>
                                    <div class="about-btn">
							            <a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">Chi tiết...</a>
					    	        </div>
                                    <label style="font-family: Verdana, Geneva, Tahoma, sans-serif; margin-bottom: 10px;">{{$post->post_day}}</label>   
                                </div>	
                             </div>
                            </a>  
                            @endforeach		
							<hr>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="mt-3 "> {{$all_post ->links()}}</div>
				</div>
				<div class="col-md-4 about-right heading">	
					<div class="abt-2">
					    <h3>Bài Viết Mới Nhất</h3>		
							@foreach($lastest_post as $post)		
							<div class="might-grid">
								<a href="{{route('danh-muc.show',['danh_muc'=>$post->category->id,'slug'=>Str::slug($post->category->title)])}}">
									<h6>{{$post->category->title}}</h6>
								</a>
								<div class="grid-might">
									<a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}"> <img src="{{asset('uploads/'.$post->image)}}"
                                       alt="{{Str::slug($post->title)}}" class="img-responsive img-post"> </a>
								</div>
								<div class="might-top">
									<h5><a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">{{$post->title}}</a></h5>
									<p>{!!substr($post->desc,0,100)!!}</p>
								</div>
								<div class="clearfix"></div>
							</div>
							@endforeach		
					</div>
					<hr>
					<div class="abt-2">
					<h3>Bài Viết Xem Nhiều Nhất</h3>
						@foreach($viewest_post as $post)	
						<ul>
							<li><a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">{{$post->title}}</a></li>
						</ul>
						@endforeach		
					</div>
					<hr>
					<div class="abt-2">
						<h3>Đăng Ký Nhận Thông Tin</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Đăng Ký">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
    @endsection