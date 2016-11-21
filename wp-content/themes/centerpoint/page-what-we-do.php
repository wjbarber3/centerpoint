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
		</div><!--end main-wrap-->
	</div><!--end full-text-->
	
	<div class="main-content-area blue-bg has-shadow">
		<div class="main-wrap">
			<h2><?php the_field('intro_headline'); ?></h2>
			<?php if(have_rows('intro_column_content')): ?>
				<?php while(have_rows('intro_column_content')) : the_row(); ?>
						<div class="col-md-4">
							<?php the_sub_field('intro_column'); ?>
						</div><!--end column-->
				<?php endwhile; ?>
				<div class="clearfix"></div>
			<?php endif; ?>
		</div><!--end main-wrap-->
	</div><!--end content-->
	
	<?php if(have_rows('what_we_do_content')): ?>
		<div class="what-we-do-content has-shadow">
			<div class="main-wrap">
				<div class="mobile-menu-trigger">
					<p>Menu</p>
					<i class="fa fa-angle-down"></i>
				</div>
				<div class="col-sm-3 slide-triggers">
					<ul>
						<?php $i = 0; ?>
						<?php while(have_rows('what_we_do_content')) : the_row(); ?>
							<li <?php if($i == 0) { echo 'class="active"'; }; ?>><?php the_sub_field('link_name'); ?></li>
							<?php $i ++; ?>
						<?php endwhile; ?>
					</ul>
				</div><!--end slide-triggers-->
				<div class="col-sm-9">
					<ul class="slide-container">
						<?php while(have_rows('what_we_do_content')) : the_row(); ?>
							<li class="slide">
								<h2><?php the_sub_field('link_name'); ?></h2>
								<?php the_sub_field('section_content'); ?>
								<?php if ( get_sub_field('link_text') ): ?>
									<a class="main-btn" href="<?php the_sub_field('page_link'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('link_text'); ?></a>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
					</ul>
				</div><!--end column-->
				<div class="clearfix"></div>
			</div><!--end main-wrap-->
		</div><!--end what-we-do-content-->
	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>