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
		<div class="main-wrap">
			<?php if(have_rows('services')): ?>
				<nav>
					<?php $i = 0; ?>
					<?php while(have_rows('services')) : the_row(); ?>
						<li><a href="#" <?php if($i == 0) { echo 'class="current"'; }; ?>><?php the_sub_field('service_title'); ?></a></li>
						<?php $i ++; ?>
					<?php endwhile; ?>
					<div class="clearfix"></div>
				</nav>
			<?php endif; ?>
		</div><!--end main-wrap-->
	</div>

	<div id="services-slider" class="has-shadow">
		<div class="main-wrap">
			<div class="title-area">
				<a href="" class="service-arrow prev"><i class="fa fa-angle-left"></i></a>
				<a href="" class="service-arrow next"><i class="fa fa-angle-right"></i></a>
				<?php if(have_rows('services')): ?>
					<?php $b = 0; ?>
					<?php while(have_rows('services')) : the_row(); ?>
						<?php if ($b == 0): ?>
							<h2 class="title"><?php the_sub_field('service_title'); ?></h2>
						<?php endif; ?>
						<?php $b ++; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div><!--end title-area-->
			<div class="content-area">
				<?php if(have_rows('services')): ?>
					<ul>
						<?php $a = 0; ?>
						<?php while(have_rows('services')) : the_row(); ?>
							<li class="content<?php if($a == 0) { echo ' active'; }; ?>"><?php the_sub_field('service_content'); ?></li>
							<?php $a ++; ?>
						<?php endwhile; ?>
						<a class="main-btn" href="/contact"><i class="main-btn-icon fa fa-chevron-right"></i>Contact Us</a>
					</ul>
				<?php endif; ?>
			</div><!--end content-area-->
		</div><!--end main-wrap-->
	</div><!--end services-slider-->

<?php endwhile; ?>

<?php get_footer(); ?>
	
		