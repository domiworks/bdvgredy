@extends('layouts.blog')
@section('content')

@if ((Agent::isMobile() == true) && (Agent::isTablet() == false)) {{-- if phone only --}}
	<nav id="listnav_sec">
		<a id="closer_area">
		</a>
		<div id="menu_area">
			<ul class="nav_spc blog_list">
				@for ($i = 0; $i < count($blogs); $i++)
						@if($i == 0)
							<li>
								<a class="list_node current" href="javascript:void(0)">
									<span class="title">
										{{$blogs[$i]->title}}
									</span>
									<span class="date">
										{{$blogs[$i]->created_time}}
									</span>
								</a>
								<input type='hidden' value='{{$blogs[$i]->id}}'>
							</li>
						@else
							<li>
								<a class="list_node" href="javascript:void(0)">
									<span class="title">
										{{$blogs[$i]->title}}
									</span>
									<span class="date">
										{{$blogs[$i]->created_time}}
									</span>
								</a>
								<input type='hidden' value='{{$blogs[$i]->id}}'>
							</li>
						@endif
					@endfor
				<!--<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>
				<li>
					<a class="list_node" href="#">
						<span class="title">
							The Title of Epicness
						</span>
						<span class="date">
							05.08.2014
						</span>
					</a>
				</li>-->
			</ul>
		</div>
		
	</nav>
@endif
		
<div class="blog_page_sec">
			@if ((Agent::isMobile() == false) || (Agent::isTablet() == true)) {{-- if desktop atau tablet --}}
				<ul class="blog_list">
					@for ($i = 0; $i < count($blogs); $i++)
						@if($i == 0)
							<li>
								<a class="list_node current" href="javascript:void(0)">
									<span class="title">
										{{$blogs[$i]->title}}
									</span>
									<span class="date">
										{{$blogs[$i]->created_time}}
									</span>
								</a>
								<input type='hidden' value='{{$blogs[$i]->id}}'>
							</li>
						@else
							<li>
								<a class="list_node" href="javascript:void(0)">
									<span class="title">
										{{$blogs[$i]->title}}
									</span>
									<span class="date">
										{{$blogs[$i]->created_time}}
									</span>
								</a>
								<input type='hidden' value='{{$blogs[$i]->id}}'>
							</li>
						@endif
					@endfor
					
					
					<!--<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>
					<li>
						<a class="list_node" href="#">
							<span class="title">
								The Title of Epicness
							</span>
							<span class="date">
								05.08.2014
							</span>
						</a>
					</li>-->
				</ul>	
			@endif
			
			<div class="blog_content">
				<div class="news_cover_image">
					<h1 class="title title_of_display_blog">
						{{$blogs[0]->title}}
					</h1>
					<span class="date date_of_display_blog">
						{{$blogs[0]->created_time}}
					</span>
				</div>
				<div class="news_content content_of_display_blog">
					{{$blogs[0]->content}}
				</div>
				<script>
					$('.news_cover_image').css('background','url("{{$blogs[0]->photo}}") no-repeat center center fixed;');
				</script>
			</div>
		</div>
		
<script>
	$('body').on('click','.list_node',function(){
		$id_blog=$(this).next().val();
		$('.current').attr('class','list_node');
		$(this).attr('class','list_node current');
		$.ajax({
			type: 'GET',
			url: 'one_blog/'+$id_blog,
			success: function(response){
				$('.title_of_display_blog').text(response.title);
				$('.date_of_display_blog').text(response.created_time);
				$('.content_of_display_blog').html(response.content);
				$('.content_of_display_blog').first().css('color','red');
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(errorThrown);
			}
		},'json');
	});
</script>
@stop