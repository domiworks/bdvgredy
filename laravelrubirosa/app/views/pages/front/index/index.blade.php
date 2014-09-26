@extends('layouts.index')
@section('content')
<section id="landing_sec">
			<div class="c_12">
				<div class="g_12">
					<div class="tableed landing_spc">
						<div class="celled">
							<div class="rubirosa_logo_center">
								<img src="./assets/img/landing_logo.png"/>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</section>
		
		<section id="story_sec">
			<div class="c_12">
				<div class="g_12">
					<h2 class="title mb_60">
						THE BIRTH OF RUBIROSA
					</h2>
					
					<span class="quote_o sprite quomark_o"></span>
						<p class="quote_cntnt">
							It started off with the things we love most, the sight and smell of beautiful leather goods.
						</p>
					<span class="quote_c sprite quomark_c"></span>
					
					<p class="mt_60 mb_60">
						In our instant culture of 2min noodles and 5min ab workouts, we wanted to create something the old fashion way, that focuses not on getting things done fast, but a fusion of good design, superior quality, attention to the finest detail and products that define you the way you are.
					</p>
					
					<span class="quote_o sprite quomark_o"></span>
						<p class="quote_cntnt">
							We aim to bring you products that will identify and embody your personality.						
						</p>
					<span class="quote_c sprite quomark_c"></span>
					
					<p class="mt_60 mb_60">
						Leather goods will no longer be used as accessories, but an essential. And hence, we present you Rubirosa, the finest leather goods in town for all you leather geeks, nerds and afficionados, or just anyone who wants to look good. For us, worksmanship is critical and every tiny stitch detail and pattern is poured with love and care. 					
					</p>
					
					<span class="quote_o sprite quomark_o"></span>
						<p class="quote_cntnt">
							When we make things we love.						
						</p>
					<span class="quote_c sprite quomark_c"></span>
					
					<p class="mt_60 tal_c">
						it's certain to last you a lifetime.					
					</p>
				</div>
				<div class="g_12">
					<div class="c_12">
						<span class="v_mis mt_120"></span>
						<h3 class="subtitle mt_60">
							vision
						</h3>
						<p class="mt_10 tal_c">
							We aim to deliver expertly crafted, elegant, timeless, and<br/>functional leather products.						
						</p>
						<span class="m_mis mt_120"></span>
						<h3 class="subtitle mt_60">
							mission
						</h3>
						<p class="mt_10 tal_c">
							To provide the best leather goods worldwide.						
						</p>
					</div>
				</div>
			</div>
		</section>
		
		
		<section id="main_cat_sec">
			<div class="main_cat_node" id="mc_men">
				<a href="category/man">
					<div class="tableed">
						<div class="celled">
							<span class="main_cat_title">
							men
							</span>
						</div>
					</div>
				</a>
			</div>
			<div class="main_cat_node" id="mc_unisex">
				<a href="category/unisex">
					<div class="tableed">
						<div class="celled">
							<span class="main_cat_title">
							unisex
							</span>
						</div>
					</div>
				</a>
			</div>
			<div class="main_cat_node"  id="mc_women">
				<a href="category/woman">
					<div class="tableed">
						<div class="celled">
							<span class="main_cat_title">
							women
							</span>
						</div>
					</div>
				</a>
			</div>
			
		</section>
		
		@if (Agent::isMobile() == true) {{-- if phone dan tablet --}}
		<section id="cleantips_sec" class="">
			
			<div class="right_spc">
				<div class="tableed ">
					<div class="celled">
						<h2 class="title">
							Cleaning Tips
						</h2>
						<p class="title_desc">
							Rubirosa gives a tutorial on daily maintanence for leather products, we hope it&rsquo;s useful.					
						</p>
					</div>
				</div>
			</div>
			<div class="left_spc cleantips_thumb ">
				<div class="cleantips_thumb_intr ">
					<div class="tableed ">
						<div class="celled">
							<a class="button_holow wht" href="cleaning_tips">See tutorial</a>
						</div>
					</div>
				</div>
			</div>
			
		</section>		
		@else
		<section id="cleantips_sec" class="">
			<div class="left_spc cleantips_thumb ">
				<div class="cleantips_thumb_intr ">
					<div class="tableed ">
						<div class="celled">
							<a class="button_holow wht" href="cleaning_tips">See tutorial</a>
						</div>
					</div>
				</div>
			</div>
			<div class="right_spc">
				<div class="tableed ">
					<div class="celled">
						<h2 class="title">
							Cleaning Tips
						</h2>
						<p class="title_desc">
							Rubirosa gives a tutorial on daily maintanence for leather products, we hope it&rsquo;s useful.					
						</p>
					</div>
				</div>
			</div>
		</section>
		@endif
		
		

		
		<section id="blog_sec" class="">
			<div class="left_spc ">
				<div class="tableed">
					<div class="celled">
						@if($blog != NULL)
							<h2 class="title">
								Blog
							</h2>
							<h3 class="lts_blog_title">
								{{$blog->title}} 
							</h3>
							<div class="lts_blog_date">
								{{$blog->created_time}}
							</div>
							@if (Agent::isMobile() == true) {{-- if phone dan tablet --}}
									<!-- sengaja dikosongkan bro -->
							@else
								<div class="lts_blog_content">
									<!--Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare...-->
									{{$blog->content}}
								</div>
							@endif
						@else
							<h2 class="title">
								-
							</h2>
							<div class="lts_blog_title">
								Latest Blog Title Placed Here
							</div>
							<div class="lts_blog_date">
								-
							</div>
							@if (Agent::isMobile() == true) {{-- if phone dan tablet --}}
									<!-- sengaja dikosongkan bro -->
							@else
								<div class="lts_blog_content">
									<!--Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare...-->
									-
								</div>
							@endif
						@endif
					</div>
				</div>
			</div>
			<div class="right_spc blog_thumb ">
				<div class="blog_thumb_intr ">
					<div class="tableed ">
						<div class="celled">
							<a class="button_holow wht" href="blog">Read More</a>
						</div>
					</div>
				</div>
			</div>
			
		</section>
		
		<section id="footer_sec">
			
		</section>
<script>
	if($('.lts_blog_content').text().length > 500){
		$text = $('.lts_blog_content').text();
		
		$combine = $text.substr(0, 497)+"...";
		
		$('.lts_blog_content').html($combine);
	}
</script>
@stop