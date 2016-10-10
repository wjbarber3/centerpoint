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

<!-- Loop through Team Members -->
<?php 
	$team = new WP_Query( [
	'post_type' => 'employee', 
	'employee_category' => 'team',
	'posts_per_page' => 20,
	'orderby' => 'date',
	'order' => 'DESC'
	]);
?>

<?php while ( $team->have_posts() ) : $team->the_post(); ?>

	<h1><?php echo the_title(); ?></h1>

<?php endwhile; ?>

<?php wp_reset_query(); ?>

<!-- Loop through Board Members -->
<?php 
	$boards = new WP_Query( [
	'post_type' => 'employee', 
	'employee_category' => 'board-member',
	'posts_per_page' => 20,
	'orderby' => 'date',
	'order' => 'DESC'
	]);
?>

<?php while ( $boards->have_posts() ) : $boards->the_post(); ?>

	<h1><?php echo the_title(); ?></h1>

<?php endwhile; ?>

<?php wp_reset_query(); ?>

<!-- Loop through Advisors -->
<?php 
	$advisors = new WP_Query( [
	'post_type' => 'employee', 
	'employee_category' => 'advisor',
	'posts_per_page' => 20,
	'orderby' => 'date',
	'order' => 'DESC'
	]);
?>

<?php while ( $advisors->have_posts() ) : $advisors->the_post(); ?>

	<h1><?php echo the_title(); ?></h1>

<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>