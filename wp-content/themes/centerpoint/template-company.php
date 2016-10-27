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

<div id="full-overlay"></div>

<div id="post-modal"></div>

<div class="full-text">
	<h1 class="large"><?php echo the_title(); ?></h1>
</div><!--end full-text-->

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="jump-links has-shadow">
			<nav>
				<li><a href="#">About Us</a></li>
				<li><a href="#team-list">Team</a></li>
				<li><a href="#board-list">Board Members</a></li>
				<li><a href="#advisor-list">Advisors</a></li>
				<div class="clearfix"></div>
			</nav>
		</div>
	
		<div class="company-top row has-shadow">
			<div class="main-wrap">
				<div class="col-sm-8 main-content">
					<?php echo the_content(); ?>
				</div><!--end column-->

				<!-- ACF QUICKLINKS -->
				<?php if(have_rows('quick_links')): ?>
					<div class="col-sm-4 quicklinks">
						<h3>QuickLinks</h3>
						<ul>
							<?php while(have_rows('quick_links')) : the_row(); ?>
								<li><a href="<?php the_sub_field('quicklink_link'); ?>"><?php the_sub_field('quicklink_text'); ?></a></li>
							<?php endwhile; ?>
						</ul>
					</div><!--end column-->
				<?php endif; ?>

			</div><!--end main-wrap-->
		</div><!--end company-top-->

		<!-- ACF VALUES -->
		<?php if(have_rows('guiding_principles')): ?>
			<div class="values row has-shadow green-background">
				<div class="main-wrap">
					<h1 class="large">CenterPoint Guiding Principles</h1>
					<?php while(have_rows('guiding_principles')) : the_row(); ?>
						<div class="col-lg-4 col-md-6 value">
							<h2><?php the_sub_field('principle_headline'); ?></h2>
							<p><?php the_sub_field('principle_description'); ?></p>
						</div><!--end value-->
					<?php endwhile; ?>
				</div><!--end main-wrap-->
			</div><!--end company-values-->
		<?php endif; ?>

		<!-- ACF VALUES -->
		<?php if(have_rows('values')): ?>
			<div class="values row has-shadow">
				<div class="main-wrap">
					<h1 class="large">CenterPoint Values</h1>
					<?php while(have_rows('values')) : the_row(); ?>
						<div class="col-lg-4 col-md-6 value">
							<h2><?php the_sub_field('value_headline'); ?></h2>
							<p><?php the_sub_field('value_description'); ?></p>
						</div><!--end value-->
					<?php endwhile; ?>
				</div><!--end main-wrap-->
			</div><!--end company-values-->
		<?php endif; ?>

	<?php endwhile; ?>

	<?php wp_reset_query(); ?>

	<div id="team-members" class="has-shadow">

		<div class="main-wrap">

			<!--=====================================-->
			<!--==== LOOP THROUGH TEAM CATEGORY =====-->
			<!--=====================================-->
			<?php 
				$team = new WP_Query( [
				'post_type' => 'employee', 
				'employee_category' => 'team',
				'posts_per_page' => 20,
				'orderby' => 'date',
				'order' => 'DESC'
				]);
			?>
			<a id="team-list" class="list-trigger" href="#">Team<i class="fa fa-plus-circle"></i></a>
			<div class="team-list">
				<?php while ( $team->have_posts() ) : $team->the_post(); ?>
					<div class="col-sm-3 employee">
						<a class="post-trigger" data-id="<?php echo the_ID(); ?>" href="<?php echo the_permalink(); ?>">
							<?php echo the_post_thumbnail( $size, $attr ); ?>
							<h2><?php echo the_title(); ?></h2>
							<p><?php echo the_field('employee_title'); ?><span> Read Bio <i class="fa fa-plus"></i></span></p>
						</a>
					</div><!--end team-list-->
				<?php endwhile; ?>
				<div class="clearfix"></div>
			</div><!--end team-list-->
			<?php wp_reset_query(); ?>

			<!--=============================================-->
			<!--==== LOOP THROUGH BOARD MEMBER CATEGORY =====-->
			<!--=============================================-->
			<?php 
				$boards = new WP_Query( [
				'post_type' => 'employee', 
				'employee_category' => 'board-member',
				'posts_per_page' => 20,
				'orderby' => 'date',
				'order' => 'DESC'
				]);
			?>
			<a id="board-list" class="list-trigger" href="#">Board Members<i class="fa fa-plus-circle"></i></a>
			<div class="team-list">
				<?php while ( $boards->have_posts() ) : $boards->the_post(); ?>
					<div class="col-sm-3 employee">
						<a class="post-trigger" data-id="<?php echo the_ID(); ?>" href="<?php echo the_permalink(); ?>">
							<?php echo the_post_thumbnail( $size, $attr ); ?>
							<h2><?php echo the_title(); ?></h2>
							<p><?php echo the_field('employee_title'); ?><span> Read Bio <i class="fa fa-plus"></i></span></p>
						</a>
					</div><!--end team-list-->
				<?php endwhile; ?>
				<div class="clearfix"></div>
			</div><!--end team-list-->
			<?php wp_reset_query(); ?>

			<!--========================================-->
			<!--==== LOOP THROUGH ADVISOR CATEGORY =====-->
			<!--========================================-->
			<?php 
				$advisors = new WP_Query( [
				'post_type' => 'employee', 
				'employee_category' => 'advisor',
				'posts_per_page' => 20,
				'orderby' => 'date',
				'order' => 'DESC'
				]);
			?>
			<a id="advisor-list" class="list-trigger" href="#">Advisors<i class="fa fa-plus-circle"></i></a>
			<div class="team-list">
				<?php while ( $advisors->have_posts() ) : $advisors->the_post(); ?>
					<div class="col-sm-3 employee">
						<a class="post-trigger" data-id="<?php echo the_ID(); ?>" href="<?php echo the_permalink(); ?>">
							<?php echo the_post_thumbnail( $size, $attr ); ?>
							<h2><?php echo the_title(); ?></h2>
							<p><?php echo the_field('employee_title'); ?><span> Read Bio <i class="fa fa-plus"></i></span></p>
						</a>
					</div><!--end team-list-->
				<?php endwhile; ?>
				<div class="clearfix"></div>
			</div><!--end team-list-->
			<?php wp_reset_query(); ?>

		</div><!--end main-wrap-->

	</div><!--end team-members-->

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="news-events has-shadow">
			<div class="main-wrap">
				<?php while(have_rows('news')) : the_row(); ?>
					<div class="col-md-4 event">
						<h2><?php the_sub_field('news_headline'); ?></h2>
						<div class="news-content">
							<?php echo the_sub_field('news_content'); ?>
						</div><!--end news-content-->
						<a class="main-btn" href="<?php the_sub_field('news_link'); ?>"><i class="main-btn-icon fa fa-chevron-right"></i><?php the_sub_field('news_link_text'); ?></a>
					</div><!--end event-->
				<?php endwhile; ?>
				<div class="clearfix"></div>
			</div><!--end main-wrap-->
		</div><!--end news-events-->
	<?php endwhile; ?>

<?php get_footer(); ?>