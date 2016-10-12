<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<?php echo the_post_thumbnail( $size, $attr ); ?>
	<h2><?php echo the_title(); ?></h2>
	<p><?php echo the_content(); ?></p>
	<p><?php echo the_field('employee_title'); ?></p>
	<i class="fa fa-close close"></i>
<?php endwhile; endif; ?>