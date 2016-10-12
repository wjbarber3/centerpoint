<?php /* Template Name: Module Builder */ ?>

<?php get_header(); ?>

<?php $theme = get_template_directory_uri(); ?>

<?php if( have_rows('flex_content') ): ?>
    <?php while ( have_rows('flex_content') ) : the_row(); ?>

	<?php  if( get_row_layout() == 'full_width_text' ): ?>
		<div class="full-text">
			<div class="main-wrap">
				<h1><?php the_sub_field('full_text_headline'); ?></h1>
				<p><?php the_sub_field('full_text_copy'); ?></p>
			</div><!--end main-wrap-->
		</div><!--end intro-->
	<?php endif; ?>

	<?php  if( get_row_layout() == 'three_column_icon_grid' ): ?>
		<div class="three-col-icon">
			<div class="main-wrap">
				<h1><?php the_sub_field('icon_grid_headline'); ?></h1>
				<?php if(have_rows('column')): ?>
					<?php while(have_rows('column')) : the_row(); ?>
						<div class="col-md-4 column">
							<img src="<?php echo get_sub_field('icon')['url']; ?>" width="90">
							<h2><?php the_sub_field('column_headline'); ?></h1>
							<p><?php the_sub_field('column_copy'); ?></p>
							<a class="main-btn" href="<?php the_sub_field('link_url'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('link_text'); ?></a>
						</div><!--end column-->
					<?php endwhile; ?>
				<?php endif; ?>
				<div class="clearfix"></div>
			</div><!--end main-wrap-->
		</div><!--end three-col-icon-->
	<?php endif; ?>
	
	<?php  if( get_row_layout() == 'video_or_image_with_info' ): ?>
		<div class="inline-video">
			<div class="main-wrap">
				<div class="col-md-6 vid-info">
					<h1><?php the_sub_field('section_headline'); ?></h1>
					<h2><?php the_sub_field('section_subheadline'); ?></h2>
					<p><?php the_sub_field('section_copy'); ?></p>
					<a class="main-btn" href="<?php the_sub_field('link_page'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('section_link_text'); ?></a>
				</div><!--end vid-info-->
				<div class="col-md-6 vid">
					<?php if(get_sub_field('video_or_image') == 'video') {
						the_sub_field('video_link');
					} else {
						the_sub_field('section_image');
					}
					?>
				</div><!--end vid-->
				<div class="clearfix"></div>
			</div><!--end main-wrap-->
		</div><!--end inline-video-->
	<?php endif; ?>

	<?php  if( get_row_layout() == 'background_image_with_text' ): ?>
		<div class="background-img-text" style="background-image:<?php the_sub_field('background_image'); ?>">
			<div class="main-wrap">
				<div class="text">
					<h1><?php the_sub_field('background_image_headline'); ?></h1>
					<?php the_sub_field('background_image_copy'); ?>
					<a class="main-btn" href="<?php the_sub_field('link_url'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('background_module_link_text'); ?></a>
				</div><!--end text-->
			</div><!--end main-wrap-->
		</div><!--end background-img-text-->
	<?php endif; ?>

	<?php endwhile; ?><!--end the flex content 'while'-->
<?php endif; ?><!--end the flex content 'if'-->

<?php if( get_field('twitter_feed')): ?>
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
<?php endif; ?>

<?php get_footer(); ?>