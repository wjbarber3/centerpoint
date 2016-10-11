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

<div id="full-overlay"></div>

<div id="post-modal"></div>

<div class="main-wrap">
	
	<div class="company-top row">
		<div class="col-sm-8 jump-links">
			<nav>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Team</a></li>
				<li><a href="#">Board Members</a></li>
				<li><a href="#">Advisors</a></li>
			</nav>
			<p>CenterPoint Education Solutions is committed to creating high-quality, innovative solutions to empower educators and to improve learning for all students. Equity and access for all students are at the “center point” of our work. CenterPoint’s customized solutions connect standards, curriculum, assessments, and instructional practice to support teaching and learning.</p>
			<p>The CenterPoint team is made up of classroom educators, former school and district leaders, curriculum and assessment experts, and policy specialists, all having deep technical and operational experience to best serve our clients’ needs. Our work is guided by our educator-focused, student-centered mission: Success. Every Student. Every teacher. </p>
		</div><!--end column-->
		<div class="col-sm-4 quicklinks">
			<h3>QuickLinks</h3>
			<ul>
				<li><a href="">Diagnostic Assessments: Previ Learn</a></li>
				<li><a href="">Teacher Resources: Previ PlC</a></li>
				<li><a href="">Professional Learning: Previ Proed</a></li>
				<li><a href="">Custom Assessment Services: Assessment, Reporting, Analytics</a></li>
			</ul>
		</div><!--end column-->
	</div><!--end company-top-->

	<div id="values" class="row">
		<h1>CenterPoint Education Solutions Core Values</h1>
		<div class="col-sm-4 value">
			<h2>Inspiration</h2>
			<p>CenterPoint believes that every student has potential and inspired educators can unlock the potential</p>
		</div><!--end value-->
		<div class="col-sm-4 value">
			<h2>Inspiration</h2>
			<p>CenterPoint believes that every student has potential and inspired educators can unlock the potential</p>
		</div><!--end value-->
		<div class="col-sm-4 value">
			<h2>Inspiration</h2>
			<p>CenterPoint believes that every student has potential and inspired educators can unlock the potential</p>
		</div><!--end value-->
		<div class="col-sm-4 value">
			<h2>Inspiration</h2>
			<p>CenterPoint believes that every student has potential and inspired educators can unlock the potential</p>
		</div><!--end value-->
		<div class="col-sm-4 value">
			<h2>Inspiration</h2>
			<p>CenterPoint believes that every student has potential and inspired educators can unlock the potential</p>
		</div><!--end value-->
		<div class="col-sm-4 value">
			<h2>Inspiration</h2>
			<p>CenterPoint believes in replacing time-consuming test preparation with high-quality classroom-based assessments so that educators can immediately pinpoint strengths and areas of improvement in their students throughout the school year. </p>
		</div><!--end value-->
	</div><!--end company-values-->

	<div class="team-members">

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

		<a class="list-trigger" href="#">Team<i class="fa fa-plus-circle"></i></a>
		<div class="team-list">
			<?php while ( $team->have_posts() ) : $team->the_post(); ?>
				<div class="col-sm-4">
					<a class="post-trigger" data-id="<?php echo the_ID(); ?>" href="<?php echo the_permalink(); ?>">
						<h3><?php echo the_title(); ?></h3>
						<?php echo the_post_thumbnail( $size, $attr ); ?>
						<?php echo the_excerpt(); ?>
					</a>
				</div><!--end team-list-->
			<?php endwhile; ?>
			<div class="clearfix"></div>
		</div><!--end team-list-->

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
		
		<a class="list-trigger" href="#">Board Members<i class="fa fa-plus-circle"></i></a>
		<div class="team-list">
			<?php while ( $boards->have_posts() ) : $boards->the_post(); ?>
				<div class="col-sm-4">
					<a class="post-trigger" data-id="<?php echo the_ID(); ?>" href="<?php echo the_permalink(); ?>">
						<h3><?php echo the_title(); ?></h3>
						<?php echo the_post_thumbnail( $size, $attr ); ?>
						<?php echo the_excerpt(); ?>
					</a>
				</div><!--end team-list-->
			<?php endwhile; ?>
			<div class="clearfix"></div>
		</div><!--end team-list-->

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
		<a class="list-trigger" href="#">Advisors<i class="fa fa-plus-circle"></i></a>
		<div class="team-list">
			<?php while ( $advisors->have_posts() ) : $advisors->the_post(); ?>
				<div class="col-sm-4">
					<a class="post-trigger" data-id="<?php echo the_ID(); ?>" href="<?php echo the_permalink(); ?>">
						<h3><?php echo the_title(); ?></h3>
						<?php echo the_post_thumbnail( $size, $attr ); ?>
						<?php echo the_excerpt(); ?>
					</a>
				</div><!--end team-list-->
			<?php endwhile; ?>
			<div class="clearfix"></div>
		</div><!--end team-list-->

		<?php wp_reset_query(); ?>

	</div><!--end team-members-->

</div><!--end main-wrap-->

<?php get_footer(); ?>