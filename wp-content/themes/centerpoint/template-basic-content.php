<?php /* Template Name: Basic Content */ ?>


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
	</div><!--end main-wrap-->
</div><!--end full-text-->

<div class="basic-content">

<div class="main-wrap">
	
	<?php while ( have_posts() ) : the_post(); ?>

		<?php echo the_content(); ?>

	<?php endwhile; ?>

</div><!--end main-wrap-->

</div><!--end contact-content-->

<?php get_footer(); ?>