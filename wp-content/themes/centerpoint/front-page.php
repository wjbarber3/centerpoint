<?php get_header(); ?>

<?php $theme = get_template_directory_uri(); ?>

<div class="slider">
	<a href="#" class="control next"><i class="fa fa-angle-right"></i></a>
	<a href="#" class="control prev"><i class="fa fa-angle-left"></i></a>	
	<ul>
		<li><img src="<?php echo $theme . '/img/slides/slide-1.jpg'; ?>" alt="">
			<div class="slide-overlay">	
				<img src="<?php echo $theme . '/img/previ-learn.png'; ?>" width="160">
				<h1>Make a Measurable Difference for Your Students, Grades 2–8</h1>
				<p>Introducing Previ Learn™ English Language Arts/Literacy &amp; Mathematics &amp; Diagnostic Tools</p>
				<a class="main-btn" href=""><i class="main-btn-icon fa fa-chevron-right"></i>Learn More</a>
			</div><!--end slide-overlay-->
		</li>
		<li><img src="<?php echo $theme . '/img/slides/slide-2.jpg'; ?>" alt=""></li>
	</ul>
</div><!--end slider-->

<div class="full-text">
	<div class="main-wrap">
		<h1>Success. Every Student. Every teacher.</h1>
		<p>CenterPoint Education Solutions is a non-profit organization committed to creating high-quality, innovative solutions to empower educators and improve learning for all students. Founded and led by veteran educators and assessment experts, CenterPoint’s customized solutions connect standards, curriculum, assessments, and instructional practice to support teaching and learning.</p>
	</div><!--end main-wrap-->
</div><!--end intro-->

<div class="three-col-icon">
	<div class="main-wrap">
		<h1>Engage with CenterPoint Education Solutions</h1>
		<div class="col-md-4 column">
			<img src="<?php echo $theme . '/img/previ-icon.png';?>" width="90" alt="">
			<h2>Introducing Previ Teaching &amp; Learning</h1>
			<p>Previ Teaching and Learning solutions empower educators with innovative assessments, instructional strategies and high quality professional learning leading to student achievement. </p>
			<a class="main-btn" href=""><i class="main-btn-icon fa fa-chevron-right"></i>Learn More</a>
		</div><!--end column-->
		<div class="col-md-4 column">
			<img src="<?php echo $theme . '/img/solution-icon.png';?>" width="90" alt="">
			<h2>Introducing Centerpoint Educational Solutions</h1>
			<p>Porrupiet alique optatem alit, occum ut fugia conseni moloremquid endicia cus</p>
			<a class="main-btn" href=""><i class="main-btn-icon fa fa-chevron-right"></i>Learn More</a>
		</div><!--end column-->
		<div class="col-md-4 column">
			<img src="<?php echo $theme . '/img/webinar-icon.png';?>" width="90" alt="">
			<h2>Our Webinars</h1>
			<p>Porrupiet alique optatem alit, occum ut fugia conseni moloremquid endicia cus</p>
			<a class="main-btn" href=""><i class="main-btn-icon fa fa-chevron-right"></i>Learn More</a>
		</div><!--end column-->
		<div class="clearfix"></div>
	</div><!--end main-wrap-->
</div><!--end three-col-icon-->

<div class="inline-video">
	<div class="main-wrap">
		<div class="col-md-6 vid-info">
			<h1>A Welcome from Laura Slover</h1>
			<h2>Centerpoint Education Solutions</h2>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<a class="main-btn" href=""><i class="main-btn-icon fa fa-chevron-right"></i>Read More</a>
		</div><!--end vid-info-->
		<div class="col-md-6 vid">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/y17l-hxFz1M" frameborder="0" allowfullscreen></iframe>
		</div><!--end vid-->
		<div class="clearfix"></div>
	</div><!--end main-wrap-->
</div><!--end inline-video-->

<div class="background-img-text">
	<div class="main-wrap">
		<div class="text">
			<h1>Ready to Get the CenterPoint Story?</h1>
			<p>School, district- and network-wide, program options are available to meet your specific formative assessment needs.</p>
			<p>Call us at 844.637.7100 or click the link below to fill out a fast form</p>
			<a class="main-btn" href=""><i class="main-btn-icon fa fa-chevron-right"></i>Yes, I want to learn more</a>
		</div><!--end text-->
	</div><!--end main-wrap-->
</div><!--end background-img-text-->

<div class="twitter-feed">
	<i class="fa fa-twitter icon-head"></i>
	<div class="main-wrap">
		<a href="#" class="control next"><i class="fa fa-angle-right"></i></a>
		<a href="#" class="control prev"><i class="fa fa-angle-left"></i></a>
	</div><!--end main-wrap-->
	<ul>
		<li class="active"><a href="#"><p>"Md. principal Stacy Gray describes the ways the #PARCC score reports help parents and students alike:<br>http://bsun.md/1SeOlJ4</p></a></li>
		<li><a href="#"><p>"Md. principal Stacy Gray describes the ways the #PARCC score reports help parents and students alike:<br>http://bsun.md/1SeOlJ4</p></a></li>
		<li><a href="#"><p>"Md. principal Stacy Gray describes the ways the #PARCC score reports help parents and students alike:<br>http://bsun.md/1SeOlJ4</p></a></li>
	</ul>
</div><!--end twitter-feed-->

<?php get_footer(); ?>