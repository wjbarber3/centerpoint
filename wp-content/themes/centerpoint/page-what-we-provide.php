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

	<?php if(have_rows('what_we_provide_content')): ?>

		<div class="two-column-full what-we-provide has-shadow">
			<div class="main-wrap">
				<?php while(have_rows('what_we_provide_content')) : the_row(); ?>
					<div class="col-md-6 prod-info">
						<img src="<?php echo get_sub_field('column_image')['url']; ?>" alt="">
						<h3><?php the_sub_field('headline'); ?></h3>
						<?php echo the_sub_field('content'); ?>
						<?php if ( get_sub_field('link_text') ): ?>
							<a class="main-btn" href="<?php the_sub_field('link'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('link_text'); ?></a>
						<?php endif; ?>
					</div><!--end prod-info-->
				<?php endwhile; ?>
				<div class="clearfix"></div>
			</div><!--end main-wrap-->
		</div><!--end two-column-full-->

	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>