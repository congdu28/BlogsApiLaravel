@extends('layout')
@section('content')
<!--banner-end-->
	<!--start-single-->
	<div class="single">
		<div class="container">
			<div class="col-md-8">
				<style>
					.single-top.single-post img{
                       width: 100% !important;                        
					}
				</style>
				<div class="single-top single-post img">
						<!-- <a href="#"><img height="400" width="1200" class="img-responsive" src="{{asset('uploads/'.$post->image)}}" alt=" "></a> -->
					<div class=" single-grid">
						<h2 class="text-center">{{$post->title}}</h2>				
							<ul class="blog-ic" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i> Admin</span> </a> </li>
		  						 <li><span style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><i class="glyphicon glyphicon-time"> </i>{{$post->post_day}}</span></li>		  						 	
		  						 <li><span style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><i class="glyphicon glyphicon-eye-open"> </i>Views: {{$post->views}}</span></li>
		  					</ul>		  						
						   <p>{!!$post->desc!!}</p>
						   <img height="200"  width="600" class="img-responsive" src="{{asset('uploads/'.$post->image)}}" alt=" ">
					</div>

					
					<div class="comments heading">
						<h3>Bình luận</h3>
						<div class="media">
					      	<div class="media-body">
						        <h4 class="media-heading">	Richard Spark</h4>
						        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      	</div>
					      <div class="media-right">
					        <a href="#">
								<img src="{{asset('images/si.png')}}" alt=""> </a>
					      </div>
					 </div>
					  <div class="media">
					      <div class="media-left">
					        <a href="#">
					        	<img src="{{asset('images/si.png')}}" alt="">
					        </a>
					      </div>
					      <div class="media-body">
					        <h4 class="media-heading">Joseph Goh</h4>
					        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
					      </div>
					    </div>
    				</div>
						<div class="comment-bottom heading">
							<h3>Leave a Comment</h3>
							<form>	
							<input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
							<input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
							<input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
							<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
								<input type="submit" value="Send">
						</form>
    				</div>	
					</div>	
				</div>
				<div class="col-md-4">
					<style>
						.cate-post:hover{
							color:red;
						}
						.post-title:hover{
							color:cyan;
						}
						
					</style>
					<style>
										.img-post {
										transition: transform 0.5s ease;
										}

										.img-post:hover {
										transform: scale(1.1);
										}
								</style>
				  <div class="abt-2 about-right heading">
					    <h3>Bài Viết Liên Quan</h3>		
							@foreach($post_related as $post)		
							<div class="might-grid">
							<a class="cate-post" href="{{route('danh-muc.show',['danh_muc'=>$post->category->id,'slug'=>Str::slug($post->category->title)])}}">
								<h6>{{$post->category->title}}</h6>
						    </a>
								<div class="grid-might">
									<a href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}"> <img src="{{asset('uploads/'.$post->image)}}"
                                       alt="{{Str::slug($post->title)}}" class="img-responsive img-post"> </a>
								</div>
								<div class="might-top">
									<h5 ><a class="post-title" href="{{route('bai-viet.show',['bai_viet'=>$post->id])}}">{{$post->title}}</a></h5>
									<p>{!!substr($post->desc,0,100)!!}</p>
								</div>
								<div class="clearfix"></div>
							</div>
							@endforeach		
					</div>
				</div>
			</div>			
					
	</div>
	<!--end-single-->
    @endsection