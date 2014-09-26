@extends('layouts.cleaning_tips')
@section('content')
<div class="blog_page_sec">
			<div class="blog_content" style="width: 100%"> <!-- width: 100 khusus cleaning_tips saja -->
				<div class="news_cover_image">
					<h1 class="title">
						{{$cleaning->title}}
					</h1>
					<span class="date">
						{{$cleaning->created_time}}
					</span>
				</div>
				<div class="news_content">
					<p>
						{{$cleaning->content}}
					</p>
				</div>
			</div>
		</div>
@stop