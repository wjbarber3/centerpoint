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

<div class="full-text">
	<div class="main-wrap">
		<h1 class="large"><?php the_title(); ?></h1>
		<?php echo the_content(); ?>
	</div><!--end main-wrap-->
</div><!--end full-text-->

<?php while ( have_posts() ) : the_post(); ?>

	<div class="two-column-full what-we-do has-shadow">
		<div class="main-wrap">
			<div class="col-md-6 prod-info">
				<img src="http://centerpoint-local.com/wp-content/uploads/2016/10/test-1.png" alt="">
				<h3>Teaching &amp; Learning Solutions</h3>
				<p>product description</p>
			</div><!--end prod-info-->
			<div class="col-md-6 prod-info">
				<img src="http://centerpoint-local.com/wp-content/uploads/2016/10/test-1.png" alt="">
				<h3>Assessment Services</h3>
				<p>no hidden content here</p>
			</div><!--end prod-info-->
			<div class="clearfix"></div>
		</div><!--end main-wrap-->
	</div><!--end two-column-full-->

<?php endwhile; ?>

<?php get_footer(); ?>