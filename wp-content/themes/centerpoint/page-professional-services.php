<?php /* Template Name: Company */ ?>

<?php get_header(); ?>

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
?>

<?php if(get_post_thumbnail_id()): ?> 
	<div class="featured-image">
		<img src="<?php echo $thumb_url; ?>">
	</div><!--end featured-image-->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="full-text">
		<div class="main-wrap">
			<h1 class="large"><?php the_title(); ?></h1>
			<?php echo the_content(); ?>
		</div><!--end main-wrap-->
	</div><!--end full-text-->

	<div class="services-links has-shadow">
		<nav>
			<li><a class="current" href="">Blueprint</a></li>
			<li><a href="">Forms Design &amp; Development</a></li>
			<li><a href="">Alignment</a></li>
			<li><a href="">Data Analytics &amp; Reporting</a></li>
			<li><a href="">Psychometric Services</a></li>
			<div class="clearfix"></div>
		</nav>
	</div>

	<div id="services-slider" class="has-shadow">
		<div class="main-wrap">
			<div class="title-area">
				<a href="" class="service-arrow prev"><i class="fa fa-angle-left"></i></a>
				<a href="" class="service-arrow next"><i class="fa fa-angle-right"></i></a>
				<h2 class="title">BluePrint</h2>
			</div><!--end title-area-->
			<div class="content-area">
				<ul>
					<li class="active">Text One</li>
					<li>Text Two</li>
					<li>Text Three</li>
				</ul>
			</div><!--end content-area-->
		</div><!--end main-wrap-->
	</div><!--end services-slider-->

<?php endwhile; ?>

<?php get_footer(); ?>
	
		