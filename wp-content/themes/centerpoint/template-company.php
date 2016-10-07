<?php /* Template Name: Company */ ?>

<?php get_header(); ?>

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];
?>

<div class="featured-image">
	<img src="<?php echo $thumb_url; ?>">
</div><!--end featured-image-->

<?php get_footer(); ?>