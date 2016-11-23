<?php /* Template Name: Product Page */ ?>

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

<?php if( have_rows('product_flex_content') ): ?>
    <?php while ( have_rows('product_flex_content') ) : the_row(); ?>
		
		<?php  if( get_row_layout() == 'product_headline' ): ?>
			<div class="product-header">
				<div class="main-wrap">
					<div class="col-sm-7 product-tagline">
						<h1 class="large"><?php the_sub_field('product_tagline_one'); ?></h1>
						<h1 class="large"><?php the_sub_field('product_tagline_two'); ?></h1>
					</div><!--end product-tagline-->
					<div class="col-sm-5 product-icon">
						<img src="<?php echo get_sub_field('product_icon')['url']; ?>" alt="">
					</div><!--end product-icon-->
					<div class="clearfix"></div>
				</div><!--end main-wrap-->
			</div><!--end product-header-->
		<?php endif; ?>
		
		<?php  if( get_row_layout() == 'product_info' ): ?>
			<div class="product-info has-shadow">
				<div class="main-wrap">
					<h1><?php the_sub_field('product_info_headline'); ?></h1>
					<?php echo the_sub_field('product_info_content'); ?>
				</div><!--end main-wrap-->
			</div><!--end product-info-->
		<?php endif; ?>
		
		<?php  if( get_row_layout() == 'product_bullet_points' ): ?>
			<div class="product-bullets has-shadow">
				<div class="main-wrap">
				<h1><?php the_sub_field('section_headline'); ?></h1>
					<?php if(have_rows('bullet_points')): ?>
						<ul>
							<?php while(have_rows('bullet_points')) : the_row(); ?>
								<li><?php the_sub_field('bullet_point_text'); ?></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div><!--end main-wrap-->
			</div><!--end product-info-->
		<?php endif; ?>
		
		<?php  if( get_row_layout() == 'two_column_green_background' ): ?>
			<div class="two-column-product-details">
				<div class="main-wrap">
					<h1 class="large"><?php the_sub_field('headline'); ?></h1>
						<div class="info-container">
							<?php if( get_sub_field('subheadline') ): ?>
								<h2 class="section-trigger"><?php the_sub_field('subheadline'); ?><i class="fa fa-plus"></i></h2>
							<?php endif; ?>
							<!-- <div class="clearfix"></div> -->
							<div class="hidden-container">
								<?php if(have_rows('product')): ?>
									<?php while(have_rows('product')) : the_row(); ?>
										<div class="col-md-6 product">
											<img src="<?php echo get_sub_field('product_image')['url']; ?>" alt="">
											<h3><?php the_sub_field('product_name'); ?></h3>
											<p><?php the_sub_field('product_description'); ?></p>
											<?php if( get_sub_field('add_hidden_content')): ?>
												<div class="hidden-content"><?php the_sub_field('hidden_content'); ?></div>
												<a class="accordion-trigger" href="#">More<i class="fa fa-plus"></i></a>
											<?php endif; ?>
										</div><!--end product-->
									<?php endwhile; ?>
								<div class="clearfix"></div>
								<?php endif; ?>
							</div><!--end hidden-container-->
						</div><!--end info-container-->
				</div><!--end main-wrap-->
			</div><!--end two-column-product-details-->
		<?php endif; ?>

		<?php  if( get_row_layout() == 'news' ): ?>
			<div class="news-events has-shadow">
				<div class="main-wrap">
					<?php if(have_rows('news_column')): ?>
						<?php while(have_rows('news_column')) : the_row(); ?>
							<div class="col-md-4 event">
								<h2><?php the_sub_field('news_headline'); ?></h2>
								<div class="news-content">
									<?php echo the_sub_field('news_content'); ?>
								</div><!--end news-content-->
								<?php if( get_sub_field('page_or_file') == 'page' ): ?>
									<?php if ( get_sub_field('news_link_text') ): ?>
										<a class="main-btn" href="<?php the_sub_field('news_link'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('news_link_text'); ?></a>
									<?php endif; ?>
								<?php endif; ?>
								<?php if( get_sub_field('page_or_file') == 'file' ): ?>
									<?php $file = get_sub_field('news_file'); ?>
									<a class="main-btn" href="<?php echo $file['url']; ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('news_link_text'); ?></a>
								<?php endif; ?>
							</div><!--end event-->
						<?php endwhile; ?>
						<div class="clearfix"></div>
					<?php endif; ?>
				</div><!--end main-wrap-->
			</div><!--end news-events-->
		<?php endif; ?>

		<?php  if( get_row_layout() == 'product_background_image_text' ): ?>
			<div class="product-bg-image" style="background-image: url('<?php echo get_sub_field('background_image')['url']; ?>')">
				<div class="main-wrap">	
					<h3><?php the_sub_field('background_image_headline'); ?></h3>
					<?php echo the_sub_field('background_image_text'); ?>
				</div><!--end main-wrap-->
			</div><!--end product-bg-image-->
		<?php endif; ?>
		
		<?php  if( get_row_layout() == 'product_two-column_full' ): ?>
			<div class="two-column-full has-shadow">
				<div class="main-wrap">
					<?php if(have_rows('product')): ?>
						<?php while(have_rows('product')) : the_row(); ?>
							<div class="col-md-6 prod-info">
								<img src="<?php echo get_sub_field('product_image')['url']; ?>" alt="">
								<h3><?php the_sub_field('product_name'); ?></h3>
								<p><?php the_sub_field('product_description'); ?></p>
								<?php if( get_sub_field('add_hidden_content')): ?>
									<div class="hidden-content"><?php the_sub_field('hidden_content'); ?></div>
									<a class="accordion-trigger" href="#">More<i class="fa fa-plus"></i></a>
								<?php endif; ?>
							</div><!--end prod-info-->
						<?php endwhile; ?>
						<div class="clearfix"></div>
					<?php endif; ?>
				</div><!--end main-wrap-->
			</div><!--end two-column-full-->
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>