@extends('layout')
@section('content')
<!--banner-end-->
	<!--start-single-->
    <div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
						<div class="about-one">
							<h2>Kết quả Từ khóa: {{$keywords}}</h2>
						</div>
					<div class="about-tre">
						<div class="a-1">
						<style>
								.img-post {
									transition: transform 0.5s ease;
								}

								.img-post:hover {
									transform: scale(1.1);
								}
								</style>
                            @foreach($category_post as $post)
							<hr>
							<a href="{{route('danh-muc.show',['danh_muc'=>$post->category->id,'slug'=>Str::slug($post->category->title)])}}">
								<h6>{{$post->category->title}}</h6>
						    </a>
                            <a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">
                             <div class="row">
                                <div class="col-md-6 abt-left">
                                    <!-- lấy alt theo tên ảnh để seo tốt hơn -->
                                   <img class="img-post" width="190" height="210" src="{{asset('uploads/'.$post->image)}}"
                                       alt="{{Str::slug($post->title)}}">
                                </div>	
                                <div class="col-md-6 abt-left">
                                    <h3><a href="">{{$post->title}}</a></h3>
                                    <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size: medium;">
										{!!$post->short_desc!!}
								    </p>
                                    <div class="about-btn">
							            <a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">Chi tiết...</a>
					    	        </div>
                                    <label style="font-family:  'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">{{$post->post_day}}</label>   
                                </div>	
                             </div>
                            </a>  
                            @endforeach		
							<hr>
							<div class="clearfix"></div>
						</div>
				
						
					</div>
				</div>
				<div class="col-md-4 about-right heading">
					<div class="abt-2">
					<h3>Danh Mục Liên Quan</h3>
						@foreach($category as $cate_recommend)	
						<ul>
							<li><a href="{{route('danh-muc.show',['danh_muc'=>$cate_recommend->id,'slug'=>Str::slug($cate_recommend->title)])}}">
								{{$cate_recommend->title}}</a>
							</li>
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
	<!--end-single-->
@endsection